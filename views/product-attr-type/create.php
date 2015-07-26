<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttrType */

$this->title = Yii::t('app', 'Create Product Attr Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attr Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attr-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
