<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo".
 *
 * @property integer $Id
 * @property integer $DuracionMinutos
 * @property string $Descripcion
 * @property string $HoriaInicio
 * @property string $HoraFin
 * @property string $Estado
 * @property integer $IdTurno
 *
 * @property Turno $idTurno
 * @property Solicitud[] $solicituds
 */
class Periodo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DuracionMinutos', 'IdTurno'], 'integer'],
            [['Descripcion', 'HoriaInicio', 'HoraFin', 'Estado'], 'string', 'max' => 255],
            [['IdTurno'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['IdTurno' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'DuracionMinutos' => Yii::t('app', 'Duracion Minutos'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'HoriaInicio' => Yii::t('app', 'Horia Inicio'),
            'HoraFin' => Yii::t('app', 'Hora Fin'),
            'Estado' => Yii::t('app', 'Estado'),
            'IdTurno' => Yii::t('app', 'Id Turno'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurno()
    {
        return $this->hasOne(Turno::className(), ['Id' => 'IdTurno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['IdPeriodo' => 'Id']);
    }
}
