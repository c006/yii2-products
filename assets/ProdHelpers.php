<?php

namespace c006\products\assets;

use c006\core\assets\CoreHelper;
use c006\products\models\AutoShipLink;
use c006\products\models\Product;
use c006\products\models\ProductAttr;
use c006\products\models\ProductAttrType;
use c006\products\models\ProductAttrValue;
use c006\products\models\ProductAutoShip;
use c006\products\models\ProductCategory;
use c006\products\models\ProductImage;
use c006\products\models\ProductPackaging;
use c006\products\models\ProductPriceTier;
use c006\products\models\ProductTag;
use c006\products\models\ProductValueUrl;
use c006\products\models\search\PriceTierLink;
use c006\products\models\search\ProductBrand;
use c006\url\assets\AppAliasUrl;
use Yii;

class ProdHelpers
{

    static public function checkLogin()
    {
        return FALSE;
    }

    static public function isGuest()
    {
        return FALSE;
    }

    /**
     * @param $product_id
     * @param $array_in
     *
     * @return bool
     */
    static public function saveProductAttr($product_id, $array_in)
    {
        if ($product_id) {

            foreach ($array_in as $key => $value) {

                $attr = ModelHelper::getAttrByName($key);
                $attr_type = ModelHelper::getAttrType($attr['attr_type_id']);
                if (sizeof($attr_type)) {
                    $model_class = 'c006\products\models\\' . FormHelper::createModelName($attr_type['value_table']);
                    $model = $model_class::find()
                        ->where(['product_id' => $product_id])
                        ->andWhere(['attr_id' => $attr['id']])
                        ->asArray()
                        ->one();
                    if (sizeof($model)) {
                        $model['value'] = $value;
                    } else {
                        $model = [
                            'product_id' => $product_id,
                            'attr_id'    => $attr['id'],
                            'value'      => $value,
                        ];
                    }
                    if (!empty($model['value'])) {
                        ModelHelper::saveModelForm($model_class, $model);
                    }
                }
            }

            return TRUE;
        }

        return FALSE;
    }

    /**
     * @param $product_id
     * @param $category_id
     */
    static public function saveProductCategories($product_id, $category_id)
    {
        $model = ProductCategory::find()
            ->where(['product_id' => $product_id])
            ->andWhere(['id' => $category_id])
            ->asArray()
            ->one();
        if (sizeof($model) == 0) {
            $model = [
                'product_id'  => $product_id,
                'category_id' => $category_id,
            ];
            ModelHelper::saveModelForm('c006\products\models\ProductCategory', $model);
        }
    }

    /**
     * @param $product_id
     * @param $tag_id
     * @param $pos
     */
    static public function saveProductTags($product_id, $tag_id, $pos)
    {
        $model = ProductTag::find()
            ->where(['product_id' => $product_id])
            ->andWhere(['id' => $tag_id])
            ->asArray()
            ->one();
        if (sizeof($model) == 0) {
            $model = [
                'product_id' => $product_id,
                'tag_id'     => $tag_id,
                'position'   => $pos,
            ];
            ModelHelper::saveModelForm('c006\products\models\ProductTag', $model);
        }
    }

    /**
     * @param $product_id
     * @param $brand_id
     */
    static public function saveProductBrands($product_id, $brand_id)
    {
        $model = ProductBrand::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();
        if (sizeof($model) == 0) {
            $model = [
                'product_id' => $product_id,
                'brand_id'   => $brand_id,
            ];
        } else {
            $model = [
                'id'         => $model['id'],
                'product_id' => $product_id,
                'brand_id'   => $brand_id,
            ];
        }

        ModelHelper::saveModelForm('c006\products\models\ProductBrand', $model);
    }

    /**
     * @param $product_id
     * @param $packaging_id
     * @param $pos
     */
    static public function saveProductPackaging($product_id, $packaging_id, $pos)
    {
        $model = ProductPackaging::find()
            ->where(['product_id' => $product_id])
            ->andWhere(['id' => $packaging_id])
            ->asArray()
            ->one();
        if (sizeof($model) == 0) {
            $model = [
                'product_id'   => $product_id,
                'packaging_id' => $packaging_id,
                'position'     => $pos,
            ];
            ModelHelper::saveModelForm('c006\products\models\ProductPackaging', $model);
        }
    }


    /**
     * @param $product_id
     * @param $auto_ship_id
     */
    static public function saveProductAutoShip($product_id, $auto_ship_id)
    {
        $model = ProductAutoShip::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();
        if (sizeof($model) == 0) {
            $model = [
                'product_id'   => $product_id,
                'auto_ship_id' => $auto_ship_id,
            ];

        } else {
            $model['auto_ship_id'] = $auto_ship_id;
        }
        ModelHelper::saveModelForm('c006\products\models\ProductAutoShip', $model);
    }

