<?php

namespace c006\products\assets;

use c006\products\models\ProductAttrValue;
use c006\products\models\ProductType;
use c006\products\models\ProductTypeSection;
use yii\helpers\ArrayHelper;

class FormHelper
{


    static public function formElement($form, $model, $attr)
    {
        /** @var $form \c006\activeForm\ActiveForm; */
        $model = new $model();
        $element = strtolower($attr['attr_type']['element']);
        $type = strtolower($attr['attr_type']['type']);
        if ($element == 'input' && $type == 'text') {
            return $form->field($model, $attr['attr']['name'])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'input' && $type == 'checkbox') {
            return $form->field($model, $attr['attr']['name'])->dropDownList(['No', 'Yes'])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'input' && $type == 'password') {
            return $form->field($model, $attr['attr']['name'])->passwordInput()->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'input' && $type == 'file') {
            return $form->field($model, $attr['attr']['name'])->fileInput()->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'select') {
            $options = AttrHelper::getAttrValue($attr['attr']['id']);
            $options = ArrayHelper::map($options, 'id', 'name');

            return $form->field($model, $attr['attr']['name'])->dropDownList($options)->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
    }


    static public function getFormElement($post_name, $name, $attr_element, $attr_type, $value = "", $attr_id = 0, $css_style = "")
    {

        $output = "";
        switch (strtolower($attr_element)) :
            case "input":
                if ($attr_type == "text") {
                    $output = '<input type="text" class="form-control" id="' . $post_name . '_' . $name . '" name="' . $post_name . '[' . $name . ']" value="' . $value . '" />';
                } elseif ($attr_type == "number") {
                    $output = '<input type="text" class="form-control" id="' . $post_name . '_' . $name . '" name="' . $post_name . '[' . $name . ']" value="' . $value . '" />';
                } elseif ($attr_type == "checkbox") {
                    $output = '<select class="form-control" id="' . $post_name . '_' . $name . '" name="' . $post_name . '[' . $name . ']">';
                    foreach (array('On' => 1, 'Off' => 0) as $key => $v) {
                        $selected = ($value == $v) ? ' selected="selected" ' : '';
                        $output .= '<option value="' . $v . '" ' . $selected . '>' . $key . '</option>';
                    }
                    $output .= '</select>';
                }
                break;
            case "select":
                $output = '<select class="form-control" id="' . $post_name . '_' . $name . '" name="' . $post_name . '[' . $name . ']">';
                /** @var $m_values attrValues */
                $m_values = ProductAttrValue::find()->where(['attr_id' => $attr_id])->orderBy('position')->asArray()->all();
                foreach ($m_values as $row) {
                    $selected = ($row['value'] == $value) ? ' selected="selected"' : '';
                    $output .= '<option value="' . $row['value'] . '"' . $selected . '>' . $row['name'] . '</option>';
                }
                $output .= '</select>';
                break;
            case "textarea":
                $output = '<textarea class="form-control" id="' . $post_name . '_' . $name . '" name="' . $post_name . '[' . $name . ']" style="' . $css_style . '">' . $value . '</textarea >';
                break;
        endswitch;

        return $output;
    }


    static public function createProductTypeForm($product_type_id)
    {
        $model_product_type = ProductType::find()->where(['id' => $product_type_id])->asArray()->one();

        $path = \Yii::getAlias('@c006/products/models/form');
        $class_name = self::createModelName($model_product_type['name']);

        $array = [];
        foreach (AttrHelper::getSections($product_type_id) as $item) {
            $model = AttrHelper::getSectionAttributes($item['id']);
            foreach ($model as $row) {
                $array[] = $row;
            }
        }
        $content = \Yii::$app->controller->renderPartial('/_product-form-utility/product-type-section-form-model',
            [
                'array'      => $array,
                'namespace'  => 'c006\products\models\form',
                'class_name' => $class_name,
            ]);

        AppFile::writeFile($path . '/' . $class_name . '.php', $content);
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    static public function createModelName($string)
    {
        return str_replace(' ', '', ucwords(trim($string)));
    }

    /**
     * @param $label
     *
     * @return mixed
     */
    static public function removeLabelCore($label)
    {
        return preg_replace('/^Core /', '', $label);
    }

}