<?php

namespace frontend\models;

use yii\base\Model;

/**
 * WelfareLotteryForm is the model behind the WelfareLottery form.
 */
class WelfareLotteryForm extends Model
{
    public $result = [
        '3d' => [0, 0, 0],
        'doubleColor' => [0, 0, 0, 0, 0, 0, 0],
        'sevenColour' => [0, 0, 0, 0, 0, 0, 0, 0],
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [];
    }
}
