<?php

namespace c006\products\models\search;

use c006\products\models\ProductAutoShip as ProductAutoShipModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductAutoShip represents the model behind the search form about `c006\products\models\ProductAutoShip`.
 */
class ProductAutoShip extends ProductAutoShipModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'auto_ship_id'], 'integer'],
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
        $query = ProductAutoShipModel::find();

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
            'id'           => $this->id,
            'product_id'   => $this->product_id,
            'auto_ship_id' => $this->auto_ship_id,
        ]);

        return $dataProvider;
    }
}
