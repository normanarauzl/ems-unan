<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mantenimiento;

/**
 * MantenimientoSearch represents the model behind the search form about `app\models\Mantenimiento`.
 */
class MantenimientoSearch extends Mantenimiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Mantenimiento'], 'integer'],
            [['Fecha', 'Observacion', 'Id_Ubicacion', 'Id_Ayudante'], 'safe'],
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
        $query = Mantenimiento::find();

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
        // 
        // PONIENDO BUSQUEDAS. DESCOMENTAR
//        $query->joinWith(idUbicacion);
//        $query->joinWith(idAyudante);
        
        $query->andFilterWhere([
            'Id_Mantenimiento' => $this->Id_Mantenimiento,
//            'Id_Ubicacion' => $this->Id_Ubicacion,
            'Fecha' => $this->Fecha,
//            'Id_Ayudante' => $this->Id_Ayudante,
        ]);

        $query->andFilterWhere(['like', 'Observacion', $this->Observacion])
              ->andFilterWhere(['like', 'ubicacion.Descripcion', $this->Id_Ubicacion])
              ->andFilterWhere(['like', 'ayudante.Nombre_Ayudante', $this->Id_Ayudante]);

        return $dataProvider;
    }
}
