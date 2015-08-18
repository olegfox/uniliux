<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property string $img
 * @property string $title
 * @property string $description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $text
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imgFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['img', 'title', 'description', 'meta_title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['imgFile'], 'file', 'skipOnEmpty' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'title' => 'Title',
            'description' => 'Description',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'text' => 'Text',
        ];
    }

    /**
     * @inheritdoc
     * @return ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate()) {
            $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
            $this->img = $newFileName;
            $this->imgFile->saveAs('uploads/service/' . $newFileName);
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
