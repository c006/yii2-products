<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\search\ProductTypeSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-type-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_type_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'position') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
