<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_video".
 *
 * @property integer $id
 * @property integer $news_id
 * @property string $link
 * @property string $html
 * @property string $preview_image_url
 * @property string $title
 */
class NewsVideo extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_video';
    }

    /**
     * @inheritdoc
     * @return NewsVideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsVideoQuery(get_called_class());
    }
}
