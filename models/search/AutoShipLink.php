<?php

namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\AutoShipLink as AutoShipLinkModel;

/**
* AutoShipLink represents the model behind the search form about `c006\products\models\AutoShipLink`.
*/
class AutoShipLink extends AutoShipLinkModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'auto_ship_id', 'duration', 'position'], 'integer'],
            [['type'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = AutoShipLinkModel::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to return any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'auto_ship_id' => $this->auto_ship_id,
            'duration' => $this->duration,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type]);

return $dataProvider;
}
}
