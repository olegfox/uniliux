<?php

use yii\db\Schema;
use yii\db\Migration;

class m150817_101711_extend_status_table_for_slugs extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->addColumn('{{%menu}}','slug',Schema::TYPE_STRING.' NOT NULL');
    }

    public function down()
    {
        echo "m150817_101711_extend_status_table_for_slugs cannot be reverted.\n";
        $this->dropColumn('{{%menu}}','slug');
        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
