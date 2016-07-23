<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\PriceTier */

$this->title = Yii::t('app', 'Create Price Tier');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Price Tiers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-tier-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_link' => $model_link,
    ]) ?>

</div>
