<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\AutoShip */
/* @var $model_link array */

$this->title                   = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Auto Ship',
    ]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Ships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auto-ship-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'      => $model,
        'model_link' => $model_link,
    ]) ?>

</div>
