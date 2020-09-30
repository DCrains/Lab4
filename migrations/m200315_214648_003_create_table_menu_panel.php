<?php

use yii\db\Migration;

class m200315_214648_003_create_table_menu_panel extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu_panel}}', [
            'id' => $this->primaryKey(),
            'c_type' => $this->string(60),
            'c_parentid' => $this->integer(),
            'c_name' => $this->string(60),
            'c_redirect' => $this->string(60),
        ], $tableOptions);

        $this->createIndex('fk_menu_panel_1', '{{%menu_panel}}', 'c_parentid');
    }

    public function down()
    {
        $this->dropTable('{{%menu_panel}}');
    }
}
