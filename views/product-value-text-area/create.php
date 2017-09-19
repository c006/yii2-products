<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductValueTextArea */

$this->title                   = Yii::t('app', 'Create Product Value Text Area');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Value Text Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-value-text-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
