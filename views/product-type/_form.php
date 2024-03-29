<?php

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductType */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="product-type-form">

    <div class="item-container">

        <?php $form = ActiveForm::begin([]); ?>

        <?
        $model_link = \c006\products\models\ProductCoreType::find()->all();
        $model_link = ArrayHelper::map($model_link, 'id', 'value');
        echo $form->field($model, 'product_core_type_id')->dropDownList($model_link)->label('Product Core Type') ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

        <?= $form->field($model, 'is_viewable')->dropDownList(['No', 'Yes']) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


