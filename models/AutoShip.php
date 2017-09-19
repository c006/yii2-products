<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "auto_ship".
 *
 * @property integer        $id
 * @property string         $name
 * @property integer        $active
 *
 * @property AutoShipLink[] $autoShipLinks
 */
class AutoShip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_ship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'     => Yii::t('app', 'ID'),
            'name'   => Yii::t('app', 'Name'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoShipLinks()
    {
        return $this->hasMany(AutoShipLink::className(), ['auto_ship_id' => 'id']);
    }
}
