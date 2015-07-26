<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductValueBit*/
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-value-bit-form">

    <?php $form = ActiveForm::begin([]); ?>

        <?
 		$model_link = \c006\products\models\ProductAttr::find()->all();
		$model_link = ArrayHelper::map($model_link, 'id', 'data');
		echo $form->field($model, 'attr_id')->dropDownList($model_link)->label('Product Attr') ?>

    <?
 		$model_link = \c006\products\models\Product::find()->all();
		$model_link = ArrayHelper::map($model_link, 'id', 'data');
		echo $form->field($model, 'product_id')->dropDownList($model_link)->label('Product') ?>

    <?= $form->field($model, 'data')->dropDownList(['No','Yes']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


