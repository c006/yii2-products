<?php
namespace c006\products\assets;

use c006\products\models\ProductAttrType;
use c006\products\models\ProductAttrValue;
use c006\products\models\ProductTypeSection;
use c006\products\models\ProductTypeSectionAttr;
use c006\products\models\search\ProductAttr;

class AttrHelper
{

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getAttrAsArray()
    {
        return ProductAttr::find()->orderBy('name')->asArray()->all();
    }

    /**
     * @param $product_type_id
     *
     * @return array
     */
    static public function getAttributesUsed($product_type_id)
    {
        $array = [];
        $model = ProductTypeSection::find()
            ->where(['product_type_id' => $product_type_id])
            ->orderBy('position')
            ->asArray()
            ->all();
        foreach ($model as $index => $row) {
            $array[ $index ] = [
                'id'       => $row['id'],
                'name'     => $row['name'],
                'position' => $row['position'],
                'array'    => [],
            ];
            $model_section   = ProductTypeSectionAttr::find()
                ->select('product_type_section_attr.id AS link_id, product_type_section_attr.attr_id, product_type_section_attr.product_type_section_id')
                ->where(['product_type_section_id' => $row['id']])
                ->orderBy('product_type_section_attr.position')
                ->asArray()
                ->all();
            foreach ($model_section as $_index => $_section) {
                $_array = $_section;
                foreach (ModelHelper::getAttr($_section['attr_id']) as $key => $attr) {
                    $_array[ $key ] = $attr;
                }
                $_array['product_type_section_id'] = $_section['product_type_section_id'];
                $array[ $index ]['array'][]        = $_array;
            }
        }

        return $array;
    }

    /**
     * @param $array_used
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getAttrAvailable($array_used)
    {
        $array = self::getAttrAsArray();
        foreach ($array_used as $index => $item) {
            foreach ($item['array'] as $_attr) {
                foreach ($array as $_index => $_item) {
                    if ($_item['id'] == $_attr['id']) {
                        unset($array[ $_index ]);
                        break;
                    }
                }
            }
        }

        return $array;
    }


    static public function updateAttributeSections($array_post, $product_type_id)
    {
//    print_r($array_post); exit;
        $_pos = 1;
        foreach ($array_post as $_section) {
            $array_unset      = [];
            $model_section_id = 0;
            if (isset($_section[0])) {
                $array = [
                    'product_type_id' => $product_type_id,
                    'name'            => $_section[0]['value'],
                    'position'        => $_pos++,
                ];
                if (isset($_section[0]['id']) && $_section[0]['id']) {
                    $model_section_id = $_section[0]['id'];
                    $array['id']      = $model_section_id;
                }
                $model_section    = ModelHelper::saveModelForm('\c006\products\models\ProductTypeSection', $array);
                $model_section_id = $model_section['id'];
            }
            foreach ($_section as $id => $item) {
                if ($id) {
                    $array = [
                        'product_type_section_id' => $model_section_id,
                        'attr_id'                 => $item['value'],
                        'position'                => $_pos++,
                    ];
                    if (isset($item['link_id']) && $item['link_id']) {
                        $array['id'] = $item['link_id'];
                    }
                    ModelHelper::saveModelForm('\c006\products\models\ProductTypeSectionAttr', $array);
                    $array_unset[] = $item['value'];
                }
            }
            if (sizeof($array_unset)) {
                ModelHelper::modelDeleteWhere('\c006\products\models\ProductTypeSectionAttr', 'product_type_section_id = ' . $model_section_id . ' AND attr_id NOT IN(' . join(',', $array_unset) . ')');
            }
        }

        return TRUE;

    }

    /**
     * @param $product_type_section_id
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getSectionAttributes($product_type_section_id)
    {
        $array = [];
        $model = ProductTypeSectionAttr::find()
            ->where(['product_type_section_id' => $product_type_section_id])
            ->orderBy('position')
            ->asArray()
            ->all();
        foreach ($model as $section) {
            $_array              = $section;
            $_array['attr']      = ProductAttr::find()
                ->where(['id' => $section['attr_id']])
                ->asArray()
                ->one();
            $_array['attr_type'] = ProductAttrType::find()
                ->where(['id' => $_array['attr']['attr_type_id']])
                ->asArray()
                ->one();
            $array[]             = $_array;
        }

        return $array;
    }


    /**
     * @param $product_type_id
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getSections($product_type_id)
    {
        return ProductTypeSection::find()
            ->where(['product_type_id' => $product_type_id])
            ->orderBy('position')
            ->asArray()
            ->all();

    }

    /**
     * @param $attr_id
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getAttrValue($attr_id)
    {
        return ProductAttrValue::find()
            ->where(['attr_id' => $attr_id])
            ->orderBy('position')
            ->asArray()
            ->all();

    }


}