<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductCoreType*/
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-core-type-form">

    <?php $form = ActiveForm::begin([]); ?>

        <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


