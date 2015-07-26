<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_attr_product_type_link".
 *
 * @property integer $id
 * @property integer $attr_id
 * @property integer $product_core_type_id
 *
 * @property ProductAttr $attr
 * @property ProductCoreType $productCoreType
 */
class ProductAttrProductTypeLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attr_product_type_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_id', 'product_core_type_id'], 'required'],
            [['attr_id', 'product_core_type_id'], 'integer'],
            [['attr_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAttr::className(), 'targetAttribute' => ['attr_id'=>'id']],
            [['product_core_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCoreType::className(), 'targetAttribute' => ['product_core_type_id'=>'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'attr_id' => Yii::t('app', 'Attr ID'),
            'product_core_type_id' => Yii::t('app', 'Product Core Type ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttr()
    {
        return $this->hasOne(ProductAttr::className(), ['id' => 'attr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCoreType()
    {
        return $this->hasOne(ProductCoreType::className(), ['id' => 'product_core_type_id']);
    }
}
