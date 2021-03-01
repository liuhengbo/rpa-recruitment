<?php

namespace MyGreeter;

class Client
{
    // 早上0点
    // 中午12点
    // 晚上6点
    // 晚上0点
    // 秒
    // 一天开始
    const DAY_0_SECOND = 0;
    // 一天开始到12点时的总秒数
    const DAY_12_SECOND = 12*3600;
    // 一天开始到18点时的总秒数
    const DAY_18_SECOND = 18*3600;

    // 当前时间
    public $current_date = '00:00:00';

    public function __construct()
    {
        $this->current_date = date("H:i:s");
    }

    public function getGreeting(){
        // 获取当前时间从0点开始过了多少秒
        $current_time_arr = explode(':',$this->current_date);
        $current_second = $current_time_arr[0]*3600+$current_time_arr[1]*60+$current_time_arr[2];

        if($current_second < self::DAY_12_SECOND){
            // 早上好
            echo "Good morning";
            return 'Good morning';
        }elseif ($current_second <self::DAY_18_SECOND){
            // 中午好
            echo "Good afternoon";
            return 'Good afternoon';
        }else{
            // 晚上好
            echo "Good evening";
            return 'Good evening';

        }
    }
}