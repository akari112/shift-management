<?php
namespace App;

use Carbon\Carbon;

class Shiftdays {
	private $carbon;

  // 日付を表示用に変換
  public function jap($date){
    $shift = new Carbon($date);
    $shi = $shift->isoformat('YYYY/MM/DD(ddd)');
    return $shi;
  }

  /**
   * ------------------
   * シフト希望提出  
   * ------------------
  */

  // シフト区分のリスト
  public function getLists($date){
    $this->carbon = new Carbon($date);
    $lists = [];

    $today = $this->carbon->copy();
    // 初日
    $firstDay = $today->copy()->firstOfMonth();
    // 月末
    $lastDay = $today->copy()->endOfMonth()->format('Y/m/d');
    // 15日後
    $twoWeek = $firstDay->copy()->addDay(15)->format('Y/m/d');
    // 比較用の15日後
    $twoWeek1 = $firstDay->copy()->addDay(15);

    // 今日が15日以前の場合
    if($twoWeek1 > $this->carbon){
      $lists[] = $twoWeek.'ー'.$lastDay;

      for($i = 1; $i<3; $i++){
        $today->addMonths(1);
        $next = $today->firstOfMonth();
        $lists[] = $next->format('Y/m/d').'ー'.$next->firstOfMonth()->addDay(14)->format('Y/m/d');
        $lists[] = $next->copy()->firstOfMonth()->addDay(15)->format('Y/m/d').'ー'.$next->copy()->endOfMonth()->format('Y/m/d');
      }
    }else{
      for($i = 1; $i<3; $i++){
        $today->addMonths(1);
        $next = $today->firstOfMonth();
        $lists[] = $next->format('Y/m/d').'ー'.$next->firstOfMonth()->addDay(14)->format('Y/m/d');
        $lists[] = $next->copy()->firstOfMonth()->addDay(15)->format('Y/m/d').'ー'.$next->copy()->endOfMonth()->format('Y/m/d');
      }
    }
    return $lists;
  }


  // 選択されたシフト区分の日にち一覧
  public function dayLists($firstday,$lastdey)
  {
    // 渡された日付を分割切り出し
    $first = explode('-',$firstday);
    $last = explode('-',$lastdey);
    $first = $first[2];
    $last = $last[2];

    // 最初の日と最後の日の差
    $differ = $last - $first + 1;

    $latest = new Carbon($firstday);
    // 表示用
    $days[] = $latest->copy()->isoformat('YYYY/MM/DD(ddd)');
    // value用
    $days2[] = $latest->copy()->format('Y-m-d');

    for($i=1; $i<$differ; $i++)
    {
      $days[] = $latest->copy()->addDay($i)->isoformat('YYYY/MM/DD(ddd)');
      $days2[] = $latest->copy()->addDay($i)->format('Y-m-d');
    }

    return [$days, $days2];
  }

  /**
   * ------------------
   * シフト希望確認(管理者)
   * ------------------
  */
    // シフト区分のリスト
    public function getListsAdmin($date){
      $this->carbon = new Carbon($date);
      $lists = [];
  
      $today = $this->carbon->copy();
  
      for($i = 1; $i<5; $i++){
        $today->addMonths(1);
        $next = $today->firstOfMonth();
        $lists[] = $next->format('Y/m/d').'ー'.$next->firstOfMonth()->addDay(14)->format('Y/m/d');
        $lists[] = $next->copy()->firstOfMonth()->addDay(15)->format('Y/m/d').'ー'.$next->copy()->endOfMonth()->format('Y/m/d');
      }

      return $lists;
    }
    // 確定済みシフト区分のリスト
    public function getconListsAdmin($date){
      $this->carbon = new Carbon($date);
      $lists = [];
  
      $today = $this->carbon->copy();
  
      for($i = 1; $i<8; $i++){
        $today->addMonths(1);
        $next = $today->firstOfMonth();
        $lists[] = $next->format('Y/m/d').'ー'.$next->firstOfMonth()->addDay(14)->format('Y/m/d');
        $lists[] = $next->copy()->firstOfMonth()->addDay(15)->format('Y/m/d').'ー'.$next->copy()->endOfMonth()->format('Y/m/d');
      }

      return $lists;
    }
  

}