<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_attr_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $element
 * @property string $type
 * @property string $description
 * @property string $value_table
 * @property string $column
 * @property string $value_type
 * @property integer $is_visible
 * @property integer $show_in_admin
 *
 * @property ProductAttr[] $productAttrs
 */
class ProductAttrType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attr_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'element', 'show_in_admin'], 'required'],
            [['description'], 'string'],
            [['is_visible', 'show_in_admin'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['element', 'type', 'value_type'], 'string', 'max' => 45],
            [['value_table'], 'string', 'max' => 40],
            [['column'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'element' => Yii::t('app', 'Element'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'value_table' => Yii::t('app', 'Value Table'),
            'column' => Yii::t('app', 'Column'),
            'value_type' => Yii::t('app', 'Value Type'),
            'is_visible' => Yii::t('app', 'Is Visible'),
            'show_in_admin' => Yii::t('app', 'Show In Admin'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttrs()
    {
        return $this->hasMany(ProductAttr::className(), ['attr_type_id' => 'id']);
    }
}