    /**
     * @param $product_id
     * @param $price_tier_id
     */
    static public function saveProductPriceTier($product_id, $price_tier_id)
    {
        $model = ProductPriceTier::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();
        if (sizeof($model) == 0) {
            $model = [
                'product_id'    => $product_id,
                'price_tier_id' => $price_tier_id,
            ];
        } else {
            $model['price_tier_id'] = $price_tier_id;
        }
        ModelHelper::saveModelForm('c006\products\models\ProductPriceTier', $model);
    }

    /**
     * @param $product_id
     * @param $public
     */
    static public function saveProductUrl($product_id, $public)
    {
        $model = ProductValueUrl::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();
        $private = 'product-detail/index?id=' . $product_id;
        $alias_url = AppAliasUrl::addAliasByPrivate($public, $private, 1);
        if (sizeof($model) == 0) {
            $model = [
                'product_id'   => $product_id,
                'alias_url_id' => $alias_url->id,
                'attr_id'      => 3,
                'value'        => $public,
            ];
        } else {
            $model['value'] = $public;
            $model['alias_url_id'] = $alias_url->id;
        }

        ModelHelper::saveModelForm('c006\products\models\ProductValueUrl', $model);

    }

    /**
     * @param $product_id
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    static public function getProductUrl($product_id)
    {
        $model = ProductValueUrl::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();
        if (sizeof($model)) {
            return $model;
        }

        return ['id' => 0, 'alias_url_id' => 0];
    }

    /**
     * @param        $product_id
     * @param string $size
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getProductImages($product_id, $size = 'lrg')
    {
        $model = ProductImage::find()
            ->where(['product_id' => $product_id]);
        if ($size) {
            $model->andWhere(['size' => $size]);
        }

        return $model->asArray()->all();
    }


    static public function getPrices($product_id)
    {
        $array = [];
        $array['price'] = 0;
        $array['sale'] = 0;
        $array['tier'] = [];
        $model = ProductPrice::find();

        return $model->asArray()->all();
    }


    /**
     * @param $product_id
     *
     * @return array|null|\yii\db\ActiveQuery|\yii\db\ActiveRecord
     */
    static public function getProduct($product_id)
    {
        $model = Product::find();
        $attrs = self::getProductAttrs($product_id);
        $select = [];
//        print_r($attrs);
//        exit;

        foreach ($attrs as $index => $item) {
            $prefix = '_' . $index;
            if (!empty($item['value_table']) && !empty($item['column'])) {
                $model->leftJoin($item['value_table'] . ' AS `' . $prefix . '`', $prefix . '.attr_id = ' . $item['id'] . ' AND ' . $prefix . '.product_id = ' . $product_id);
                $select[] = $prefix . '.' . $item['column'] . ' AS ' . $item['name'];
            } else {
                $select[] = '("NULL") AS ' . $item['name'];
            }
        }

        $model->select(join(',', $select));
        $model = $model->asArray()->one();

        return $model;
    }

