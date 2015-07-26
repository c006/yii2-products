<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use c006\activeForm\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductAttr*/
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-attr-form">

    <?php $form = ActiveForm::begin([]); ?>

        <?
 		$model_link = \c006\products\models\ProductAttrType::find()->all();
		$model_link = ArrayHelper::map($model_link, 'id', 'data');
		echo $form->field($model, 'attr_type_id')->dropDownList($model_link)->label('Product Attr Type') ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_unique_value')->dropDownList(['No','Yes']) ?>

    <?= $form->field($model, 'css_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hint')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_core')->dropDownList(['No','Yes']) ?>

    <?= $form->field($model, 'is_required')->dropDownList(['No','Yes']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


