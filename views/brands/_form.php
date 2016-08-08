<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\Brands */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="brands-form">

    <div class="item-container margin-top-30">

        <?php $form = ActiveForm::begin([]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


