<?php

use yii\db\Migration;

class m200315_214648_007_create_table_chats extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%chats}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'creator_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_chats_1', '{{%chats}}', 'creator_id', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%chats}}');
    }
}
