<?php

use yii\widgets\ActiveForm;
use c006\products\assets\AttrHelper;
use c006\widget\sortableList\WidgetSortableList;
use yii\bootstrap\Html;

/** @var  $model c006\products\models\ProductType */

$array_used = AttrHelper::getAttributesUsed($model->id);
//print_r($array_used); exit;

$array_available = AttrHelper::getAttrAvailable($array_used);
//print_r($array_available); exit;
?>

<style>
    .vertical-align-bottom {
        vertical-align: bottom;
    }
</style>

<link href="/css/sortable-list.css?<?= time() ?>" rel="stylesheet" type="text/css">

<div id="content">


    <div class="item-container margin-top-30 margin-bottom-20">

        <div class="form">
            <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

            <div class="table">
                <div class="table-cell padding-10 vertical-align-bottom"><?= $form->field($model, 'name'); ?></div>
                <div class="table-cell padding-10 vertical-align-bottom">
                    <?= Html::button((($model->isNewRecord) ? 'Create Set' : 'Update Set'), ['class' => 'btn btn-primary margin-bottom-15', 'id' => 'button-submit']) ?>
                </div>
            </div>

            <?= $form->field($model, 'product_core_type_id')->hiddenInput()->label(FALSE); ?>

            <div class="table">
                <div class="table-cell width-50">
                    <h2 class="title-medium">In Use</h2>

                    <? $widget_destination = WidgetSortableList::begin(
                        [
                            'array'          => $array_used,
                            'has_groups'     => TRUE,
                            'is_destination' => TRUE,
                        ]); ?>
                    <?php WidgetSortableList::end() ?>

                </div>
                <div class="table-cell">
                    <h2 class="title-medium">Available</h2>
                    <? $widget_available = WidgetSortableList::begin(
                        [
                            'array'          => $array_available,
                            'has_groups'     => FALSE,
                            'is_destination' => FALSE,
                        ]); ?>
                    <?php WidgetSortableList::end() ?>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
</div>


<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

<script type="text/javascript">
    var _wh = jQuery(window).height();

    function attribute_setup() {
        var _array = [];
        <?php if ($model->isNewRecord) : ?>

        _array = add_to_array(_array, ["Tax", "core_is_taxable"]);
        _array = add_to_array(_array, ["Description", "core_description"]);
        _array = add_to_array(_array, ["Meta", "component_keywords", "core_meta_description"]);
        _array = add_to_array(_array, ["Tags", "component_tags"]);
        _array = add_to_array(_array, ["Categories", "component_categories"]);
        _array = add_to_array(_array, ["Shipping", "core_shipping_is_oversized", "core_shipping_price_override_on", "core_shipping_price_override", "component_shipping_address_id", "component_shipping_packaging"]);
        _array = add_to_array(_array, ["Weight", "core_weight_type", "core_weight"]);
        _array = add_to_array(_array, ["Quantity", "core_qty_active", "core_qty_decrement", "core_qty"]);
        _array = add_to_array(_array, ["Pricing", "core_price", "core_discount_type", "core_discount"]);
        _array = add_to_array(_array, ["Images", "component_images"]);
        _array = add_to_array(_array, ["General", "core_name", "core_sku", "core_search_field", "core_active"]);

        <?php if($model->product_core_type_id == 1 || $model->product_core_type_id == 2) : ?>

        <?php else : ?>

        <?php endif ?>

        for (var i = 0; i < _array.length; i++) {
//            console.log(_array[i][0]);
            jQuery('#<?= $widget_destination->unique_id ?>-input').val(_array[i][0]);
            jQuery('#<?= $widget_destination->unique_id ?>-button').click();
            for (var ii = 1; ii < _array[i].length; ii++) {
                var $parent = jQuery('#<?= $widget_destination->unique_id ?>')
                    .find('#<?= $widget_destination->unique_id ?>-' + _array[i][0].toLocaleLowerCase())
                    .find('> ul');
                jQuery('li[item_name=' + _array[i][ii] + ']').appendTo($parent);


            }
        }
        <?php endif ?>

        jQuery('.<?= $widget_destination->class_name ?>-close')
            .click(function () {
                var $parent = jQuery(this).parent().parent();
                $parent.find('li')
                    .each(function (i, _item) {
                        var $available = jQuery('#<?= $widget_available->unique_id ?>')
                            .find('ul.<?= $widget_available->class_name ?>-ul');
                        jQuery(_item).prependTo($available);
                    });
                $parent.empty().remove();
            });


    }

    function add_to_array(_array, add_array) {
        var _i = _array.length;
        _array[_i] = [];
        for (var i = 0; i < add_array.length; i++) {
            _array[_i][i] = add_array[i];
        }
        return _array;
    }

    function on_submit_0001() {
        jQuery('#<?= $widget_destination->unique_id ?>')
            .find('.<?= $widget_destination->class_name ?>-group-container')
            .find('> div')
            .each(function (_i) {
                var $group = jQuery(this);
                var $form = jQuery('#<?= $form->id ?>');

                $form.append('' +
                    '<input name="Sections[' + _i + '][0][id]" value="' + $group.attr('item_id') + '" type="hidden" />' +
                    '<input name="Sections[' + _i + '][0][value]" value="' + $group.attr('item_name') + '" type="hidden" />' +
                    '<input name="Sections[' + _i + '][0][position]" value="' + _i + '" type="hidden" />');
                $group.find('li')
                    .each(function (pos) {
                        $form.append('' +
                            '<input name="Sections[' + _i + '][' + jQuery(this).attr('item_id') + '][value]" value="' + jQuery(this).attr('item_id') + '" type="hidden" />' +
                            '<input name="Sections[' + _i + '][' + jQuery(this).attr('item_id') + '][link_id]" value="' + jQuery(this).attr('item_link_id') + '" type="hidden" />' +
                            '<input name="Sections[' + _i + '][' + jQuery(this).attr('item_id') + '][position]" value="' + (pos) + '" type="hidden" />');
                    });
            });
        jQuery('#<?= $form->id ?>').submit();
    }

    jQuery(function () {
        jQuery('#button-submit')
            .click(function () {
                on_submit_0001();
            });

        attribute_setup();
    });

</script>