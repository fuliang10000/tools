<?php

namespace frontend\models;

use yii\base\Model;

/**
 * RunPhpCodeForm is the model behind the RunPhpCode form.
 */
class RunPhpCodeForm extends Model
{
    public string $code = '';
    public string $result = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'php源代码',
            'result' => '运行结果',
        ];
    }
}
