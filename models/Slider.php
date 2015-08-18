<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $img
 */
class Slider extends \yii\db\ActiveRecord
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
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @inheritdoc
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate()) {
            $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
            $this->img = $newFileName;
            $this->imgFile->saveAs('uploads/slider/' . $newFileName);
            $this->save();
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $rootPath = Yii::$app->getBasePath().'/web';
            if(file_exists($rootPath . '/uploads/slider/' . $this->img)){
                unlink($rootPath . '/uploads/slider/' . $this->img);
            }
            return true;
        } else {
            return false;
        }
    }
}
