<?php

echo "<?php\n";
?>
namespace c006\products\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use c006\products\models\<?= $class_name ?> as <?= $class_name ?>Model;

/**
* <?= $class_name ?> represents the model behind the search form about `c006\products\models\<?= $class_name ?>`.
*/
class <?= $class_name ?> extends <?= $class_name ?>Model
{
/**
* @inheritdoc
*/
public function rules()
{
return [];
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
$query = <?= $class_name ?>Model::find();

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
'active' => $this->active,
]);

$query->andFilterWhere(['like', 'name', $this->name]);

return $dataProvider;
}
}