    /**
     * @param $product_id
     *
     * @return mixed
     */
    static public function getProductAttrs($product_id)
    {
        $model = Product::find()
            ->select("DISTINCT `product_attr`.*,
            pat.element, pat.type, pat.value_table, pat.column")
            ->innerJoin('product_type_section', "product_type_section.product_type_id = product.product_type_id")
            ->innerJoin('product_type_section_attr', "product_type_section_attr.product_type_section_id = product_type_section.id")
            ->innerJoin('product_attr', "product_attr.id = product_type_section_attr.attr_id")
            ->innerJoin('product_attr_type pat', "pat.id = product_attr.attr_type_id")
            ->where("product.id = " . $product_id)
            ->asArray()
            ->all();

        return $model;
    }

    /**
     * @param $product_id
     * @param $attr_id
     * @return string
     */
    static public function getProductAttrValue($product_id, $attr_id)
    {
        $model_attr = ProductAttr::find()
            ->where(['id' => $attr_id])
            ->asArray()
            ->one();

        if (!sizeof($model_attr)) {
            return 'A';
        }

        $model_attr_type = ProductAttrType::find()
            ->where(['id' => $model_attr['attr_type_id']])
            ->asArray()
            ->one();

        if (!sizeof($model_attr_type) || empty($model_attr_type['value_table'])) {
            return 'B';
        }

        $model_table = 'c006\products\models\\' . ModelHelper::makeModelName($model_attr_type['value_table']);

        $model = $model_table::find()
            ->where(['product_id' => $product_id])
            ->andWhere(['attr_id' => $attr_id])
            ->asArray()
            ->one();

        return $model[$model_attr_type['column']];
    }


    /**
     * @param $product_id
     *
     * @return mixed
     */
    static public function getProductSpecs($product_id)
    {
        $model = Product::find()
            ->select("DISTINCT `product_attr`.*,
            pat.element, pat.type, pat.value_table, pat.column, pat.value_table2, pat.column2, product_type_section_attr.`position`")
            ->innerJoin('product_type_section', "product_type_section.product_type_id = product.product_type_id")
            ->innerJoin('product_type_section_attr', "product_type_section_attr.product_type_section_id = product_type_section.id")
            ->innerJoin('product_attr', "product_attr.id = product_type_section_attr.attr_id AND product_attr.show_in_specs = 1")
            ->innerJoin('product_attr_type pat', "pat.id = product_attr.attr_type_id")
            ->where("product.id = " . $product_id)
            ->orderBy("product_type_section_attr.`position` ASC")
            ->asArray()
            ->all();

        foreach ($model as $index => $item) {

            if ($item['value_table']) {
                $model_table = 'c006\products\models\\' . ModelHelper::makeModelName($item['value_table']);
                $value = $model_table::find()
                    ->where(['product_id' => $product_id])
                    ->andWhere(['attr_id' => $item['id']])
                    ->asArray()
                    ->one();

                if (isset($item['column']) && $item['column']) {
                    if ($item['attr_type_id'] != 5 && isset($model[$index])) {
                        $model[$index]['value'] = $value[$item['column']];
                    } else {
                        $model_attr_value = ProductAttrValue::findOne($value[$item['column']]);
                        $model[$index]['value'] = $model_attr_value->name;
                    }
                }
            }

            if ($item['value_table2'] && $item['column2']) {

                $sql = "SELECT * FROM `" . $item['value_table2'] . "` WHERE `id` = " . $model[$index]['value'] ;
                $connection = Yii::$app->getDb();
                $result = $connection->createCommand($sql)->queryOne();

                if (is_array($result) && sizeof($result)) {
                    $model[$index]['value'] = $result[$item['column2']];
                }
            }
        }


        foreach ($model as $index => $item) {
            if (empty($item['value'])) {
                unset($model[$index]);
            }
        }

        return $model;
    }


    /**
     * @param $category_id
     *
     * @return mixed
     */
    static public function getCategoryProducts($category_id)
    {

        $model = Product::find()
            ->select("DISTINCT `product`.*, product_image.file AS `image`, _name.value AS `name`, _price.`value` AS `price`, _discount.`value` AS `discount`
             , _url.value AS `url`")
            ->leftJoin('product_category', "product_category.product_id = product.id AND product_category.category_id = " . $category_id)
            ->leftJoin('product_image', "product_image.size = 'sml' AND product_image.product_id = product.id")
            ->leftJoin('product_value_text _name', "_name.attr_id = 1 AND _name.product_id = product.id")
            ->leftJoin('product_value_decimal _price', "_price.attr_id = 15 AND _price.product_id = product.id")
            ->leftJoin('product_value_decimal _discount', "_discount.attr_id = 16 AND _discount.product_id = product.id")
            ->leftJoin('product_value_url _url', "_url.product_id = product.id")
            ->innerJoin('product_value_bit _active', "_active.attr_id = 4 AND _active.product_id = product.id")
//            ->where(' X ')
            ->asArray()
            ->all();

        return $model;
    }

    /**
     * @param $auto_ship_id
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getAutoShipItems($auto_ship_id)
    {
        $model = AutoShipLink::find()
            ->where(['auto_ship_id' => $auto_ship_id])
            ->orderBy("position")
            ->asArray()
            ->all();

        return $model;
    }

    /**
     * @param $product_id
     *
     * @return int|mixed
     */
    static public function getAutoShipId($product_id)
    {
        $model = ProductAutoShip::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();

        if (sizeof($model)) {
            return $model['auto_ship_id'];
        }

        return 0;
    }


    /**
     * @param $product_id
     *
     * @return int|mixed
     */
    static public function getPriceTierId($product_id)
    {
        $model = ProductPriceTier::find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();

        if (sizeof($model)) {
            return $model['price_tier_id'];
        }

        return 0;
    }

    /**
     * @param $price_tier_id
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getPriceTierItems($price_tier_id)
    {
        $model = PriceTierLink::find()
            ->where(['price_tier_id' => $price_tier_id])
            ->orderBy("position")
            ->asArray()
            ->all();

        return $model;
    }

    /**
     * @param        $product_id
     * @param string $size
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    static public function getProductImage($product_id, $size = 'sml')
    {

        return ProductImage::find()
            ->where(['product_id' => $product_id])
            ->andWhere(['size' => $size])
            ->asArray()
            ->one();

    }


}
































