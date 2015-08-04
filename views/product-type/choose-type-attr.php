<?php

use c006\activeForm\ActiveForm;
use c006\products\assets\AttrHelper;
use c006\products\models\ProductType;
use c006\widget\sortableList\SortableList;
use yii\bootstrap\Html;

/** @var  $model c006\products\models\ProductType */

$attributes_used = AttrHelper::getAttributesUsed($model->id);

//print_r($attributes_used); exit;

$attributes_available = AttrHelper::getAttributesAvailable($attributes_used);

//print_r($attributes_available); exit;
?>
<style type="text/css">
    .page-column {
        margin  : 0 20px 20px;
        padding : 0 20px 20px;
        border  : 1px dotted #CCCCCC;
    }

    .group-title {
        display     : block;
        padding     : 3px;
        margin      : 5px;
        font-weight : bold;
    }

    .page-sortable {
        display            : block;
        margin-right       : 15px;
        margin-bottom      : 10px;
        border             : 1px solid #CCCCCC;
        border-radius      : 5px;
        -moz-border-radius : 5px;
    }

    .round-corners {
        border-radius      : 5px;
        -moz-border-radius : 5px;
    }
</style>
<style type="text/css">
    .widget-sortable {
        width           : 100%;
        min-height      : 30px;
        list-style-type : none;
        margin          : 3px 30px 3px 3px;
        padding         : 3px;
    }

    .widget-sortable li {
        display   : block;
        width     : 100%;
        padding   : 3px;
        margin    : 3px 3px 3px 0;
        font-size : 1.15em;
    }

    #widget-attributes-container {
        white-space : nowrap;
    }

    .page-sortable-close {
        display               : inline-block;
        position              : absolute;
        right                 : 5px;
        background-color      : #dcdcdc;
        color                 : #444444;
        padding               : 0 6px;

        font-size             : 0.8em;

        -webkit-border-radius : 8px;
        -moz-border-radius    : 8px;
        border-radius         : 8px;

        cursor                : pointer;
        z-index               : 1000;
    }
</style>

