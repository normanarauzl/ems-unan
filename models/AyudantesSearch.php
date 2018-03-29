<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ayudantes;

/**
 * AyudantesSearch represents the model behind the search form about `app\models\Ayudantes`.
 */
class AyudantesSearch extends Ayudantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Ayudante', 'Estado_Ayudante'], 'integer'],
            [['Nombre_Ayudante'], 'safe'],
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
        $query = Ayudantes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id_Ayudante' => $this->Id_Ayudante,
            'Estado_Ayudante' => $this->Estado_Ayudante,
        ]);

        $query->andFilterWhere(['like', 'Nombre_Ayudante', $this->Nombre_Ayudante]);

        return $dataProvider;
    }
}
