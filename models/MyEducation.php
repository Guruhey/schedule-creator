<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class MyEducation extends Model
{
    public $file;


    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('css/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }

}