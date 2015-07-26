<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $store_id
 * @property integer $product_type_id
 * @property integer $position
 *
 * @property ProductType $productType
 * @property ProductCategory[] $productCategories
 * @property ProductGroups[] $productGroups
 * @property ProductImage[] $productImages
 * @property ProductKeyword[] $productKeywords
 * @property ProductShippingPackaging[] $productShippingPackagings
 * @property ProductTag[] $productTags
 * @property ProductValueBit[] $productValueBits
 * @property ProductValueDecimal[] $productValueDecimals
 * @property ProductValueEncrypted[] $productValueEncrypteds
 * @property ProductValueInteger[] $productValueIntegers
 * @property ProductValueText[] $productValueTexts
 * @property ProductValueTextArea[] $productValueTextAreas
 * @property ProductValueUrl[] $productValueUrls
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'product_type_id'], 'required'],
            [['store_id', 'product_type_id', 'position'], 'integer'],
            [['product_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::className(), 'targetAttribute' => ['product_type_id'=>'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'product_type_id' => Yii::t('app', 'Product Type ID'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductType::className(), ['id' => 'product_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGroups()
    {
        return $this->hasMany(ProductGroups::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductKeywords()
    {
        return $this->hasMany(ProductKeyword::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductShippingPackagings()
    {
        return $this->hasMany(ProductShippingPackaging::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueBits()
    {
        return $this->hasMany(ProductValueBit::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueDecimals()
    {
        return $this->hasMany(ProductValueDecimal::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueEncrypteds()
    {
        return $this->hasMany(ProductValueEncrypted::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueIntegers()
    {
        return $this->hasMany(ProductValueInteger::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueTexts()
    {
        return $this->hasMany(ProductValueText::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueTextAreas()
    {
        return $this->hasMany(ProductValueTextArea::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductValueUrls()
    {
        return $this->hasMany(ProductValueUrl::className(), ['product_id' => 'id']);
    }
}
