<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $text
 * @property integer $position
 * @property string $img
 * @property string $file
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imgFile;

    /**
     * @var UploadedFile
     */
    public $fileObject;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
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
            [['imgFile', 'fileObject'], 'file', 'skipOnEmpty' => true]
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
            'file' => 'Файл'
        ];
    }

    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CatalogQuery(get_called_class());
    }

    public function uploadFile()
    {
        if ($this->validate()) {
            if(is_object($this->fileObject)){
                $fileName = $this->fileObject->getBaseName() . '.' . $this->fileObject->getExtension();
                $this->file = $fileName;
                $this->fileObject->saveAs('uploads/catalog/' . $fileName);
                $this->save();
                return true;
            }
        } else {
            return false;
        }
    }

    public function upload()
    {
        if ($this->validate()) {
            if(is_object($this->imgFile)){
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
                $this->img = $newFileName;
                $this->imgFile->saveAs('uploads/catalog/' . $newFileName);
                $this->save();
                return true;
            }
        } else {
            return false;
        }
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $rootPath = Yii::$app->getBasePath().'/web';

            if(file_exists($rootPath . '/uploads/catalog/' . $this->img) && is_file($rootPath . '/uploads/catalog/' . $this->img)){
                unlink($rootPath . '/uploads/catalog/' . $this->img);
            }

            if(file_exists($rootPath . '/uploads/catalog/' . $this->file) && is_file($rootPath . '/uploads/catalog/' . $this->file)){
                unlink($rootPath . '/uploads/catalog/' . $this->file);
            }
            return true;
        } else {
            return false;
        }
    }
}
