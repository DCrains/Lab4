<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chats".
 *
 * @property int $id
 * @property string $name
 * @property int $creator_id
 *
 * @property User $creator
 * @property Message[] $messages
 * @property Party[] $parties
 */
class Chats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'creator_id'], 'required'],
            [['creator_id'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
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
            'creator_id' => Yii::t('app', 'Creator ID'),
        ];
    }

    /**
     * Gets query for [[Creator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Messages::className(), ['chat_id' => 'id']);
    }

    /**
     * Gets query for [[Parties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParties()
    {
        return $this->hasMany(Party::className(), ['chat_id' => 'id']);
    }
}
