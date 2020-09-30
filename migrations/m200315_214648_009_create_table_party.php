<?php

use yii\db\Migration;

class m200315_214648_009_create_table_party extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%party}}', [
            'chat_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('fk_party_1_idx', '{{%party}}', 'chat_id');
        $this->addForeignKey('fk_party_1', '{{%party}}', 'chat_id', '{{%chats}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_party_2', '{{%party}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%party}}');
    }
}
