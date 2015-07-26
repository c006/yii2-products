<?php

namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\ProductAttr as ProductAttrModel;

/**
 * ProductAttr represents the model behind the search form about `c006\products\models\ProductAttr`.
 */
class ProductAttr extends ProductAttrModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'attr_type_id', 'is_unique_value', 'is_core', 'is_required'], 'integer'],
            [['label', 'name', 'default_value', 'css_style', 'hint'], 'safe'],
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
        $query = ProductAttrModel::find();

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
            'attr_type_id' => $this->attr_type_id,
            'is_unique_value' => $this->is_unique_value,
            'is_core' => $this->is_core,
            'is_required' => $this->is_required,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'default_value', $this->default_value])
            ->andFilterWhere(['like', 'css_style', $this->css_style])
            ->andFilterWhere(['like', 'hint', $this->hint]);

        return $dataProvider;
    }
}
