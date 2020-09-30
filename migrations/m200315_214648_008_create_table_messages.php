<?php

use yii\db\Migration;

class m200315_214648_008_create_table_messages extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'user_from' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'is_read' => $this->tinyInteger(4)->notNull()->defaultValue('0'),
            'chat_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('fk_messages_1_idx', '{{%messages}}', 'chat_id');
        $this->addForeignKey('fk_messages_1', '{{%messages}}', 'chat_id', '{{%chats}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_messages_2', '{{%messages}}', 'user_from', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%messages}}');
    }
}
