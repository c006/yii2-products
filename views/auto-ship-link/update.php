<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\AutoShipLink */

$this->title                   = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Auto Ship Link',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Ship Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auto-ship-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
