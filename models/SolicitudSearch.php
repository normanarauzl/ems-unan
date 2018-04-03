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
            [['Id_Solicitud', 'Id_Persona', 'Id_Ubicacion', 'Estado_Solicitud', 'Entregado_Por', 'Retirado_Por', 'Id_Periodo'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Fin', 'Hora_Inicio', 'Hora_Fin', 'Fecha_Solicitud', 'Observaciones', 'Observaciones_2', 'Observaciones_3'], 'safe'],
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
            'Id_Solicitud' => $this->Id_Solicitud,
            'Id_Persona' => $this->Id_Persona,
            'Id_Ubicacion' => $this->Id_Ubicacion,
            'Fecha_Inicio' => $this->Fecha_Inicio,
            'Fecha_Fin' => $this->Fecha_Fin,
            'Hora_Inicio' => $this->Hora_Inicio,
            'Hora_Fin' => $this->Hora_Fin,
            'Estado_Solicitud' => $this->Estado_Solicitud,
            'Fecha_Solicitud' => $this->Fecha_Solicitud,
            'Entregado_Por' => $this->Entregado_Por,
            'Retirado_Por' => $this->Retirado_Por,
            'Id_Periodo' => $this->Id_Periodo,
        ]);

        $query->andFilterWhere(['like', 'Observaciones', $this->Observaciones])
            ->andFilterWhere(['like', 'Observaciones_2', $this->Observaciones_2])
            ->andFilterWhere(['like', 'Observaciones_3', $this->Observaciones_3]);

        return $dataProvider;
    }
}
