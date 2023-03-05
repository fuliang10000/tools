<?php

namespace frontend\models;

use yii\base\Model;

/**
 * IdcardQueryForm is the model behind the idcardQuery form.
 */
class IdcardQueryForm extends Model
{
    public string $idcard = '';
    public string $address = '';
    public string $sex = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcard'], 'required'],
            [['idcard'], 'match', 'pattern' => '/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/', 'message' => '身份证格式错误'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcard' => '身份证',
            'address' => '身份证归属地',
            'sex' => '性别',
        ];
    }
}
