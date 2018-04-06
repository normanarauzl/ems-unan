<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solicitud;

/**
 * SolicitudSearch represents the model behind the search form about `app\models\Solicitud`.
 */
class SolicitudSearch extends Solicitud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'IdPersona', 'IdUbicacion', 'EntregadoPor', 'RetiradoPor', 'IdPeriodo'], 'integer'],
            [['FechaInicio', 'FechaFin', 'Estado', 'FechaSolicitud', 'Observacion1', 'Observacion2', 'Observacion3'], 'safe'],
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
        $query = Solicitud::find();

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
            'Id' => $this->Id,
            'IdPersona' => $this->IdPersona,
            'IdUbicacion' => $this->IdUbicacion,
            'EntregadoPor' => $this->EntregadoPor,
            'RetiradoPor' => $this->RetiradoPor,
            'IdPeriodo' => $this->IdPeriodo,
        ]);

        $query->andFilterWhere(['like', 'FechaInicio', $this->FechaInicio])
            ->andFilterWhere(['like', 'FechaFin', $this->FechaFin])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'FechaSolicitud', $this->FechaSolicitud])
            ->andFilterWhere(['like', 'Observacion1', $this->Observacion1])
            ->andFilterWhere(['like', 'Observacion2', $this->Observacion2])
            ->andFilterWhere(['like', 'Observacion3', $this->Observacion3]);

        return $dataProvider;
    }
}
