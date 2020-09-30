<?php

namespace app\components;

use app\models\MenuPanel;
use app\assets\AppAsset;

class MenuHelper
{

    public static function getMenu()
    {
        $role_id = 1;
        $result = static::getMenuRecrusive($role_id);
        return $result;
    }

    private static function getMenuRecrusive($parent)
    {

        $items = MenuPanel::find()
            ->where(['c_parentid' => $parent])
            ->orderBy('id')
            ->asArray()
            ->all();

        $result = []; 

        foreach ($items as $item) {
            $result[] = [
                    'label' => $item['c_name'],
                    'url' => [$item['c_redirect']],
                    'items' => static::getMenuRecrusive($item['id']),
                    '<li class="divider"></li>',
                ];
        }
        return $result;
    }

}