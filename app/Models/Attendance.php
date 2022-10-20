<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date_on', 'start_time', 'end_time'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    /**
     * 複数のメソッドで共通のデータを整理
     */
    public static function common()
    {
        $user   = Auth::user();
        $today  = Carbon::today()->format('Y-m-d');
        $now    = Carbon::now()->format('H:i:s');

        $data = [
            'user'  => $user,
            'today' => $today,
            'now'   => $now
        ];
        return $data;
    }

    /**
     * 打刻ページにアクセスされたときに返すデータ
     */
    public static function stamp()
    {
        $data = Attendance::common();
        //データ有無をもとに各ボタンのクリック可否を判定して返す。user以外はboolean
        $param = [
            'user'       => $data['user']->name,
            'atte_start_det' => !$data['atte_start'],
            'atte_end_det'   => $data['atte_start'] && !$data['atte_end'],
            'rest_start_det' => $data['atte_start'] && !$data['atte_end'] && ($data['rest_start'] === $data['rest_end']),
            'rest_end_det'   => $data['atte_start'] && !$data['atte_end'] && $data['rest_start'] && !$data['rest_end']
        ];
        return $param;
    }

    /**
     * 勤務時間の計算
     */
    public function calcAtte()
    {
        //退勤前の時、attendance->end_timeを今の時間として計算する
        if (!isset($this->end_time)) {
            $this->end_time = Carbon::now()->format('H:i:s');
        }

        $atte = strtotime($this->end_time) - strtotime($this->start_time);
        $rests = Rest::sumRests($this->rests);
        $work = $atte - $rests;
        $param = [
            'rests' => self::shapeTime($rests),
            'work'  => self::shapeTime($work)
        ];
        return $param;
    }

    /**
     * 28800 -> 08:00:00
     * のように時間の形に修正する
     */
    public static function shapeTime($time)
    {
        $hours   = floor($time / 3600);
        $minutes = floor(($time / 60) % 60);
        $seconds = $time % 60;
        $shaped_time = Carbon::createFromTime($hours, $minutes, $seconds)->toTimeString();
        return $shaped_time;
    }
}
