<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\SortTagGroups */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sort Tag Groups',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sort Tag Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sort-tag-groups-update">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_link' => $model_link,
    ]) ?>

</div>
