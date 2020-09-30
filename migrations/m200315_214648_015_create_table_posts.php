<?php

use yii\db\Migration;

class m200315_214648_015_create_table_posts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'thread_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'user_from' => $this->integer()->notNull(),
            'user_to' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'rating' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('fk_posts_1_idx', '{{%posts}}', 'thread_id');
        $this->createIndex('id_UNIQUE', '{{%posts}}', 'id', true);
        $this->addForeignKey('fk_posts_1', '{{%posts}}', 'thread_id', '{{%threads}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_posts_2', '{{%posts}}', 'user_from', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_posts_3', '{{%posts}}', 'user_to', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%posts}}');
    }
}
