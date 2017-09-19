<?php
/** @var $appProduct AppProduct */
/** @var $array Array */
/** @var $item Array */
?>


<div class="row">
    <input type="button" id="ProductUrl_add" value="Add URL"/>
</div>
<div id="ProductUrl-container">
    <label>Custom URL</label>
    <?php foreach ($array as $row) : ?>
        <div class="row" style="white-space: nowrap;">
            <input type="text" class="ProductUrl" value="<?php echo $row['value'] ?>" name="ProductUrl[<?php echo $row['id'] ?>]" id="ProductUrl_<?php echo $row['id'] ?>" item_id="<?php echo $row['id'] ?>" style="display:inline-block; min-width: 350px;">
            <img class="ProductUrl-delete" src="/images/common/delete-sml.png" width="18" height="18" alt="Close" style="vertical-align: middle;"/>
        </div>
    <?php endforeach ?>
</div>
<script type="text/javascript">
    jQuery(function () {
        jQuery('#ProductUrl_add').bind('click',
            function () {
                var _i = jQuery('.ProductUrl:last-child').attr('item_id');
                component_url_add(_i + 1);
            });
        jQuery('.ProductUrl-delete').bind('click',
            function () {
                var $this = jQuery(this).parent().find('input');
                var _id = $this.attr('item_id');
                if (!_id) {
                    $this.parent().empty().remove();
                } else {
                    $this.attr("name", 'ProductUrl[delete][' + _id + ']').attr('type', 'hidden');
                    jQuery(this).remove();
                }
            });

        function component_url_add(_i) {
            var _html = '' +
                '<div class="row">' +
                '<input type="text" value="/" class="ComponentUrl" name="ProductUrl[' + _i + ']" id="ProductUrl_' + _i + '" style="min-width: 350px;">' +
                '</div>';
            jQuery('#ProductUrl-container').append(_html);
        }


    });
</script>
