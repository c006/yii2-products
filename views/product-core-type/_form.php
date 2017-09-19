<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductCoreType */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="product-core-type-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => TRUE]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


