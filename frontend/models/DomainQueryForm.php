<?php

namespace frontend\models;

use yii\base\Model;

/**
 * DomainQueryForm is the model behind the domainQuery form.
 */
class DomainQueryForm extends Model
{
    public string $domain = '';
    public string $unit = '';
    public string $icpCode = '';
    public string $passTime = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['domain'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'domain' => '域名',
            'unit' => '备案单位',
            'icpCode' => 'ICP备案号',
            'passTime' => '备案时间',
        ];
    }
}
