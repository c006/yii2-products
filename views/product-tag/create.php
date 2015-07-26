<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductTag */

$this->title = Yii::t('app', 'Create Product Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
