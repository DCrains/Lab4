<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $text
 * @property int $user_from
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $is_read
 * @property int $chat_id
 *
 * @property Chat $chat
 * @property User $userFrom
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'user_from', 'chat_id'], 'required'],
            [['text'], 'string'],
            [['user_from', 'is_read', 'chat_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['chat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chats::className(), 'targetAttribute' => ['chat_id' => 'id']],
            [['user_from'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_from' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Text'),
            'user_from' => Yii::t('app', 'User From'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'is_read' => Yii::t('app', 'Is Read'),
            'chat_id' => Yii::t('app', 'Chat ID'),
        ];
    }

    /**
     * Gets query for [[Chat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChat()
    {
        return $this->hasOne(Chats::className(), ['id' => 'chat_id']);
    }

    /**
     * Gets query for [[UserFrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserFrom()
    {
        return $this->hasOne(User::className(), ['id' => 'user_from']);
    }
}
