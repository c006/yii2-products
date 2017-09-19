<?php

namespace c006\products\models\search;

use c006\products\models\AutoShip as AutoShipModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AutoShip represents the model behind the search form about `c006\products\models\AutoShip`.
 */
class AutoShip extends AutoShipModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['name'], 'safe'],
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
        $query = AutoShipModel::find();

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
            'id'     => $this->id,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
