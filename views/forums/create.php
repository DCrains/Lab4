<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Forums */

$this->title = Yii::t('app', 'Create Forums');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forums-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
