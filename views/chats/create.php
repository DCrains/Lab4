<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Chats */

$this->title = Yii::t('app', 'Create Chats');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chats-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
