<?php

use c006\activeForm\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductAttrType */
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-attr-type-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'element')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value_table')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'column')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'value_type')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'is_visible')->dropDownList(['No', 'Yes']) ?>

    <?= $form->field($model, 'show_in_admin')->dropDownList(['No', 'Yes']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


