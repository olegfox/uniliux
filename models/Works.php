<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "works".
 *
 * @property integer $id
 * @property string $img
 * @property string $title
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $text
 * @property integer $position
 */
class Works extends \yii\db\ActiveRecord
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
        return 'works';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['position'], 'integer'],
            [['img', 'title', 'description', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
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
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'text' => 'Text',
            'position' => 'Position',
        ];
    }

    /**
     * @inheritdoc
     * @return WorksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorksQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate()) {
            $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
            $this->img = $newFileName;
            $this->imgFile->saveAs('uploads/works/' . $newFileName);
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
