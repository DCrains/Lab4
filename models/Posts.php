<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $thread_id
 * @property string $text
 * @property int $user_from
 * @property int $user_to
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $rating
 *
 * @property Thread $thread
 * @property User $userFrom
 * @property User $userTo
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['thread_id', 'text', 'user_from', 'user_to', 'rating'], 'required'],
            [['thread_id', 'user_from', 'user_to', 'rating'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['thread_id'], 'exist', 'skipOnError' => true, 'targetClass' => Threads::className(), 'targetAttribute' => ['thread_id' => 'id']],
            [['user_from'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_from' => 'id']],
            [['user_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_to' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'thread_id' => Yii::t('app', 'Thread ID'),
            'text' => Yii::t('app', 'Text'),
            'user_from' => Yii::t('app', 'User From'),
            'user_to' => Yii::t('app', 'User To'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }

    /**
     * Gets query for [[Thread]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThread()
    {
        return $this->hasOne(Threads::className(), ['id' => 'thread_id']);
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

    /**
     * Gets query for [[UserTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_to']);
    }
}
