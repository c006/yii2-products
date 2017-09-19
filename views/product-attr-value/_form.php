<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductAttrValue */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="product-attr-value-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?
    $model_link = \c006\products\models\ProductAttr::find()->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'value');
    echo $form->field($model, 'attr_id')->dropDownList($model_link)->label('Product Attr') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


