<?php

namespace frontend\business;

class WelfareLottery extends Base
{
    public function welfareLotteryMake(): void
    {
        $threeD = $doubleColor = $sevenColour = [];
        // 3D
        for ($i = 1; $i <= 3; $i++) {
            array_push($threeD, rand(0, 9));
        }
        // 双色球
        $blue = $read = [];
        $blueNum = $readNum = [];
        for ($i = 1; $i <= 33; $i++) {
            $tempNum = str_pad((string)$i, 2, '0', STR_PAD_LEFT);
            array_push($blue, $tempNum);
            if ($i <= 16) {
                array_push($read, $tempNum);
            }
        }
        // 打乱顺序
        shuffle($blue);
        shuffle($read);
        for ($i = 1; $i <= 6; $i++) {
            $shift = array_shift($blue);
            array_push($blueNum, $shift);
        }
        $shift = array_shift($read);
        array_push($readNum, $shift);
        // 排序
        sort($blueNum);
        $doubleColor = array_merge($blueNum, $readNum);
        // 七乐彩
        $sevenNum = [];
        for ($i = 1; $i <= 30; $i++) {
            $tempNum = str_pad((string)$i, 2, '0', STR_PAD_LEFT);
            array_push($sevenNum, $tempNum);
        }
        // 打乱顺序
        shuffle($sevenNum);
        $sevenRead = $sevenBlue = [];
        for ($i = 1; $i <= 8; $i++) {
            $shift = array_shift($blue);
            if ($i == 8) {
                array_push($sevenBlue, $shift);
            } else {
                array_push($sevenRead, $shift);
            }
        }
        sort($sevenRead);
        $sevenColour = array_merge($sevenRead, $sevenBlue);
        $this->result = [
            '3d' => $threeD,
            'doubleColor' => $doubleColor,
            'sevenColour' => $sevenColour,
        ];
    }
}