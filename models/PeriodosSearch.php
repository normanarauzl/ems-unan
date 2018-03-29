<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Periodos;

/**
 * PeriodosSearch represents the model behind the search form about `app\models\Periodos`.
 */
class PeriodosSearch extends Periodos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Periodo', 'Duracion_Minutos', 'Estado'], 'integer'],
            [['Descripcion', 'Hora_Fin', 'Hora_Inicio', 'Id_Turno'], 'safe'],
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
        $query = Periodos::find();

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
            'Id_Periodo' => $this->Id_Periodo,
            'Duracion_Minutos' => $this->Duracion_Minutos,
            'Hora_Fin' => $this->Hora_Fin,
            'Hora_Inicio' => $this->Hora_Inicio,
            'Estado' => $this->Estado,
            'Id_Turno' => $this->Id_Turno,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
