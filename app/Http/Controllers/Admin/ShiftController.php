<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Shift;
use App\Shiftdays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{

    // 検証済みデータ格納用セッションキー
    protected $sessionKey = 'ShiftData';
    protected $sessionKey0 = 'ShiftData0';

    // 希望シフト区分表示
    public function checkIndex()
    {
        $days = new Shiftdays;
        // 2ヶ月前から
        $lists = $days->getListsAdmin(strtotime("-60 day"));

        session()->forget($this->sessionKey0);

		return view('admin.shift.check.index', [
			"lists" => $lists
		]);
    }

    // 希望シフト詳細＆選択
    public function checkList($selected)
    {
        // 日付を分ける
        $days = explode('ー',$selected);
        
        $shifts = Shift::join('users', 'shifts.user_id', '=', 'users.id')
                        ->select('day','user_id',
                        DB::raw('group_concat(username separator ", ") AS name'))
                        ->whereBetween('day', [$days[0], $days[1]])
                        ->where('desired', 1)
                        ->groupBy('day')
                        ->orderBy('day')
                        ->get()
                        ->toArray();

        session([$this->sessionKey0 => $shifts]);

        // 日付を表示用に変換した配列
        $okShifts = [];
        foreach($shifts as $shift){
            $carbon = new Shiftdays;
            $shi = $carbon->jap($shift['day']);
            $okShifts[] = ['day' => $shi, 'name' => $shift['name'], 'inputDay' => $shift['day']];
        }

        return view('admin.shift.check.list', [
			"okShifts" => $okShifts
		]);
    }

    // 希望シフト確定前確認
    public function shiftConfirm(Request $request)
    {
        $days = $request->input('day');

        if(!isset($days) || empty($days)){
            return redirect(route('admin.shift.check.index'));
        }

        $cons = [];
        $db_shifts = [];

        // 名前と日付で分割し、表示用の日付を追加し配列作成
        foreach($days as $day){
            $one = explode(',',$day);
            $carbon = new Shiftdays;
            $shi = $carbon->jap($one[0]);
            $name = trim($one[1]);
            $cons[] = ['val_day' => $one[0], 'name' => $one[1], 'day' => $shi];
            $db_shifts[] = ['val_day' => $one[0], 'name' => $name];
        }

        session([$this->sessionKey => $db_shifts]);

        // $consを日付でグループ化
        $confirms = [];
        foreach ($cons as $row) {
            $confirms[$row['day']][] = $row;
        }
        
        return view('admin.shift.check.confirm', [
			"confirms" => $confirms
		]);
    }

    // 確定シフトDB登録
    public function shiftOk()
    {
        $datas = session()->get('ShiftData', 'default');
        $datas0 = session()->get('ShiftData0', 'default');

        // 選択されてないシフトを0に変更
        foreach($datas0 as $data){
            Shift::where('day',$data['day'])->where('user_id',$data['user_id'])->update(['confirm'=> 0]);
        }
        // 選択されたシフトを１に変更
        foreach($datas as $data){
            $id = User::select('id')->where('username',$data['name'])->get()->toArray();
            Shift::where('day',$data['val_day'])->where('user_id',$id[0])->update(['confirm'=> 1]);
        }

        session()->forget($this->sessionKey);
        session()->forget($this->sessionKey0);
        return view('admin.shift.check.ok');
    }

    // 確定済みシフトリスト区分表示
    public function confirmIndex()
    {
        $days = new Shiftdays;
        // 3ヶ月前から
        $lists = $days->getconListsAdmin(strtotime("-60 day"));

		return view('admin.shift.confirm.index', [
			"lists" => $lists
		]);
    }

    // 確定済みシフト詳細表示
    public function confirmList($selected)
    {
        // 日付を分ける
        $days = explode('ー',$selected);

        $shifts = Shift::join('users', 'shifts.user_id', '=', 'users.id')
                        ->select('day','user_id',
                        DB::raw('group_concat(username separator ", ") AS name'))
                        ->whereBetween('day', [$days[0], $days[1]])
                        ->where('confirm', 1)
                        ->groupBy('day')
                        ->orderBy('day')
                        ->get()
                        ->toArray();

        // 日付を表示用に変換した配列
        $okShifts = [];
        foreach($shifts as $shift){
            $carbon = new Shiftdays;
            $shi = $carbon->jap($shift['day']);
            $okShifts[] = ['day' => $shi, 'name' => $shift['name']];
        }

        return view('admin.shift.confirm.list', [
            "okShifts" => $okShifts
        ]);
    }
}
