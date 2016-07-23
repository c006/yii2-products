<?php

use c006\activeForm\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\ProductAttr */
/* @var $model_link array */
/* @var $form c006\activeForm\ActiveForm; */
?>

<div class="product-attr-form">


    <?php $form = ActiveForm::begin([]); ?>
    <div class="table">
        <div class="table-cell">

            <?
            $model_link = \c006\products\models\ProductAttrType::find()->all();
            $model_link = ArrayHelper::map($model_link, 'id', 'name');
            echo $form->field($model, 'attr_type_id')->dropDownList($model_link)->label('Product Attr Type') ?>

            <?= $form->field($model, 'label')->textInput(['maxlength' => TRUE]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

            <?= $form->field($model, 'default_value')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'is_unique_value')->dropDownList(['No', 'Yes']) ?>

            <?= $form->field($model, 'css_style')->textInput(['maxlength' => TRUE]) ?>

            <?= $form->field($model, 'hint')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'is_core')->dropDownList(['No', 'Yes']) ?>

            <?= $form->field($model, 'is_required')->dropDownList(['No', 'Yes']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <?php if ($model->attr_type_id == 5) : ?>
        <div class="table-cell width-50 padding-left-20">
            <?= Html::button('Add Value', ['class' => 'btn btn-primary', 'id' => 'button-add-value']) ?>
            <div id="link-container">
                <?php if (sizeof($model_link_value) > 0): ?>
                    <?php foreach ($model_link_value as $i => $item) : ?>
                        <div class="table relative item-link form-group">
                            <span title="remove" alt="remove" class="icon icon-delete icon-top-right pointer"></span>
                            <div class="table-cell width-50 padding-top-10">
                                <label>Name</label>
                                <input name="ModelLinkValue[<?= $i ?>][name]" class="form-control" value="<?= $item['name'] ?>">
                            </div>
                            <div class="table-cell">
                                <label>Value</label>
                                <input name="ModelLinkValue[<?= $i ?>][value]" class="form-control" value="<?= $item['value'] ?>">
                            </div>
                            <input type="hidden" name="ModelLinkValue[<?= $i ?>][id]" value="<?= $item['id'] ?>"/>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
        <?php endif ?>
        <?php ActiveForm::end(); ?>


    </div>

    <?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

    <script type="text/javascript">
        jQuery(function () {

            jQuery('#button-add-value')
                    .click(function () {
                        add_link(jQuery('.item-link').length);
                    });

            function add_link($i) {
                var html = '' +
                        '<div class="table relative item-link form-group">' +
                        '       <span class="icon icon-delete icon-top-right pointer" alt="remove" title="remove"></span>' +
                        '    <div class="table-cell width-50 padding-top-10">' +
                        '        <label>Name</label>' +
                        '        <input name="ModelLinkValue[' + $i + '][name]" class="form-control" value="">' +
                        '    </div>' +
                        '    <div class="table-cell">' +
                        '        <label>Value</label>' +
                        '        <input name="ModelLinkValue[' + $i + '][value]" class="form-control" value="">' +
                        '    </div>' +
                        '</div>' +
                        '';
                var $tc = jQuery('#link-container');
                $tc.append(html);
                remove_ship();
            }

            function remove_ship() {
                jQuery('#link-container')
                        .find('.icon-delete')
                        .unbind('click')
                        .bind('click',
                                function () {
                                    jQuery(this).parent().empty().remove();
                                });
            }

            remove_ship();
        });
    </script>


