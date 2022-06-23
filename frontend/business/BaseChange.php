<?php

namespace frontend\business;

use frontend\models\BaseChangeForm;

class BaseChange extends Base
{
    public function baseChangeMake(BaseChangeForm $form): void
    {
        $num = $form->num;
        $change = $form->change;
        //判断数据的合法性
        if (substr($change, 0, 3) == 'dec') {
            $pattern = '/^[\d]+$/';
        } elseif (substr($change, 0, 3) == 'bin') {
            $pattern = '/^[01]+$/';
        } elseif (substr($change, 0, 3) == 'oct') {
            $pattern = '/^[01234567]+$/';
        } elseif (substr($change, 0, 3) == 'hex') {
            $pattern = '/^[\abcdef]+$/i';
        } else {
            $this->code = 500;
            $this->message = '无效的转换规则';
            return;
        }
        if (!preg_match($pattern, $num)) {
            $this->code = 500;
            $this->message = '原始数不符合转换要求';
            return;
        }
        if ($change == "binoct") {
            $this->result = base_convert($num, 2, 8);
        } elseif ($change == "binhex") {
            $this->result = base_convert($num, 2, 16);
        } elseif ($change == "octbin") {
            $this->result = base_convert($num, 8, 2);
        } elseif ($change == "octhex") {
            $this->result = base_convert($num, 8, 16);
        } elseif ($change == "hexbin") {
            $this->result = base_convert($num, 16, 2);
        } elseif ($change == "hexoct") {
            $this->result = base_convert($num, 16, 8);
        } else {
            $this->result = $change($num);
        }
    }
}