<?php

use yii\db\Schema;
use yii\db\Migration;

class m161008_073155_alter_table_news extends Migration
{
    public function up()
    {
        $this->addColumn('{{%news}}','position',Schema::TYPE_INTEGER . ' NULL DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('{{%news}}','position');
    }
}
