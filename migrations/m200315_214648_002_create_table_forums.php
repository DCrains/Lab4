<?php

use yii\db\Migration;

class m200315_214648_002_create_table_forums extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%forums}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'description' => $this->string(45)->notNull(),
            'created_at' => $this->string(45),
            'updated_at' => $this->string(45),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%forums}}');
    }
}
