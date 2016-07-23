<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\Product*/
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([]); ?>

        <?
 		$model_link = \c006\products\models\ProductStore::find()->all();
		$model_link = ArrayHelper::map($model_link, 'id', 'value');
		echo $form->field($model, 'store_id')->dropDownList($model_link)->label('Product Store') ?>

    <?
 		$model_link = \c006\products\models\ProductType::find()->all();
		$model_link = ArrayHelper::map($model_link, 'id', 'value');
		echo $form->field($model, 'product_type_id')->dropDownList($model_link)->label('Product Type') ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


