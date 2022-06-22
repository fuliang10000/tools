<?php

namespace frontend\models;

use yii\base\Model;

/**
 * BaseChangeForm is the model behind the baseChange form.
 */
class BaseChangeForm extends Model
{
    public $num;
    public $change;
    public $result = '';

    public static $_changeList = [
        'decbin' => '10进制转2进制',
        'decoct' => '10进制转8进制',
        'dechex' => '10进制转16进制',
        'binoct' => '2进制转8进制',
        'bindec' => '2进制转10进制',
        'binhex' => '2进制转16进制',
        'octbin' => '8进制转2进制',
        'octdec' => '8进制转10进制',
        'octhex' => '8进制转16进制',
        'hexbin' => '16进制转2进制',
        'hexoct' => '16进制转8进制',
        'hexdec' => '16进制转10进制',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'change'], 'required'],
            ['change', 'in', 'range' => array_keys(static::$_changeList)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num' => '原始数',
            'change' => '转换规则',
            'result' => '结果',
        ];
    }
}
