<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodos".
 *
 * @property integer $Id_Periodo
 * @property integer $Duracion_Minutos
 * @property string $Descripcion
 * @property string $Hora_Fin
 * @property string $Hora_Inicio
 * @property integer $Estado
 * @property integer $Id_Turno
 *
 * @property Turnos $idTurno
 * @property Solicitud[] $solicituds
 */
class Periodos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Duracion_Minutos', 'Estado', 'Id_Turno'], 'integer'],
            [['Hora_Fin', 'Hora_Inicio'], 'safe'],
            [['Id_Turno'], 'required'],
            [['Descripcion'], 'string', 'max' => 100],
            [['Id_Turno'], 'exist', 'skipOnError' => true, 'targetClass' => Turnos::className(), 'targetAttribute' => ['Id_Turno' => 'Id_Turno']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Periodo' => Yii::t('app', 'Id  Periodo'),
            'Duracion_Minutos' => Yii::t('app', 'Duracion/Minutos'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'Hora_Fin' => Yii::t('app', 'Hora/Fin'),
            'Hora_Inicio' => Yii::t('app', 'Hora/Inicio'),
            'Estado' => Yii::t('app', 'Estado'),
            'Id_Turno' => Yii::t('app', 'Turno'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurno()
    {
        return $this->hasOne(Turnos::className(), ['Id_Turno' => 'Id_Turno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['Id_Periodo' => 'Id_Periodo']);
    }
}
