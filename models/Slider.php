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
    public $logoFile;

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
            [['imgFile'], 'file', 'skipOnEmpty' => true],
            
            [['logo'], 'string', 'max' => 255],
            [['logoFile'], 'file', 'skipOnEmpty' => true]
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
            'logo' => 'Logo'
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
            if($this->imgFile){
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
                $this->img = $newFileName;
                
                //echo $this->img;
                //exit;
                
                $this->imgFile->saveAs('uploads/slider/' . $newFileName);
            }
            
            if($this->logoFile){
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->logoFile->extension;
                $this->logo = $newFileName;
                
                //echo $this->logo;
                //exit;
                
                $this->logoFile->saveAs('uploads/slider/' . $newFileName);
            }
            
            $this->save();
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $rootPath = Yii::$app->getBasePath().'/web';
            if(!empty($this->img) && file_exists($rootPath . '/uploads/slider/' . $this->img)){
                unlink($rootPath . '/uploads/slider/' . $this->img);
            }
            if(!empty($this->logo) && file_exists($rootPath . '/uploads/slider/' . $this->logo)){
                unlink($rootPath . '/uploads/slider/' . $this->logo);
            }
            return true;
        } else {
            return false;
        }
    }
}
