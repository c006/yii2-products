<?php

namespace c006\products\models\form;

use Yii;

/**
          * @property string $core_name
          * @property string $core_sku
          * @property string $core_search_field
          * @property boolean $core_active
              * @property float $core_price
          * @property integer $core_discount_type
          * @property float $core_discount
          * @property boolean $core_qty_active
          * @property boolean $core_qty_decrement
          * @property integer $core_qty
          * @property integer $core_weight_type
          * @property float $core_weight
          * @property boolean $core_shipping_is_oversized
          * @property boolean $core_shipping_price_override_on
          * @property float $core_shipping_price_override
                              * @property string $core_meta_description
          * @property string $core_description
          * @property boolean $core_is_taxable
*/

class A extends \yii\db\ActiveRecord
{

    public $core_name;
    public $core_sku;
    public $core_search_field;
    public $core_active;
    public $component_images;
    public $core_price;
    public $core_discount_type;
    public $core_discount;
    public $core_qty_active;
    public $core_qty_decrement;
    public $core_qty;
    public $core_weight_type;
    public $core_weight;
    public $core_shipping_is_oversized;
    public $core_shipping_price_override_on;
    public $core_shipping_price_override;
    public $component_shipping_address_id;
    public $component_shipping_packaging;
    public $component_categories;
    public $component_tags;
    public $component_keywords;
    public $core_meta_description;
    public $core_description;
    public $core_is_taxable;

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
                        ['core_name', 'required'],
                                ['core_sku', 'required'],
                                ['core_search_field', 'required'],
                                ['core_active', 'required'],
                                ['component_images', 'required'],
                                ['core_price', 'required'],
                                ['core_discount_type', 'required'],
                                ['core_discount', 'required'],
                                ['core_qty_active', 'required'],
                                ['core_qty_decrement', 'required'],
                                ['core_qty', 'required'],
                                ['core_weight_type', 'required'],
                                ['core_weight', 'required'],
                                ['core_shipping_is_oversized', 'required'],
                                ['core_shipping_price_override_on', 'required'],
                                ['core_shipping_price_override', 'required'],
                                ['component_shipping_address_id', 'required'],
                                ['component_shipping_packaging', 'required'],
                                ['component_categories', 'required'],
                                                ['component_keywords', 'required'],
                                ['core_meta_description', 'required'],
                                ['core_description', 'required'],
                                ['core_is_taxable', 'required'],
                        ];
    }
}
