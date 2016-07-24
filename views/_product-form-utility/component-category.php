<?php

use c006\category\assets\AppHelper;

AppHelper::getHtmlList(0, TRUE);
?>

<style>
    #tree .checked {
        background-color :rgba(155, 202, 242, 0.51);
    }

    #tree .tree-item {
        padding               :2px;
        -webkit-border-radius :3px;
        -moz-border-radius    :3px;
        border-radius         :3px;
    }
</style>

<div id="tree">
    <ul>
        <?= AppHelper::$html ?>
    </ul>
</div>

<script type="text/javascript">
    jQuery(function () {
        jQuery('.component-category-checkbox')
            .click(function () {
                var $this = jQuery(this);
                if ($this.is(':checked')) {
                    $this.parent().addClass('checked');
                } else {
                    $this.parent().removeClass('checked');
                }
            });
    });
</script>