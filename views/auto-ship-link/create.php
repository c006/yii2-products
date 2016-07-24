<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\AutoShipLink */

$this->title                   = Yii::t('app', 'Create Auto Ship Link');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Ship Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-ship-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
