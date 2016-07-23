<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\PriceTier */
/* @var $model_link c006\products\models\PriceTierLink */

$this->title                   = Yii::t('app', 'Update {modelClass} ', [
        'modelClass' => 'Price Tier',
    ]) . ' ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Price Tiers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="price-tier-update">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'      => $model,
        'model_link' => $model_link,
    ]) ?>

</div>
