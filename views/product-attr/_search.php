<?php

use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $model c006\products\models\search\ProductAttr */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="product-attr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'attr_type_id') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'default_value') ?>

    <?php // echo $form->field($model, 'is_unique_value') ?>

    <?php // echo $form->field($model, 'css_style') ?>

    <?php // echo $form->field($model, 'hint') ?>

    <?php // echo $form->field($model, 'is_core') ?>

    <?php // echo $form->field($model, 'is_required') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
