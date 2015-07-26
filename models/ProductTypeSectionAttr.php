<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_type_section_attr".
 *
 * @property integer $id
 * @property integer $product_type_section_id
 * @property integer $attr_id
 * @property integer $position
 *
 * @property ProductAttr $attr
 * @property ProductTypeSection $productTypeSection
 */
class ProductTypeSectionAttr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_type_section_attr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_type_section_id', 'attr_id', 'position'], 'required'],
            [['product_type_section_id', 'attr_id', 'position'], 'integer'],
            [['attr_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAttr::className(), 'targetAttribute' => ['attr_id'=>'id']],
            [['product_type_section_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTypeSection::className(), 'targetAttribute' => ['product_type_section_id'=>'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_type_section_id' => Yii::t('app', 'Product Type Section ID'),
            'attr_id' => Yii::t('app', 'Attr ID'),
            'position' => Yii::t('app', 'Position'),
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
    public function getProductTypeSection()
    {
        return $this->hasOne(ProductTypeSection::className(), ['id' => 'product_type_section_id']);
    }
}
