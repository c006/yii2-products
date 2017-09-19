<?php

namespace c006\products\models;

use Yii;

/**
 * @property integer $product_id
 * @property string  $product_type_id
 * @property string  $component_categories
 * @property boolean $component_images
 * @property integer $component_pricing
 * @property integer $component_symbolic_url
 * @property float   $core_active
 * @property string  $core_name
 * @property string  $core_sku
 * @property string  $core_upc
 */
class GridViewAttr extends \yii\db\ActiveRecord
{
    public $product_id;
    public $product_type_id;
    public $component_categories;
    public $component_images;
    public $component_pricing;
    public $component_symbolic_url;
    public $core_active;
    public $core_name;
    public $core_sku;
    public $core_upc;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return ['product', 'product_type', 'product_attr'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }
}
