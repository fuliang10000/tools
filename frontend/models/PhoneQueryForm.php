<?php

namespace frontend\models;

use yii\base\Model;

/**
 * PhoneQueryForm is the model behind the phoneQuery form.
 */
class PhoneQueryForm extends Model
{
    public $phone;
    public $result = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone'], 'match', 'pattern' => '/^1[1-9][0-9]{9}$/', 'message' => '手机号格式错误'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'phone' => '手机号',
            'result' => '手机号归属地',
        ];
    }
}
