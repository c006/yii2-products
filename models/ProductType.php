<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_type".
 *
 * @property integer              $id
 * @property integer              $product_core_type_id
 * @property string               $name
 * @property integer              $is_viewable
 *
 * @property Product[]            $products
 * @property ProductCoreType      $productCoreType
 * @property ProductTypeSection[] $productTypeSections
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_core_type_id', 'name'], 'required'],
            [['product_core_type_id', 'is_viewable'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['name'], 'unique'],
            [['product_core_type_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => ProductCoreType::className(), 'targetAttribute' => ['product_core_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                   => Yii::t('app', 'ID'),
            'product_core_type_id' => Yii::t('app', 'Product Core Type ID'),
            'name'                 => Yii::t('app', 'Name'),
            'is_viewable'          => Yii::t('app', 'Is Viewable'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCoreType()
    {
        return $this->hasOne(ProductCoreType::className(), ['id' => 'product_core_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTypeSections()
    {
        return $this->hasMany(ProductTypeSection::className(), ['product_type_id' => 'id']);
    }
}
