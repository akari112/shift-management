<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Shift;
use App\Shiftdays;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * ------------------
     * シフト希望提出  
     * ------------------
    */

    // 希望シフト対象リスト
    public function desireIndex()
    {
        $days = new Shiftdays;
        // 5日前にシフト提出できなくする
        $lists = $days->getLists(strtotime("+5 day"));

		return view('user.shift.desire.index', [
			"lists" => $lists
		]);
    }

    // 希望シフト選択
    public function desireSelect($selected)
    {
        $days = explode('ー',$selected);
        
        $day = new Shiftdays;
        list($days, $days2) = $day->dayLists($days[0],$days[1]);

        return view('user.shift.desire.select', [
			"days" => $days,
			"days2" => $days2
		]);
    }

    // 希望シフト確認
    public function desireConfirm(Request $request)
    {

        $days = $request->input('day');
        foreach($days as $day){
            $one = explode(',',$day);
            $real[] = $one[0];
            $real2[] = $one[1];
        }

        return view('user.shift.desire.confirm', [
			"real" => $real,
			"real2" => $real2
		]);
    }

    // 希望シフトDB登録
    public function desireOk(Request $request, Shift $shift)
    {

        $days = $request->input('days');

        foreach($days as $day){
            
            $data = [];
            $data = [
                'user_id' => auth()->id(),
                'day' => $day,
                'desired' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $shift->insert($data);
        }

        return view('user.shift.desire.ok');
    }

    /**
     * ------------------
     * シフト希望確認
     * ------------------
    */
    public function confirmIndex()
    {
        $days = new Shiftdays;
        $lists = $days->getLists(time());

		return view('user.shift.confirm.index', [
			"lists" => $lists
		]);
    }

    // 希望シフト閲覧
    public function confirmList($selected)
    {
        // パラメータの日付を分ける
        $days = explode('ー',$selected);

        $shifts = Shift::select('day')->where('user_id', auth()->id())->whereBetween('day', [$days[0], $days[1]])->where('desired', 1)->orderBy('day')->get()->toArray();
        $jpShifts = [];

        foreach($shifts as $shift){
            foreach($shift as $shi){
                $carbon = new Shiftdays;
                $shi = $carbon->jap($shi);
                $jpShifts[] = $shi;
            }
        }

        return view('user.shift.confirm.list', [
            "jpShifts" => $jpShifts
        ]);
    }

    /**
     * ------------------
     * 確定済シフト確認
     * ------------------
    */
    public function okIndex()
    {
        $days = new Shiftdays;
        $lists = $days->getLists(time());

		return view('user.shift.ok.index', [
			"lists" => $lists
		]);
    }

    // 希望シフト閲覧
    public function okList($selected)
    {
        // パラメータの日付を分ける
        $days = explode('ー',$selected);

        $shifts = Shift::select('day')->where('user_id', auth()->id())->whereBetween('day', [$days[0], $days[1]])->where('confirm', 1)->orderBy('day')->get()->toArray();
        $jpShifts = [];
        if(!empty($shifts)){
            foreach($shifts as $shift){
                foreach($shift as $shi){
                    $carbon = new Shiftdays;
                    $shi = $carbon->jap($shi);
                    $jpShifts[] = $shi;
                }
            }
        }

        return view('user.shift.ok.list', [
            "jpShifts" => $jpShifts
        ]);
    }  
}
