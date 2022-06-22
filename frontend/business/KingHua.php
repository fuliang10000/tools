<?php

namespace frontend\business;

use frontend\models\KingHuaForm;

class KingHua extends Base
{
    public function kingHuaMake(KingHuaForm $form): void
    {
        $peopleCli = $form->people;
        $ba = $form->ba;
        if ($peopleCli < 1) {
            $this->code = 500;
            $this->message = '玩牌人数不能少于1人';
            return;
        }
        if ($ba < 1) {
            $this->code = 500;
            $this->message = '玩牌把数不能少于1把';
            return;
        }
        $type = ['黑', '红', '梅', '方'];
        $number = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'];

        $shanpai = $duizi = $shunzi = $jinhua = $shunjin = $baozi = 0;
        $shunjinArr = $baoziArr = [];
        while ($ba > 0) {
            // 原始扑克牌52张
            $list = [];
            foreach ($type as $t) {
                foreach ($number as $n) {
                    array_push($list, $t . '-' . $n);
                }
            }
            // 洗牌
            shuffle($list);
            // 端牌
            $unset = rand(1, 20);
            array_splice($list, 0, $unset);

            $cards = [];
            //每人3张牌
            $cardNum = 3;
            while ($cardNum > 0) {
                // 6人
                $people = $peopleCli;
                while ($people > 0) {
                    $shift = array_shift($list);
                    if (empty($shift)) {
                        $this->code = 500;
                        $this->message = '玩牌人数太多了，牌不够发了';
                        return;
                    }
                    if (isset($cards[$people])) {
                        array_push($cards[$people], $shift);
                    } else {
                        $cards[$people] = [$shift];
                    }
                    --$people;
                }
                --$cardNum;
            }
            foreach ($cards as $card) {
                $cardTemp = [
                    'hua' => [],
                    'shu' => [],
                ];
                foreach ($card as $item) {
                    $itemArr = explode('-', $item);
                    array_push($cardTemp['hua'], $itemArr[0]);
                    array_push($cardTemp['shu'], $itemArr[1]);
                }
                sort($cardTemp['shu']);
                // 豹子
                if (count(array_unique($cardTemp['shu'])) == 1) {
                    $baozi += 1;
                    array_push($baoziArr, $cardTemp);
                    continue;
                }
                $shunziTemp = (((($cardTemp['shu'][0] + 1) == $cardTemp['shu'][1]) && (($cardTemp['shu'][1] + 1) == $cardTemp['shu'][2])) || empty(array_diff($cardTemp['shu'], ['1', '12', '13'])));
                // 顺金
                if (count(array_unique($cardTemp['hua'])) == 1 && $shunziTemp) {
                    array_push($shunjinArr, $cardTemp);
                    $shunjin += 1;
                    continue;
                }
                // 金花
                if (count(array_unique($cardTemp['hua'])) == 1) {
                    $jinhua += 1;
                    continue;
                }
                // 顺子
                if ($shunziTemp) {
                    $shunzi += 1;
                    continue;
                }
                // 对子
                if (count(array_unique($cardTemp['shu'])) == 2) {
                    $duizi += 1;
                    continue;
                }
                $shanpai += 1;
            }
            --$ba;
        }

        $this->result = [
            'shanpai' => $shanpai,
            'duizi' => $duizi,
            'shunzi' => $shunzi,
            'jinhua' => $jinhua,
            'shunjin' => $shunjin,
            'baozi' => $baozi,
        ];
    }
}