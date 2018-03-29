<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipos;

/**
 * EquiposSearch represents the model behind the search form about `app\models\Equipos`.
 */
class EquiposSearch extends Equipos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Equipo', 'Prestado', 'Cod_Inventario', 'Estado'], 'integer'],
            [['Marca', 'Id_Tipo', 'Modelo', 'No_Serie', 'Color', 'Descripcion', 'Ubicacion_Origen', 'Ubicacion_Actual'], 'safe'],
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
        $query = Equipos::find();

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
        
        //agregando busqueda JOIN
        $query->joinWith('idTipo');
        
        $query->andFilterWhere([
            'Id_Equipo' => $this->Id_Equipo,
//            'Id_Tipo' => $this->Id_Tipo,
            'Prestado' => $this->Prestado,
            'Cod_Inventario' => $this->Cod_Inventario,
            'Estado' => $this->Estado,
            'Ubicacion_Origen' => $this->Ubicacion_Origen,
            'Ubicacion_Actual' => $this->Ubicacion_Actual,
        ]);

        $query->andFilterWhere(['like', 'Marca', $this->Marca])
            ->andFilterWhere(['like', 'Modelo', $this->Modelo])
            ->andFilterWhere(['like', 'No_Serie', $this->No_Serie])
            ->andFilterWhere(['like', 'Color', $this->Color])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'tipo.Descripcion', $this->Id_Tipo]);

        return $dataProvider;
    }
}
