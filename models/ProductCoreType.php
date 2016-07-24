<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_core_type".
 *
 * @property integer                      $id
 * @property string                       $data
 *
 * @property ProductAttrProductTypeLink[] $productAttrProductTypeLinks
 * @property ProductType[]                $productTypes
 */
class ProductCoreType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_core_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 100],
            [['value'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => Yii::t('app', 'ID'),
            'value' => Yii::t('app', 'Data'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttrProductTypeLinks()
    {
        return $this->hasMany(ProductAttrProductTypeLink::className(), ['product_core_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTypes()
    {
        return $this->hasMany(ProductType::className(), ['product_core_type_id' => 'id']);
    }
}
