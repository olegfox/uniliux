<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Works]].
 *
 * @see Works
 */
class WorksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Works[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Works|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}