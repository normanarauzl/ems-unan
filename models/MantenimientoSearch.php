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
            [['Id', 'IdUbicacion', 'IdAyudante'], 'integer'],
            [['Fecha', 'Observacion'], 'safe'],
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
            'IdUbicacion' => $this->IdUbicacion,
            'IdAyudante' => $this->IdAyudante,
        ]);

        $query->andFilterWhere(['like', 'Fecha', $this->Fecha])
            ->andFilterWhere(['like', 'Observacion', $this->Observacion]);

        return $dataProvider;
    }
}
