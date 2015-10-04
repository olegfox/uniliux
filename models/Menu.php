<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $text
 * @property integer $position
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
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
            [['title', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }

    public static function getItems()
    {
        $items = [];
        $models = Menu::find()->all();
        foreach($models as $model) {
            $items[] = ['title' => $model->title, 'slug' => $model->slug];
        }

        return $items;
    }
}
