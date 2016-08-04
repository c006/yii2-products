<?php
namespace c006\products\assets;

use c006\products\models\ProductType;
use c006\products\models\ProductValueBit;
use c006\products\models\ProductValueDecimal;
use c006\products\models\ProductValueEncrypted;
use c006\products\models\ProductValueInteger;
use c006\products\models\ProductValueText;
use c006\products\models\ProductValueTextArea;
use c006\products\models\ProductValueUrl;
use Yii;
use yii\helpers\ArrayHelper;

class FormHelper
{

    /**
     * @param $product_id
     * @param $form
     * @param $attr
     * @param $model_class_name
     *
     * @return string
     */
    static public function component($product_id, $form, $attr, $model_class_name)
    {
        $element = strtolower($attr['attr_type']['element']);
        $type = strtolower($attr['attr_type']['type']);
        if ($type == 'category') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-category',
                [
                    'form' => $form,
                    'attr' => $attr,
                ]);

            return $content;
        }
        if ($type == 'pricing') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-price-tier',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'images') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-image',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'tags') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-tag',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'brands') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-brand',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'product_url') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-url',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'auto_ship') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-auto-ship',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'shipping_address') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-shipping-address',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
        if ($type == 'shipping_packaging') {
            $content = \Yii::$app->controller->renderPartial('/_product-form-utility/component-shipping-packaging',
                [
                    'product_id'       => $product_id,
                    'form'             => $form,
                    'attr'             => $attr,
                    'model_class_name' => $model_class_name,
                ]);

            return $content;
        }
    }


    /**
     * @param $form
     * @param $model
     * @param $attr
     *
     * @return $this
     */
    static public function formElement($form, $model, $attr)
    {

        /** @var $form \yii\widgets\ActiveForm; */
        //$model = new $model();
        $element = strtolower($attr['attr_type']['element']);
        $type = strtolower($attr['attr_type']['type']);
        $css = strtolower($attr['attr']['css_style']);

        if ($element == 'input' && $type == 'text') {
            return $form->field($model, $attr['attr']['name'])->textInput(['style' => $css])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'input' && $type == 'checkbox') {
            return $form->field($model, $attr['attr']['name'])->dropDownList(['No', 'Yes'], ['style' => $css])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'input' && $type == 'password') {
            return $form->field($model, $attr['attr']['name'])->passwordInput(['style' => $css])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'input' && $type == 'file') {
            return $form->field($model, $attr['attr']['name'])->fileInput(['style' => $css])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'select') {
            $options = AttrHelper::getAttrValue($attr['attr']['id']);
            $options = ArrayHelper::map($options, 'id', 'name');

            return $form->field($model, $attr['attr']['name'])->dropDownList($options, ['style' => $css])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
        if ($element == 'textarea') {
            return $form->field($model, $attr['attr']['name'])->textarea(['style' => $css])->label(self::removeLabelCore($attr['attr']['label']))->hint($attr['attr']['hint']);
        }
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

    /**
     * @param $product_type_id
     */
    static public function createProductTypeForm($product_type_id)
    {
        $model_product_type = ProductType::find()->where(['id' => $product_type_id])->asArray()->one();
        $path = Yii::getAlias('@c006/products/models/form');
        $class_name = self::createModelName($model_product_type['name']);
        $array = [];
        foreach (AttrHelper::getSections($product_type_id) as $item) {
            $model = AttrHelper::getSectionAttributes($item['id']);
            foreach ($model as $row) {
                $array[] = $row;
            }
        }
        $content = Yii::$app->controller->renderPartial('/_product-form-utility/product-type-section-form-model',
            [
                'array'      => $array,
                'namespace'  => 'c006\products\models\form',
                'class_name' => $class_name,
            ]);
        //die($content);
        file_put_contents($path . '/' . $class_name . '.php', $content);
        // AppFile::writeFile($path . '/' . $class_name . '.php', $content);
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    static public function createModelName($string)
    {
        $string = str_replace('_', ' ', strtolower($string));

        return str_replace(' ', '', ucwords(trim($string)));
    }

    /**
     * @param $product_id
     * @param $array_attr
     *
     * @return mixed
     */
    static public function getAttrValue($product_id, $array_attr)
    {
//        print_r($array_attr); exit;
        if ($product_id) {

            if (TRUE) {
                switch (FormHelper::createModelName($array_attr['attr_type']['value_table'])) {
                    case "ProductValueTextArea" :
                        $model = new ProductValueTextArea();
                        break;
                    case "ProductValueBit" :
                        $model = new ProductValueBit();
                        break;
                    case "ProductValueDecimal" :
                        $model = new ProductValueDecimal();
                        break;
                    case "ProductValueEncrypt" :
                        $model = new ProductValueEncrypted();
                        break;
                    case "ProductValueInteger" :
                        $model = new ProductValueInteger();
                        break;
                    case "ProductValueUrl" :
                        $model = new ProductValueUrl();
                        break;
                    default:
                        $model = new ProductValueText();
                }

            }
//                $model_class = 'c006\products\models\\' . FormHelper::createModelName($array_attr['attr_type']['value_table']);
//                $model = $model_class::find()
            $model = $model->find()
                ->where(['product_id' => $product_id])
                ->andWhere(['attr_id' => $array_attr['attr_id']])
                ->asArray()
                ->one();
            if (sizeof($model)) {
                return $model['value'];
            }
        }

        return $array_attr['attr']['default_value'];
    }

    /**
     * @param $array
     * @return array
     */
    static public function createSelectOptions($array)
    {
        $out = '';
        foreach ($array as $value => $label) {
            $out .= '<option value="' . $value . '">' . $label . '</option>';
        }

        return $out;
    }

}




















































