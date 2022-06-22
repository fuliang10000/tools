<?php

namespace frontend\models;

use yii\base\Model;

/**
 * UploadImageForm is the model behind the uploadImage form.
 */
class UploadImageForm extends Model
{

    public $file;
    public $result = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'jpg,jpeg,png', 'mimeTypes' => 'image/jpeg,image/png'],
        ];
    }
}
