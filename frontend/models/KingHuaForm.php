<?php

namespace frontend\models;

use yii\base\Model;

/**
 * KingHuaForm is the model behind the KingHua form.
 */
class KingHuaForm extends Model
{
    public $people;
    public $ba;
    public $result;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people', 'ba'], 'required'],
            [['people'], 'integer', 'min' => 1, 'max' => 17],
            [['ba'], 'integer', 'min' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'people' => '玩牌人数',
            'ba' => '把数',
        ];
    }
}
