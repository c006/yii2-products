<?php

use c006\products\assets\ModelHelper;
use c006\widget\sortableList\WidgetSortableList;

/** @var  $product_id int */

$array_used = ModelHelper::getTagsUsed($product_id);
$array_used = ModelHelper::addTagData($array_used);

$array_available = ModelHelper::getTagsAvailable($array_used);
//print_r($array_available);
//echo PHP_EOL . PHP_EOL;
//print_r($array_used);
//exit;
?>

<link href="/css/sortable-list.css?<?= time() ?>" rel="stylesheet" type="text/css">


<div id="tag-container">
    <div class="table">
        <div class="table-cell width-50">
            <h2 class="title-heading">In Use</h2>
            <?= WidgetSortableList::widget(
                [
                    'array'          => $array_used,
                    'is_destination' => TRUE,
                ]); ?>
        </div>
        <div class="table-cell">
            <h2 class="title-heading">Available</h2>
            <?= WidgetSortableList::widget(
                [
                    'array'          => $array_available,
                    'is_destination' => FALSE,
                ]); ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    jQuery(function () {
        jQuery('#button-submit')
            .click(function () {
                on_submit_tags();
            });
    });

    function on_submit_tags() {

        jQuery('.WidgetSortableList-destination')
            .find('.WidgetSortableList-li')
            .each(function (_i) {
                jQuery('#<?= $form->id ?>').append('' +
                    '<input name="Tags[' + _i + '][' + jQuery(this).attr('item_id') + ']" value="' + jQuery(this).attr('item_id') + '" type="hidden" />'
//                    +'<input name="Tags[' + _i + '][' + jQuery(this).attr('item_id') + '][link_id]" value="' + jQuery(this).attr('item_link_id') + '" type="hidden" />'
//                    +'<input name="Tags[' + _i + '][' + jQuery(this).attr('item_id') + '][position]" value="' + _i + '" type="hidden" />');
                );
            });

    }

</script>