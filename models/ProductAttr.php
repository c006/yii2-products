<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_attr".
 *
 * @property integer                      $id
 * @property integer                      $attr_type_id
 * @property string                       $label
 * @property string                       $name
 * @property string                       $default_value
 * @property integer                      $is_unique_value
 * @property string                       $css_style
 * @property string                       $hint
 * @property integer                      $is_core
 * @property integer                      $is_required
 *
 * @property ProductAttrType              $attrType
 * @property ProductAttrProductTypeLink[] $productAttrProductTypeLinks
 * @property ProductAttrValue[]           $productAttrValues
 * @property ProductTypeSectionAttr[]     $productTypeSectionAttrs
 * @property ProductValueBit[]            $productValueBits
 * @property ProductValueDecimal[]        $productValueDecimals
 * @property ProductValueEncrypted[]      $productValueEncrypteds
 * @property ProductValueInteger[]        $productValueIntegers
 * @property ProductValueText[]           $productValueTexts
 * @property ProductValueTextArea[]       $productValueTextAreas
 */
class ProductAttr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_type_id', 'label', 'name', 'is_unique_value', 'is_core', 'is_required'], 'required'],
            [['attr_type_id', 'is_unique_value', 'is_core', 'is_required'], 'integer'],
            [['default_value', 'hint'], 'string'],
            [['label', 'name'], 'string', 'max' => 45],
            [['css_style'], 'string', 'max' => 200],
            [['name'], 'unique'],
            [['attr_type_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => ProductAttrType::className(), 'targetAttribute' => ['attr_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('app', 'ID'),
            'attr_type_id'    => Yii::t('app', 'Attr Type ID'),
            'label'           => Yii::t('app', 'Label'),
            'name'            => Yii::t('app', 'Name'),
            'default_value'   => Yii::t('app', 'Default Value'),
            'is_unique_value' => Yii::t('app', 'Is Unique Value'),
            'css_style'       => Yii::t('app', 'Css Style'),
            'hint'            => Yii::t('app', 'Hint'),
            'is_core'         => Yii::t('app', 'Is Core'),
            'is_required'     => Yii::t('app', 'Is Required'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrType()
    {
        return $this->hasOne(ProductAttrType::className(), ['id' => 'attr_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttrProductTypeLinks()
    {
        return $this->hasMany(ProductAttrProductTypeLink::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttrValues()
    {
        return $this->hasMany(ProductAttrValue::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTypeSectionAttrs()
    {
        return $this->hasMany(ProductTypeSectionAttr::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueBits()
    {
        return $this->hasMany(ProductValueBit::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueDecimals()
    {
        return $this->hasMany(ProductValueDecimal::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueEncrypteds()
    {
        return $this->hasMany(ProductValueEncrypted::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueIntegers()
    {
        return $this->hasMany(ProductValueInteger::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueTexts()
    {
        return $this->hasMany(ProductValueText::className(), ['attr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueTextAreas()
    {
        return $this->hasMany(ProductValueTextArea::className(), ['attr_id' => 'id']);
    }
}
