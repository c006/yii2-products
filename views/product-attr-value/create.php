<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttrValue */

$this->title = Yii::t('app', 'Create Product Attr Value');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attr Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
