<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;

use Carbon\Carbon;

class AttendanceController extends Controller
{


    /**
     * 打刻ページの表示
     */
    public function stamp()
    {
        $data = Attendance::common();
        $param = [
            'name' => $data['user']->name
        ];
        return view('stamp', $param);
    }

    /**
     * 勤務開始の処理
     *
     * 出勤処理がされていないのを確認してAttendance::createを実行
     */
    public function start(Request $request)
    {
        $data = Attendance::common();
        if ($data['atte_start']) {
            //既に出勤打刻済みならエラーメッセージを表示する
            return redirect('/')->with('error', $data['atte']->start_time . ' に既に出勤しています');
        } else {
            Attendance::create([
                'user_id'    => $data['user']->id,
                'date_on'    => $data['today'],
                'start_time' => $data['now']
            ]);
            return redirect('/');
        }
    }

    /**
     * 勤務終了の処理
     *
     * 出勤して、かつ退勤処理をしていない場合に退勤処理ができる
     * 休憩から直で退勤の場合、先に休憩終了の処理を挟む
     */
    public function end(Request $request)
    {
        $data = Attendance::common();

        //休憩終了が押せる状態なら休憩終了の処理を行う
        if ($data['rest_start'] && !$data['rest_end']) {
            $data['atte']->rests->last()->update(
                ['end_time' => $data['now']]
            );
        }
        //出勤していてかつ退勤していない状態なら退勤の打刻をする
        if ($data['atte_start'] && !$data['atte_end']) {
            $data['atte']->update(
                ['end_time' => $data['now']]
            );
            return redirect('/');
        } else {
            //退勤処理済ならエラーメッセージを表示
            return redirect('/')->with('error', $data['atte']->end_time . ' に退勤済みです');
        }
    }

    /**
     *  勤怠管理ページの表示
     */
    public function attendance($date)
    {
        //'日付一覧'をクリックした場合は今日の日付の情報を出す
        if ($date === 'today') {
            $date = Carbon::today()->format('Y-m-d');
        }

        //user_idでソートしておくと表示される場所がある程度固定されるので確認が楽になる
        $attes = Attendance::where('date_on', $date)
            ->orderby('user_id')
            ->paginate(5);

        $param = [
            'date' => $date,
            'attes' => $attes
        ];
        return  view('attendance', $param);
    }
}
