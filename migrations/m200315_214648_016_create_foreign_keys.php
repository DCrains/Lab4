<?php

use yii\db\Migration;

class m200315_214648_016_create_foreign_keys extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk_menu_panel_1', '{{%menu_panel}}', 'c_parentid', '{{%menu_panel}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        echo "m200315_214648_016_create_foreign_keys cannot be reverted.\n";
        return false;
    }
}
