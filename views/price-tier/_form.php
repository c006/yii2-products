<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\products\models\PriceTier */
/* @var $model_link array */
/* @var $form yii\widgets\ActiveForm; */
?>

<style>
    .item-tier {
        margin: 10px;
        padding: 5px;
        border: 1px dotted #CCCCCC;

        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
    }

    .item-tier .close {
        float: none;
        text-align: right;
    }
</style>

<div class="price-tier-form">

    <div class="item-container margin-top-30">

        <?php $form = ActiveForm::begin([]); ?>

        <div class="table">
            <div class="table-cell">
                <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>
                <?= $form->field($model, 'active')->dropDownList(['No', 'Yes']) ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-secondary' : 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-cell padding-left-20" style="width: 50%">
                <?= Html::button('Add Tier', ['class' => 'btn btn-primary', 'id' => 'button-add-tier']) ?>
                <div id="tier-container">
                    <?php if (sizeof($model_link)): ?>
                        <?php foreach ($model_link as $i => $item) : ?>
                            <div class="item-tier form-group">
                                <div><label>Maximum Quantity</label>
                                    <input type="text" value="<?= $item['max_qty'] ?>" name="PriceTierLink[<?= $i ?>][max_qty]" class="form-control">
                                </div>
                                <div>
                                    <label>Price</label>
                                    <input type="text" value="<?= $item['price'] ?>" name="PriceTierLink[<?= $i ?>][price]" class="form-control">
                                </div>
                                <div>
                                    <label>Price Type</label>
                                    <select name="PriceTierLink[<?= $i ?>][is_percentage]" class="form-control">
                                        <option value="0">Price</option>
                                        <option value="1" <?= ($item['is_percentage']) ? 'selected="selected"' : '' ?>>Percentage</option>
                                    </select>
                                </div>
                                <div class="close">
                                    <span class="icon icon-delete pointer"></span>
                                </div>
                                <input type="hidden" value="<?= $item['id'] ?>" name="PriceTierLink[<?= $i ?>][id]"/>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>

        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


<script type="text/javascript">
    jQuery(function () {

        jQuery('#button-add-tier')
            .click(function () {
                add_tier(jQuery('.item-tier').length);
            });


        function add_tier($i) {
            var html = '' +
                '<div class="item-tier form-group">' +
                '    <div>' +
                '        <label>Maximum Quantity</label>' +
                '        <input type="text" class="form-control" name="PriceTierLink[' + $i + '][max_qty]" value=""/>' +
                '    </div>' +
                '    <div>' +
                '        <label>Price</label>' +
                '        <input type="text" class="form-control" name="PriceTierLink[' + $i + '][price]" value=""/>' +
                '    </div>' +
                '    <div>' +
                '        <label>Price Tier</label>' +
                '           <select name="PriceTierLink[' + $i + '][is_percentage]" class="form-control">' +
                '           <option value="0">Price</option>' +
                '           <option value="1">Percentage</option>' +
                '           </select>' +
                '    </div>' +
                '   <div class="close">' +
                '       <span class="icon icon-delete pointer"></span>' +
                '   </div>' +
                '<input type="hidden" name="PriceTierLink[' + $i + '][id]" value="0"/>' +
                '</div>' +
                '';
            var $tc = jQuery('#tier-container');
            $tc.append(html);
            remove_tier();
        }

        function remove_tier() {
            var $container = jQuery('#tier-container');
            var $icon = $container.find('.icon-delete');
            $icon.unbind('click')
                .click(
                    function () {
                        console.log("CLICK");
                        console.log(jQuery(this).parent().parent());
                        jQuery(this).parent().parent().empty().remove();
                    });
        }

        remove_tier();
    });
</script>