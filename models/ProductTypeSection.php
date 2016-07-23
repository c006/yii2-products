<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_type_section".
 *
 * @property integer $id
 * @property integer $product_type_id
 * @property string $name
 * @property integer $position
 *
 * @property ProductType $productType
 * @property ProductTypeSectionAttr[] $productTypeSectionAttrs
 */
class ProductTypeSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_type_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_type_id', 'name', 'position'], 'required'],
            [['product_type_id', 'position'], 'integer'],
            [['name'], 'string', 'max' => 45],
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
            'product_type_id' => Yii::t('app', 'Product Type ID'),
            'name' => Yii::t('app', 'Name'),
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
    public function getProductTypeSectionAttrs()
    {
        return $this->hasMany(ProductTypeSectionAttr::className(), ['product_type_section_id' => 'id']);
    }
}
