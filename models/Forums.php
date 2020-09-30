<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forums".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Thread[] $threads
 */
class Forums extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'description', 'created_at', 'updated_at'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Threads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThreads()
    {
        return $this->hasMany(Threads::className(), ['forum_id' => 'id']);
    }
}
