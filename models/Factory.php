<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "factory".
 *
 * @property integer $id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $text
 * @property integer $position
 * @property string $img
 */
class Factory extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imgFile;

    /**
     * @var UploadedFile
     */
    public $photos;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factory';
    }

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'title',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]
        ];
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
            [['title', 'meta_title', 'meta_description', 'meta_keywords', 'img'], 'string', 'max' => 255],
            [['imgFile'], 'file', 'skipOnEmpty' => true],
            [['photos'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'meta_title' => 'Мета-заголовок',
            'meta_description' => 'Мета-описание',
            'meta_keywords' => 'Ключевые слова',
            'text' => 'Текст',
            'position' => 'Позиция',
            'img' => 'Изображение',
            'photos' => 'Фотографии'
        ];
    }

    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FactoryQuery(get_called_class());
    }

    public function getPhotos(){
        $photos = FactoryPhoto::find()
            ->where(['factory_id' => $this->id])
            ->all();

        return $photos;
    }

    public function upload()
    {
        if ($this->validate()) {
            if(is_object($this->imgFile)){
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
                $this->img = $newFileName;
                $this->imgFile->saveAs('uploads/factory/' . $newFileName);
                $this->save();
                return true;
            }
        } else {
            return false;
        }
    }

    public function uploadPhotos()
    {
        // if ($this->validate()) {
            foreach ($this->photos as $photo) {
                $factoryPhoto = new FactoryPhoto();
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $photo->extension;
                $factoryPhoto->link = $newFileName;
                $factoryPhoto->factory_id = $this->id;
                $photo->saveAs('uploads/factory/' . $newFileName);
                $factoryPhoto->save();
            }
            return true;
        // } else {
        //     return false;
        // }
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $rootPath = Yii::$app->getBasePath().'/web';
            if(file_exists($rootPath . '/uploads/factory/' . $this->img) && is_file($rootPath . '/uploads/factory/' . $this->img)){
                unlink($rootPath . '/uploads/factory/' . $this->img);
            }

            foreach($this->getPhotos() as $photo){
                $photo->delete();
            }

            return true;
        } else {
            return false;
        }
    }
}
