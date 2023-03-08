<?php

namespace frontend\models;

use yii\base\Model;

/**
 * JsonFormatForm is the model behind the JsonFormat form.
 */
class JsonFormatForm extends Model
{
    public string $json = '';
    public string $result = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['json'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'json' => 'json数据',
            'result' => '格式化结果',
        ];
    }
}
