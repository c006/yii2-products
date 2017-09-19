<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueUrl */

$this->title                   = Yii::t('app', 'Create Product Value Url');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Urls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-url-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
