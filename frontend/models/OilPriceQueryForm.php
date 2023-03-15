<?php

namespace frontend\models;

use yii\base\Model;

/**
 * OilPriceQueryForm is the model behind the OilPriceQuery form.
 */
class OilPriceQueryForm extends Model
{
    public string $province = '四川';
    public array $result = [];
    public static array $_provinces = [
        '安徽' => '安徽',
        '北京' => '北京',
        '重庆' => '重庆',
        '福建' => '福建',
        '甘肃' => '甘肃',
        '广东' => '广东',
        '广西' => '广西',
        '贵州' => '贵州',
        '海南' => '海南',
        '河北' => '河北',
        '黑龙江' => '黑龙江',
        '河南' => '河南',
        '湖北' => '湖北',
        '湖南' => '湖南',
        '江苏' => '江苏',
        '江西' => '江西',
        '辽宁' => '辽宁',
        '内蒙古' => '内蒙古',
        '宁夏' => '宁夏',
        '青海' => '青海',
        '陕西' => '陕西',
        '上海' => '上海',
        '山东' => '山东',
        '山西' => '山西',
        '四川' => '四川',
        '天津' => '天津',
        '西藏' => '西藏',
        '新疆' => '新疆',
        '云南' => '云南',
        '浙江' => '浙江',
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'province' => '省份',
            'result' => '油价',
        ];
    }
}
