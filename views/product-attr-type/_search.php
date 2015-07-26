<?php

use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $model c006\products\models\search\ProductAttrType */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="product-attr-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'element') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'value_table') ?>

    <?php // echo $form->field($model, 'column') ?>

    <?php // echo $form->field($model, 'value_type') ?>

    <?php // echo $form->field($model, 'is_visible') ?>

    <?php // echo $form->field($model, 'show_in_admin') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
