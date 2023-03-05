<?php

namespace frontend\models;

use yii\base\Model;

/**
 * SportsLotteryForm is the model behind the SportsLottery form.
 */
class SportsLotteryForm extends Model
{
    public $result = [
        'listThree' => [0, 0, 0],
        'listFive' => [0, 0, 0, 0, 0],
        'sevenStar' => [0, 0, 0, 0, 0, 0, 0],
        'bigHappy' => [0, 0, 0, 0, 0, 0, 0],
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
