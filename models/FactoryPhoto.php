<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "factory_photo".
 *
 * @property integer $id
 * @property string $link
 * @property integer $news_id
 */
class FactoryPhoto extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factory_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Изображение',
        ];
    }

    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FactoryPhotoQuery(get_called_class());
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $rootPath = Yii::$app->getBasePath().'/web';
            if(file_exists($rootPath . '/uploads/factory/' . $this->link)){
                unlink($rootPath . '/uploads/factory/' . $this->link);
            }
            return true;
        } else {
            return false;
        }
    }
}
