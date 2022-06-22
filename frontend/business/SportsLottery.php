<?php

namespace frontend\business;

use frontend\models\KingHuaForm;

class SportsLottery extends Base
{
    public function sportsLotteryMake(): void
    {
        $listThree = $listFive = $sevenStar = $bigHappy = [];
        // 排列三和排列五
        for ($i = 1; $i <= 5; $i++) {
            $randNum = rand(0, 9);
            array_push($listFive, $randNum);
            if ($i <= 3) {
                array_push($listThree, $randNum);
            }
        }
        // 七星彩
        for ($i = 1; $i <= 7; $i++) {
            if ($i == 7) {
                $randNum = rand(0, 14);
            } else {
                $randNum = rand(0, 9);
            }
            array_push($sevenStar, $randNum);
        }
        // 大乐透
        $blue = $read = [];
        $blueNum = $readNum = [];
        for ($i = 1; $i <= 35; $i++) {
            $tempNum = str_pad((string)$i, 2, '0', STR_PAD_LEFT);
            array_push($blue, $tempNum);
            if ($i <= 12) {
                array_push($read, $tempNum);
            }
        }
        // 打乱顺序
        shuffle($blue);
        shuffle($read);
        for ($i = 1; $i <= 5; $i++) {
            $shift = array_shift($blue);
            array_push($blueNum, $shift);
        }
        for ($i = 1; $i <= 2; $i++) {
            $shift = array_shift($read);
            array_push($readNum, $shift);
        }
        // 排序
        sort($blueNum);
        sort($readNum);
        $bigHappy = array_merge($blueNum, $readNum);
        $this->result = [
            'listThree' => $listThree,
            'listFive' => $listFive,
            'sevenStar' => $sevenStar,
            'bigHappy' => $bigHappy,
        ];
    }
}