<div id="content">

    <div class="title-large"></div>

    <div class="form">
        <?php $form = ActiveForm::begin(['id' => 'form-submit']); ?>

        <?= $form->field($model, 'name')->hint('Internal reference only'); ?>

        <?= $form->field($model, 'product_core_type_id')->hide(); ?>

        <div class="table">
            <div class="table-cell vertical-align-top">
                <input id="group" type="text" class="form-control" placeholder="group container name"/>
            </div>
            <div class="table-cell vertical-align-top">
                <?= Html::button('Add Group Container', ['class' => 'btn btn-success', 'id' => 'button-group']) ?>
            </div>
        </div>

        <div class="table">

            <div class="table-cell item-container" style="width: 50%">
                <h2 class="title-medium">In Use</h2>


                <?= SortableList::widget(
                    [
                        'array'        => $attributes_used,
                        'li_class'     => 'page-sortable ui-state-default round-corners cursor-move',
                        'ul_class'     => 'widget-sortable',
                        'ul_id'        => 'widget-groups',
                        'group_class'  => 'page-sortable',
                        'container_id' => 'widget-groups-container',
                        'has_groups'   => TRUE,
                    ]); ?>
            </div>
            <div class="table-cell item-container">
                <h2 class="title-medium">Available</h2>
                <?= SortableList::widget(
                    [
                        'array'        => $attributes_available,
                        'li_class'     => 'page-sortable ui-state-default round-corners cursor-move',
                        'ul_class'     => 'widget-sortable',
                        'ul_id'        => 'widget-attributes',
                        'container_id' => 'widget-attributes-container',
                        'has_groups'   => FALSE,
                    ]); ?>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::button((($model->isNewRecord) ? 'Create Set' : 'Update Set'), ['class' => 'btn btn-primary', 'id' => 'button-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>

<script type="text/javascript">
    var _wh = jQuery(window).height();

    jQuery(function () {
        jQuery('#button-group').bind('click',
            function () {
                var $group = jQuery('#group');
                var $groups = jQuery('#widget-groups-container');
                var group_id = 'groups-' + $group.val().replace(/[^0-9|A-Z|_]/gi, '').toLocaleLowerCase();
                $groups.append('' +
                    '<div id="' + group_id + '" class="page-sortable"  item_name="' + $group.val() + '" >' +
                    '<div class="group-title round-corners ui-state-active" style="position: relative; cursor: move;" >' +
                    $group.val() +
                    '<span class="page-sortable-close" item_id="' + group_id + '">x</span>' +
                    '</div >' +
                    '<ul class="widget-sortable" id="widget-attributes" ></ul >' +
                    '</div >');
                $group.val("");
                update_on_click();
                widget_update_sortable();
            });
        update_on_click();
        attribute_setup();
    });

    function update_on_click() {
        jQuery('.page-sortable-close')
            .unbind('click')
            .bind('click',
            function () {
                var $this = jQuery(this);
                var _id = $this.attr('item_id');
                jQuery('#' + _id + ' ul > li').each(function (i, _item) {
                    jQuery('ul.widget-available').append(_item);
                });
                jQuery('#' + _id).empty().remove();
            });

        jQuery('#button-submit').click(function () {
            on_submit();
        });
    }

    function attribute_setup() {
        var _array = [];
        <?php if ($model->isNewRecord) : ?>
        _array = add_to_array(_array, ["General", "core_name", "core_sku", "core_search_field", "core_active"]);
        _array = add_to_array(_array, ["Images", "component_images"]);
        _array = add_to_array(_array, ["Pricing", "core_price", "core_discount_type", "core_discount"]);
        _array = add_to_array(_array, ["Quantity", "core_qty_active", "core_qty_decrement", "core_qty"]);
        _array = add_to_array(_array, ["Weight", "core_weight_type", "core_weight"]);
        _array = add_to_array(_array, ["Shipping", "core_shipping_is_oversized", "core_shipping_price_override_on", "core_shipping_price_override", "component_shipping_address_id", "component_shipping_packaging"]);
        _array = add_to_array(_array, ["Categories", "component_categories"]);
        _array = add_to_array(_array, ["Tags", "component_tags"]);
        _array = add_to_array(_array, ["Meta", "component_keywords", "core_meta_description"]);
        _array = add_to_array(_array, ["Description", "core_description"]);
        _array = add_to_array(_array, ["Tax", "core_is_taxable"]);

        <?php if($model->product_core_type_id == 1 || $model->product_core_type_id == 2) : ?>

        <?php else : ?>

        <?php endif ?>


        for (var i = 0; i < _array.length; i++) {
            jQuery('#group').val(_array[i][0]);
            jQuery('#button-group').click();
            for (var ii = 1; ii < _array[i].length; ii++) {
                jQuery('li[item_name=' + _array[i][ii] + ']').appendTo('#groups-' + _array[i][0].replace(/[^0-9|A-Z|_]/gi, '').toLocaleLowerCase() + ' > ul:first');
            }
        }
        <?php endif ?>
    }

    function add_to_array(_array, add_array) {
        var _i = _array.length;
        _array[_i] = [];
        for (var i = 0; i < add_array.length; i++) {
            _array[_i][i] = add_array[i];
        }
        return _array;
    }

    function on_submit() {
        var _pos = 1;
        var _i = 0;
        jQuery('#widget-groups-container > div')
            .each(function () {
                var $group = jQuery(this);
                jQuery('#<?= $form->id ?>')
                    .append('' +
                    '<input name="Sections[' + _i + '][0][id]" value="' + $group.attr('id').replace(/[^0-9]/g, '') + '" type="hidden" />' +
                    '<input name="Sections[' + _i + '][0][value]" value="' + $group.attr('item_name') + '" type="hidden" />' +
                    '<input name="Sections[' + _i + '][0][position]" value="' + _pos++ + '" type="hidden" />');
                jQuery(this).find('li')
                    .each(function () {
                        jQuery('#<?= $form->id ?>')
                            .append('' +
                            '<input name="Sections[' + _i + '][' + jQuery(this).attr('item_id') + '][value]" value="' + jQuery(this).attr('item_id') + '" type="hidden" />' +
                            '<input name="Sections[' + _i + '][' + jQuery(this).attr('item_id') + '][position]" value="' + _pos++ + '" type="hidden" />');
                    });
                _i++;
            });
        jQuery('#<?= $form->id ?>').submit();
    }
</script>