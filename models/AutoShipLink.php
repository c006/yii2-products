<?php

namespace c006\products\models;

use Yii;

/**
 * This is the model class for table "auto_ship_link".
 *
 * @property integer  $id
 * @property integer  $auto_ship_id
 * @property integer  $duration
 * @property string   $type
 * @property integer  $position
 *
 * @property AutoShip $autoShip
 */
class AutoShipLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto_ship_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auto_ship_id', 'duration', 'type', 'position'], 'required'],
            [['auto_ship_id', 'duration', 'position'], 'integer'],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => Yii::t('app', 'ID'),
            'auto_ship_id' => Yii::t('app', 'Auto Ship ID'),
            'duration'     => Yii::t('app', 'Duration'),
            'type'         => Yii::t('app', 'Type'),
            'position'     => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoShip()
    {
        return $this->hasOne(AutoShip::className(), ['id' => 'auto_ship_id']);
    }
}
