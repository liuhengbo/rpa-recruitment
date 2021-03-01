<?php

class MyGreeter_Client_Test extends \PHPUnit_Framework_TestCase
{
    private $greeter;

    public function setUp()
    {
        $this->greeter = new \MyGreeter\Client();
    }

    public function test_Instance()
    {
        $this->assertEquals(
            get_class($this->greeter),
            'MyGreeter\Client'
        );
    }

    public function test_getGreeting()
    {
        $hour = str_pad(rand(0, 24), 2, '0', STR_PAD_LEFT);;
        $minute = str_pad(rand(0, 60), 2, '0', STR_PAD_LEFT);;
        $second = str_pad(rand(0, 60), 2, '0', STR_PAD_LEFT);;
        $this->greeter->current_date = $hour . ':' . $minute . ':' . $second;
        echo "当前时间为：" . $this->greeter->current_date . "\n";

        $current_time_second = $hour * 3600 + $minute * 60 + $second;
        $assert_result = '';
        if($current_time_second < \MyGreeter\Client::DAY_12_SECOND){
            // 早上好
            $assert_result =  "Good morning";
        }elseif ($current_time_second <\MyGreeter\Client::DAY_18_SECOND){
            // 中午好
            $assert_result =  "Good afternoon";
        }else{
            // 晚上好
            $assert_result = "Good evening";

        }

        $this->assertTrue(
            $this->greeter->getGreeting() == $assert_result
        );
    }
}
