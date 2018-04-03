<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SolicitudSearch represents the model behind the search form about `app\models\Solicitud`.
 */
class SolicitudesSearch extends Solicitudes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['FechaInicio', 'FechaFin'], 'safe'],
            [['Solicitante'], 'string', 'max' => 101],
            [['Ubicacion'], 'string', 'max' => 100],
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
        $query = Solicitudes::find();

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
            'Id' => $this->Id
        ]);

        $query->andFilterWhere(['like', 'FechaInicio', $this->FechaInicio])
            ->andFilterWhere(['like', 'FechaFin', $this->FechaFin])
            ->andFilterWhere(['like', 'Solicitante', $this->Solicitante])
            ->andFilterWhere(['like', 'Ubicacion', $this->Ubicacion]);

        return $dataProvider;
    }
}
