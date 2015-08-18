<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Factory]].
 *
 * @see Factory
 */
class FactoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Factory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Factory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}