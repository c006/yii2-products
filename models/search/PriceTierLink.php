<?php

namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\PriceTierLink as PriceTierLinkModel;

/**
 * PriceTierLink represents the model behind the search form about `c006\products\models\PriceTierLink`.
 */
class PriceTierLink extends PriceTierLinkModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price_tier_id', 'max_qty', 'position'], 'integer'],
            [['price'], 'number'],
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
        $query = PriceTierLinkModel::find();

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
            'price_tier_id' => $this->price_tier_id,
            'price' => $this->price,
            'max_qty' => $this->max_qty,
            'position' => $this->position,
        ]);

        return $dataProvider;
    }
}
