<?php

namespace frontend\models;

use yii\base\Model;

/**
 * IpQueryForm is the model behind the IpQuery form.
 */
class IpQueryForm extends Model
{
    public $ip;
    public $result = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip'], 'required'],
            ['ip', 'ip', 'message' => '请输入一个有效的ip地址'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ip' => 'ip地址',
            'result' => 'ip地址归属地',
        ];
    }
}
