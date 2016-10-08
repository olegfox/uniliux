<?php

use yii\db\Schema;
use yii\db\Migration;

class m150817_101711_extend_status_table_for_slugs extends Migration
{
    public function up()
    {
        $this->addColumn('{{%menu}}','slug',Schema::TYPE_STRING.' NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%menu}}','slug');
        return false;
    }
}
