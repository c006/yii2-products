<?php

use c006\products\assets\ModelHelper;

/** @var  $product_id int */

$array = ModelHelper::getSortTagsUsed($product_id);

//print_r($array);
//exit;
?>


<style>
    .items-list-container {
        display               : block;
        margin                : 10px 0;
        padding               : 5px;
        background-color      : rgba(255, 255, 255, 0.5);
        border-radius         : 5px 5px 5px 5px;
        -moz-border-radius    : 5px 5px 5px 5px;
        -webkit-border-radius : 5px 5px 5px 5px;
        }

    .items-list {
        display    : block;
        margin     : 5px;
        padding    : 5px;
        height     : 100px;
        overflow-y : scroll;
        background-color      : rgba(255, 255, 255, 0.3);
        }
</style>

<div id="tag-container">

    <?php foreach ($array as $item) : ?>
        <div class="items-list-container">
            <label class="control-label"><?= $item['name'] ?></label>
            <div class="items-list">
                <?php foreach ($item['items'] as $_item) : ?>
                    <div class="item">
                        <input type="checkbox" name="SortTag[<?= $_item['id'] ?>]" <?= ($_item['checked']) ? 'checked="checked"' : '' ?> value="<?= $_item['id'] ?>">
                        <?= $_item['name'] ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

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