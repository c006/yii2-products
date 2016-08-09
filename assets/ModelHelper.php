<?php

namespace c006\products\assets;

use c006\alerts\Alerts;
use c006\products\models\AutoShip;
use c006\products\models\AutoShipLink;
use c006\products\models\Brands;
use c006\products\models\PriceTier;
use c006\products\models\PriceTierLink;
use c006\products\models\ProductAttr;
use c006\products\models\ProductAttrType;
use c006\products\models\ProductBrand;
use c006\products\models\ProductCategory;
use c006\products\models\ProductImage;
use c006\products\models\ProductPackaging;
use c006\products\models\ProductTag;
use c006\products\models\SortTag;
use c006\products\models\SortTagGroups;
use c006\products\models\Tags;
use c006\shipping\models\ShippingAddresses;
use c006\shipping\models\ShippingPackaging;
use Yii;

/**
 * Class ModelHelper
 * @package c006\products\assets
 */
class ModelHelper
{

    /**
     * @param $table_name
     *
     * @return mixed
     */
    static public function makeModelName($table_name)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $table_name)));
    }

    /**
     * @param $model_class
     * @param $array
     *
     * @return bool|\yii\db\ActiveRecord
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    static public function saveModelForm($model_class, $array)
    {

        /** @var  $model \yii\db\ActiveRecord */
        $model = new $model_class();

        if (isset($array['id']) && $array['id']) {
            $model->setIsNewRecord(FALSE);

        } else {
            unset($array['id']);
        }

        foreach ($array as $k => $v) {
            $model[$k] = $v;
        }

        if ($model->isNewRecord && $model->validate() && $model->save()) {
            return $model;
        } else {
            $sql = "UPDATE " . $model->getTableSchema()->fullName . " ";
            $sql .= "SET ";
            foreach ($array as $k => $v) {
                if ($k == "id") {
                    continue;
                }
                $sql .= "`" . strtolower(trim($k)) . "` = '" . addslashes(trim($v)) . "',";
            }
            $sql = rtrim($sql, ',');
            $sql .= " WHERE `id` = " . $array['id'];
            Yii::$app->db->createCommand($sql)->execute();

            return $model;
        }

        echo PHP_EOL . $model_class . "<BR>" . PHP_EOL;
        print_r($model->getErrors());
        exit;

        Alerts::setMessage('Model: ' . $model_class . '<br>Error: ' . print_r($model->getErrors(), TRUE));
        Alerts::setAlertType(Alerts::ALERT_DANGER);

        return FALSE;
    }

    /**
     * @param $model_class
     * @param $array_where
     *
     * @return bool
     */
    static public function modelValueExists($model_class, $array_where)
    {
        /** @var  $model \yii\db\ActiveRecord */
        $model = $model_class::find()
            ->where($array_where)
            ->asArray()
            ->one();

        if (is_array($model)) {
            return TRUE;
        }

        return FALSE;
    }


    /**
     * @param $model_class
     * @param $string_where
     *
     * @return mixed
     */
    static public function modelDeleteWhere($model_class, $string_where)
    {
        /** @var  $model \yii\db\ActiveRecord */
        return $model_class::deleteAll($string_where);

    }

    /**
     * @param     $product_id
     * @param     $model_class
     * @param     $value_column
     * @param int $default_value
     *
     * @return mixed|string
     */
    static public function getProductValue($product_id, $model_class, $value_column, $default_value = 0)
    {
        /** @var  $model \yii\db\ActiveRecord */
        $model = new $model_class();
        $model = $model->find()
            ->where(['product_id' => $product_id])
            ->asArray()
            ->one();
        if (sizeof($model)) {
            return $model[$value_column];
        }

        return $default_value;
    }


    /**
     * @param           $attr_id
     * @param bool|TRUE $as_array
     *
     * @return \yii\db\ActiveQuery
     */
    static public function getAttr($attr_id = 0, $as_array = TRUE)
    {
        $model = ProductAttr::find();
        $model->orderBy('name');

        if ($attr_id) {
            $model->where(['id' => $attr_id]);
        }

        if ($as_array) {
            $model->asArray();
        }

        if (!$attr_id) {
            return $model->all();
        } else {
            return $model->one();
        }
    }

    /**
     * @param           $attr_name
     * @param bool|TRUE $as_array
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    static public function getAttrByName($attr_name, $as_array = TRUE)
    {
        if ($as_array) {
            return ProductAttr::find()
                ->where(['name' => $attr_name])
                ->asArray()
                ->one();
        }

        return ProductAttr::find()
            ->where(['name' => $attr_name])
            ->one();
    }

    /**
     * @param           $attr_type_id
     * @param bool|TRUE $as_array
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    static public function getAttrType($attr_type_id, $as_array = TRUE)
    {
        if ($as_array) {
            return ProductAttrType::find()
                ->where(['id' => $attr_type_id])
                ->asArray()
                ->one();
        }

        return ProductAttrType::find()
            ->where(['id' => $attr_type_id])
            ->one();
    }


    /**
     * @param int $id
     * @param bool|TRUE $as_array
     *
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    static public function getPriceTier($id = 0, $as_array = TRUE)
    {
        if ($id) {
            $model = PriceTier::find()
                ->where(['id' => $id]);
            if ($as_array) {
                $model->asArray();
            }

            return $model->one();
        }
        $model = PriceTier::find()
            ->orderBy('name');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();

    }

    /**
     * @param           $price_tier_id
     * @param bool|TRUE $as_array
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getPriceTierLink($price_tier_id, $as_array = TRUE)
    {
        $model = PriceTierLink::find()
            ->where(['price_tier_id' => $price_tier_id])
            ->orderBy('position');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();

    }

    /**
     * @param           $product_id
     * @param bool|TRUE $as_array
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getProductImages($product_id, $as_array = TRUE)
    {
        $model = ProductImage::find()
            ->where(['product_id' => $product_id])
            ->orderBy('position');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }

    static public function getProductCategories($product_id, $as_array = TRUE)
    {
        $model = ProductCategory::find()
            ->where(['product_id' => $product_id]);
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }


    /**
     * @param int $tag_id
     * @param bool|TRUE $as_array
     *
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    static public function getTags($tag_id = 0, $as_array = TRUE)
    {
        if ($tag_id) {
            $model = Tags::find()->where(['id' => $tag_id]);

            if ($as_array) {
                $model->asArray();
            }

            return $model->one();

        }
        $model = Tags::find()->orderBy('name');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }

    /**
     * @param int $group_id
     * @param bool $as_array
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getSortTags($group_id = 0, $as_array = TRUE)
    {
        $model = SortTag::find();
        if ($group_id) {
            $model->where(['sort_tag_group_id' => $group_id]);
        }

        $model->orderBy('name');

        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }

    /**
     * @param array $in
     * @param bool $as_array
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getSortTagsIn($in = [], $as_array = TRUE)
    {
        if (!sizeof($in)) {
            return [];
        }

        $model = SortTag::find()
            ->where(" id IN ( " . join(',', $in) . ") ")
            ->orderBy('name');

        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }


    /**
     * @param int $product_id
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getSortTagsUsed($product_id = 0)
    {
        $array = [];

        $model_sort_tag_group = SortTagGroups::find()
            ->orderBy(" name ")
            ->asArray()
            ->all();

        $model = ProductTag::find()
            ->select("tag_id")
            ->where(['product_id' => $product_id])
            ->asArray()
            ->all();
        $array_product_tags = [];
        foreach ($model as $item) {
            $array_product_tags[] = $item['tag_id'];
        }

        foreach ($model_sort_tag_group as $item) {

            $array[$item['id']] = ['name' => $item['name'], 'items' => []];

            foreach (self::getSortTags($item['id']) as $_item) {
                $checked = (in_array($_item['id'], $array_product_tags) == FALSE) ? 0 : 1;
                $array[$item['id']]['items'][] = ['id' => $_item['id'], 'name' => $_item['name'], 'checked' => $checked];
            }
        }

        return $array;
    }


    /**
     * @param $array
     *
     * @return mixed
     */
    public static function addTagData($array)
    {
        if (sizeof($array)) {
            foreach ($array as $index => $item) {
                $id = (isset($item['tag_id'])) ? $item['tag_id'] : $item['id'];
                $model = self::getTags($id, TRUE);
                $array[$index] = $item;
                if (sizeof($model)) {
                    $array[$index]['name'] = $model['name'];
                }
                $array[$index]['is_required'] = 0;
                $array[$index]['data'] = (isset($item['name'])) ? $item['name'] : '';
            }
        }

        return $array;
    }


    /**
     * @param int $brand_id
     * @param bool $as_array
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    static public function getBrands($brand_id = 0, $as_array = TRUE)
    {
        if ($brand_id) {
            $model = Brands::find()->where(['id' => $brand_id]);

            if ($as_array) {
                $model->asArray();
            }

            return $model->one();

        }
        $model = Brands::find()->orderBy('name');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }


    /**
     * @param int $package_id
     * @param bool $as_array
     *
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    static public function getPackaging($package_id = 0, $as_array = TRUE)
    {
        if ($package_id) {
            $model = ShippingPackaging::find()->where(['id' => $package_id]);

            if ($as_array) {
                $model->asArray();
            }

            return $model->one();

        }
        $model = ShippingPackaging::find()->orderBy('name');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }

    /**
     * @param      $product_id
     * @param bool $as_array
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getPackagingUsed($product_id, $as_array = TRUE)
    {
        $model = ProductPackaging::find()
            ->where(['product_id' => $product_id])
            ->orderBy('position');

        if ($as_array) {
            $model->asArray();
        }

        return $model->all();
    }


    static public function getPackagingAvailable($array_used)
    {
        $array = self::getPackaging();
        $array = self::addPackagingData($array);

        foreach ($array_used as $index => $item) {
            foreach ($array as $_index => $_item) {
                if ($_item['id'] == $item['tag_id']) {
                    unset($array[$_index]);
                    break;
                }
            }
        }

        return $array;
    }

    /**
     * @param $array
     *
     * @return mixed
     */
    public static function addPackagingData($array)
    {
        if (sizeof($array)) {
            foreach ($array as $index => $item) {
                $id = (isset($item['packaging_id'])) ? $item['packaging_id'] : $item['id'];
                $model = self::getPackaging($id, TRUE);
                $array[$index] = $item;
                if (sizeof($model)) {
                    $array[$index]['name'] = $model['name'];
                }
                $array[$index]['is_required'] = 0;
                $array[$index]['data'] = (isset($item['name'])) ? $item['name'] : '';
            }
        }

        return $array;
    }


    /**
     * @param int $id
     * @param bool $as_array
     *
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    static public function getAutoShip($id = 0, $as_array = TRUE)
    {
        if ($id) {
            $model = AutoShip::find()
                ->where(['id' => $id]);
            if ($as_array) {
                $model->asArray();
            }

            return $model->one();
        }
        $model = AutoShip::find()
            ->orderBy('name');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();

    }


    /**
     * @param int $id
     * @param bool $as_array
     *
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    static public function getShippingAddress($id = 0, $as_array = TRUE)
    {
        if ($id) {
            $model = ShippingAddresses::find()
                ->where(['id' => $id]);
            if ($as_array) {
                $model->asArray();
            }

            return $model->one();
        }
        $model = ShippingAddresses::find()
            ->orderBy('name');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();

    }


    /**
     * @param      $auto_ship_id
     * @param bool $as_array
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getAutoShipLink($auto_ship_id, $as_array = TRUE)
    {
        $model = AutoShipLink::find()
            ->where(['auto_ship_id' => $auto_ship_id])
            ->orderBy('position');
        if ($as_array) {
            $model->asArray();
        }

        return $model->all();

    }

    /**
     * @param      $auto_ship_link_id
     * @param bool $as_array
     *
     * @return array|null|\yii\db\ActiveRecord
     */
    static public function getAutoShipLinkName($auto_ship_link_id, $as_array = TRUE)
    {
        $model = AutoShipLink::find()
            ->where(['id' => $auto_ship_link_id]);
        if ($as_array) {
            $model->asArray();
        }

        return $model->one();

    }

    /**
     * @param $brand_id
     * @param bool $as_array
     * @return array|null|\yii\db\ActiveRecord
     */
    static public function getBrandName($brand_id, $as_array = TRUE)
    {
        $model = Brands::find()
            ->where(['id' => $brand_id]);
        if ($as_array) {
            $model->asArray();
        }

        return $model->one();

    }
}


