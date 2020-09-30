<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MenuPanel */

$this->title = Yii::t('app', 'Create Menu Panel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menu Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-panel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
