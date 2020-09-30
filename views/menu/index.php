<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menu Panels');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-panel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Menu Panel'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'c_type',
            'c_parentid',
            'c_name',
            'c_redirect',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
