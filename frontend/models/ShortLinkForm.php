<?php

namespace frontend\models;

use yii\base\Model;

/**
 * ShortLinkForm is the model behind the ShortLink form.
 */
class ShortLinkForm extends Model
{
    public string $url = '';
    public string $result = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            ['url', 'url', 'message' => '请输入一个有效的url地址'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'url' => 'URL地址',
            'result' => 'URL短链接',
        ];
    }
}
