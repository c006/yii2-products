<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "product_attr_value".
 *
 * @property integer     $id
 * @property integer     $attr_id
 * @property string      $name
 * @property string      $value
 * @property integer     $position
 *
 * @property ProductAttr $attr
 */
class ProductAttrValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attr_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_id', 'name', 'value', 'position'], 'required'],
            [['attr_id', 'position'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 100],
            [['name'], 'unique'],
            [['attr_id'], 'exist', 'skipOnError' => TRUE, 'targetClass' => ProductAttr::className(), 'targetAttribute' => ['attr_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => Yii::t('app', 'ID'),
            'attr_id'  => Yii::t('app', 'Attr ID'),
            'name'     => Yii::t('app', 'Name'),
            'value'    => Yii::t('app', 'Value'),
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
}
