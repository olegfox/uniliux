<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\NewsPhoto;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property datetime $date
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $text
 * @property string $description
 * @property string $img
 * @property integer $position
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imgFile;

    /**
     * @var UploadedFile
     */
    public $photos;

    public $videoUrl;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
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
            [['title', 'date', 'position'], 'required'],
            [['date'], 'safe'],
            [['videoUrl'], 'url'],
            [['text', 'description'], 'string'],
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
            'date' => 'Дата создания',
            'meta_title' => 'Мета-заголовок',
            'meta_description' => 'Мета-описание',
            'meta_keywords' => 'Ключевые слова',
            'text' => 'Текст',
            'description' => 'Описание',
            'img' => 'Изображение',
            'imgFile' => 'Изображение',
            'photos' => 'Фотографии',
            'videoUrl' => 'Видео (Youtube, Vimeo)',
            'position' => 'Позиция'
        ];
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    public function getPhotos(){
        $photos = NewsPhoto::find()
            ->where(['news_id' => $this->id])
            ->all();

        return $photos;
    }

    public function getVideo(){
        $video = NewsVideo::find()
            ->where(['news_id' => $this->id])
            ->one();

        return $video;
    }

    public function upload()
    {
        if ($this->validate()) {
            if(is_object($this->imgFile)){
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
                $this->img = $newFileName;
                $this->imgFile->saveAs('uploads/news/' . $newFileName);
                $this->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function uploadPhotos()
    {
        if ($this->validate()) {
            foreach ($this->photos as $photo) {
                $newsPhoto = new NewsPhoto();
                $newFileName = Yii::$app->security->generateRandomString() . '.' . $this->imgFile->extension;
                $newsPhoto->link = $newFileName;
                $newsPhoto->news_id = $this->id;
                $photo->saveAs('uploads/news/' . $newFileName);
                $newsPhoto->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $rootPath = Yii::$app->getBasePath().'/web';
            if(file_exists($rootPath . '/uploads/news/' . $this->img) && is_file($rootPath . '/uploads/news/' . $this->img)){
                unlink($rootPath . '/uploads/news/' . $this->img);
            }

            foreach($this->getPhotos() as $photo){
                $photo->delete();
            }

            if(is_object($this->getVideo())){
                $this->getVideo()->delete();
            }

            return true;
        } else {
            return false;
        }
    }
}
