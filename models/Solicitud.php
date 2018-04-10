<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $Id
 * @property integer $IdPersona
 * @property integer $IdUbicacion
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property string $Estado
 * @property string $FechaSolicitud
 * @property integer $EntregadoPor
 * @property integer $RetiradoPor
 * @property string $Observacion1
 * @property string $Observacion2
 * @property string $Observacion3
 * @property integer $IdPeriodo
 *
 * @property DetalleSolicitud[] $detalleSolicituds
 * @property Periodo $idPeriodo
 * @property Persona $idPersona
 * @property Ubicacion $idUbicacion
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPersona', 'IdUbicacion', 'EntregadoPor', 'RetiradoPor', 'IdPeriodo'], 'integer'],
            [['FechaInicio', 'FechaFin', 'Estado', 'FechaSolicitud', 'Observacion1', 'Observacion2', 'Observacion3'], 'string', 'max' => 255],
            [['IdPeriodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodo::className(), 'targetAttribute' => ['IdPeriodo' => 'Id']],
            [['IdPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['IdPersona' => 'Id']],
            [['IdUbicacion'], 'exist', 'skipOnError' => true, 'targetClass' => Ubicacion::className(), 'targetAttribute' => ['IdUbicacion' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'IdPersona' => 'Id Persona',
            'IdUbicacion' => 'Ubicacion de la Solicitud',
            'FechaInicio' => 'Fecha Inicio',
            'FechaFin' => 'Fecha Fin',
            'Estado' => 'Estado',
            'FechaSolicitud' => 'Fecha Solicitud',
            'EntregadoPor' => 'Entregado Por',
            'RetiradoPor' => 'Retirado Por',
            'Observacion1' => 'Observacion',
            'Observacion2' => 'Observacion',
            'Observacion3' => 'Observacion',
            'IdPeriodo' => 'Periodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleSolicituds()
    {
        return $this->hasMany(DetalleSolicitud::className(), ['IdSolicitud' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeriodo()
    {
        return $this->hasOne(Periodo::className(), ['Id' => 'IdPeriodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Persona::className(), ['Id' => 'IdPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUbicacion()
    {
        return $this->hasOne(Ubicacion::className(), ['Id' => 'IdUbicacion']);
    }
}
