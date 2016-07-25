<?php

use c006\activeForm\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelc006\products\models\ProductTypeSectionAttr */
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-type-section-attr-form">

    <div class="item-container">

        <?php $form = ActiveForm::begin([]); ?>

        <?
        $model_link = \c006\products\models\ProductTypeSection::find()->all();
        $model_link = ArrayHelper::map($model_link, 'id', 'value');
        echo $form->field($model, 'product_type_section_id')->dropDownList($model_link)->label('Product Type Section') ?>

        <?
        $model_link = \c006\products\models\ProductAttr::find()->all();
        $model_link = ArrayHelper::map($model_link, 'id', 'value');
        echo $form->field($model, 'attr_id')->dropDownList($model_link)->label('Product Attr') ?>

        <?= $form->field($model, 'position')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


