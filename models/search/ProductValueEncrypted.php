<?php

namespace c006\products\models\search;

use c006\products\models\ProductValueEncrypted as ProductValueEncryptedModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductValueEncrypted represents the model behind the search form about `c006\products\models\ProductValueEncrypted`.
 */
class ProductValueEncrypted extends ProductValueEncryptedModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'attr_id'], 'integer'],
            [['value'], 'safe'],
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
        $query = ProductValueEncryptedModel::find();

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
            'id'         => $this->id,
            'product_id' => $this->product_id,
            'attr_id'    => $this->attr_id,
        ]);

        $query->andFilterWhere(['like', 'value', $this->data]);

        return $dataProvider;
    }
}
