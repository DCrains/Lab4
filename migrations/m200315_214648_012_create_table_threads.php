<?php

use yii\db\Migration;

class m200315_214648_012_create_table_threads extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%threads}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'user_from' => $this->integer()->notNull(),
            'forum_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'text' => $this->text()->notNull(),
            'rating' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('fk_threads_1_idx', '{{%threads}}', 'forum_id');
        $this->createIndex('id_UNIQUE', '{{%threads}}', 'id', true);
        $this->addForeignKey('fk_threads_1', '{{%threads}}', 'forum_id', '{{%forums}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_threads_2', '{{%threads}}', 'user_from', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%threads}}');
    }
}
