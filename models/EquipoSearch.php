<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipo;

/**
 * EquipoSearch represents the model behind the search form about `app\models\Equipo`.
 */
class EquipoSearch extends Equipo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'IdTipo', 'Prestado', 'UbicacionOrigen', 'UbicacionActual'], 'integer'],
            [['Marca', 'Modelo', 'NoSerie', 'CodInventario', 'Color', 'Estado', 'Descripcion'], 'safe'],
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
        $query = Equipo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
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
            'IdTipo' => $this->IdTipo,
            'Prestado' => $this->Prestado,
            'UbicacionOrigen' => $this->UbicacionOrigen,
            'UbicacionActual' => $this->UbicacionActual,
        ]);

        $query->andFilterWhere(['like', 'Marca', $this->Marca])
            ->andFilterWhere(['like', 'Modelo', $this->Modelo])
            ->andFilterWhere(['like', 'NoSerie', $this->NoSerie])
            ->andFilterWhere(['like', 'CodInventario', $this->CodInventario])
            ->andFilterWhere(['like', 'Color', $this->Color])
            ->andFilterWhere(['like', 'Estado', $this->Estado])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
