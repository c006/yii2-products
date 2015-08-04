<?php

namespace c006\products\assets;

use c006\alerts\Alerts;

class ModelHelper
{

    static public function saveModelForm($model_class, $array)
    {

        /** @var  $model \yii\db\ActiveRecord */
        $model = new $model_class();
        foreach ($array as $k => $v) {
            $model[ $k ] = $v;
        }
//        print_r($model); exit;

        if ($model->validate() && $model->save()) {
            return $model;
        }

        print_r($model->getErrors());
        exit;

        Alerts::setMessage('Model: ' . $model_class . '<br>Error: ' . print_r($model->getErrors(), TRUE));
        Alerts::setAlertType(Alerts::ALERT_DANGER);

        return FALSE;
    }

    static public function modelValueExists($model_class, $array_where)
    {
        /** @var  $model \yii\db\ActiveRecord */
        $model = $model_class::find()
            ->where($array_where)
            ->asArray()
            ->one();

        if (is_array($model)) {
            return TRUE;
        }

        return FALSE;
    }


    static public function modelDeleteWhere($model_class, $string_where)
    {
        /** @var  $model \yii\db\ActiveRecord */
        return $model_class::deleteAll($string_where);

    }


}