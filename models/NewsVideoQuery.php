<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NewsVideo]].
 *
 * @see NewsVideo
 */
class NewsVideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NewsVideo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NewsVideo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}