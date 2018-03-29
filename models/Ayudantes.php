<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ayudantes".
 *
 * @property integer $Id_Ayudante
 * @property string $Nombre_Ayudante
 * @property integer $Estado_Ayudante
 *
 * @property Mantenimiento[] $mantenimientos
 * @property MovimientosMantenimientos[] $movimientosMantenimientos
 * @property Solicitud[] $solicituds
 * @property Solicitud[] $solicituds0
 */
class Ayudantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ayudantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado_Ayudante'], 'integer'],
            [['Nombre_Ayudante'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Ayudante' => Yii::t('app', 'Id  Ayudante'),
            'Nombre_Ayudante' => Yii::t('app', 'Nombre del Ayudante'),
            'Estado_Ayudante' => Yii::t('app', 'Estado del Ayudante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientos()
    {
        return $this->hasMany(Mantenimiento::className(), ['Id_Ayudante' => 'Id_Ayudante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientosMantenimientos()
    {
        return $this->hasMany(MovimientosMantenimientos::className(), ['Retirado_Por' => 'Id_Ayudante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['Entregado_Por' => 'Id_Ayudante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds0()
    {
        return $this->hasMany(Solicitud::className(), ['Retirado_Por' => 'Id_Ayudante']);
    }
}
