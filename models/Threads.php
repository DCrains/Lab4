<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "threads".
 *
 * @property int $id
 * @property string $name
 * @property int $user_from
 * @property int $forum_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $text
 * @property int $rating
 *
 * @property Post[] $posts
 * @property Forum $forum
 * @property User $userFrom
 */
class Threads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'threads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_from', 'forum_id', 'text', 'rating'], 'required'],
            [['user_from', 'forum_id', 'rating'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['forum_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forums::className(), 'targetAttribute' => ['forum_id' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'user_from' => Yii::t('app', 'User From'),
            'forum_id' => Yii::t('app', 'Forum ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'text' => Yii::t('app', 'Text'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['thread_id' => 'id']);
    }

    /**
     * Gets query for [[Forum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(Forums::className(), ['id' => 'forum_id']);
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
