<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Threads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="threads-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Threads'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'user_from',
            'forum_id',
            'created_at',
            //'updated_at',
            //'text:ntext',
            //'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
