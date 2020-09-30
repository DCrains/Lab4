<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_panel".
 *
 * @property int $id
 * @property string|null $c_type
 * @property int|null $c_parentid
 * @property string|null $c_name
 * @property string|null $c_redirect
 *
 * @property MenuPanel $cParent
 * @property MenuPanel[] $menuPanels
 */
class MenuPanel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_panel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_parentid'], 'integer'],
            [['c_type', 'c_name', 'c_redirect'], 'string', 'max' => 60],
            [['c_parentid'], 'exist', 'skipOnError' => true, 'targetClass' => MenuPanel::className(), 'targetAttribute' => ['c_parentid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'c_type' => Yii::t('app', 'C Type'),
            'c_parentid' => Yii::t('app', 'C Parentid'),
            'c_name' => Yii::t('app', 'C Name'),
            'c_redirect' => Yii::t('app', 'C Redirect'),
        ];
    }

    /**
     * Gets query for [[CParent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCParent()
    {
        return $this->hasOne(MenuPanel::className(), ['id' => 'c_parentid']);
    }

    /**
     * Gets query for [[MenuPanels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuPanels()
    {
        return $this->hasMany(MenuPanel::className(), ['c_parentid' => 'id']);
    }
}
