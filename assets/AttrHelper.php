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
    static public function getAttributesAsArray()
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
            ->asArray()
            ->all();

        foreach ($model as $index => $row) {

            $array[ $index ] = [
                'id'       => $row['id'],
                'name'     => $row['name'],
                'position' => $row['position'],
                'array'    => [],
            ];

            $model_section = ProductTypeSectionAttr::find()
                ->joinWith('attr')
                ->where(['product_type_section_id' => $row['id']])
                ->asArray()
                ->all();

            foreach ($model_section as $_index => $section) {
                $_array = [];
                foreach ($section['attr'] as $key => $attr) {
                    $_array[ $key ] = $attr;
                }
                $_array['product_type_section_id'] = $section['product_type_section_id'];
                $array[ $index ]['array'][] = $_array;
            }
        }

        return $array;
    }

    /**
     * @param $array_used
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static public function getAttributesAvailable($array_used)
    {
        $array = self::getAttributesAsArray();

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

        foreach ($array_post as $section) {
            $array_unset = [];
            $model_section_id = 0;
            if (isset($section[0])) {
                if ($section[0]['id']) {
                    $model_section_id = $section[0]['id'];
                } else {
                    $array = [
                        'product_type_id' => $product_type_id,
                        'name'            => $section[0]['value'],
                        'position'        => $section[0]['position'],
                    ];
                    /** @var  $model_section /c006/products/models/ProductTypeSection */
                    $model_section = ModelHelper::saveModelForm('\c006\products\models\ProductTypeSection', $array);
                }
            }

            foreach ($section as $index => $item) {
                if ($index) {
                    $ok = TRUE;
                    if ($model_section_id) {
                        if (ModelHelper::modelValueExists('\c006\products\models\ProductTypeSectionAttr', ['product_type_section_id' => $model_section_id, 'attr_id' => $item['value']])) {
                            $ok = FALSE;
                        }
                    }

                    if ($ok) {
                        $array = [
                            'product_type_section_id' => $model_section_id,
                            'attr_id'                 => $item['value'],
                            'position'                => $item['position'],
                        ];
                        if (!ModelHelper::saveModelForm('\c006\products\models\ProductTypeSectionAttr', $array)) {
                            return FALSE;
                        }
                    }
                    $array_unset[] = $item['value'];
                }
            }

            ModelHelper::modelDeleteWhere('\c006\products\models\ProductTypeSectionAttr', 'product_type_section_id = ' . $model_section_id . ' AND attr_id NOT IN(' . join(',', $array_unset) . ')');
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
//        return ProductTypeSectionAttr::find()
//            ->select('    `product_type_section_attr`.*, `product_attr`.*, `product_attr_type`.*')
//            ->join('INNER JOIN', 'product_attr', 'product_attr.id = product_type_section_attr.attr_id')
//            ->join('INNER JOIN', 'product_attr_type', 'product_attr.attr_type_id = product_attr_type.id')
//            ->where(['product_type_section_id' => $product_type_section_id])
//            ->asArray()
//            ->all();

        $array = [];
        $model = ProductTypeSectionAttr::find()
            ->where(['product_type_section_id' => $product_type_section_id])
            ->asArray()
            ->all();
        foreach ($model as $section) {
            $_array = $section;
            $_array['attr'] = ProductAttr::find()
                ->where(['id' => $section['attr_id']])
                ->asArray()
                ->one();
            $_array['attr_type'] = ProductAttrType::find()
                ->where(['id' => $_array['attr']['attr_type_id']])
                ->asArray()
                ->one();
            $array[] = $_array;
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