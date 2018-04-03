<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $Id_Solicitud
 * @property integer $Id_Persona
 * @property integer $Id_Ubicacion
 * @property string $Fecha_Inicio
 * @property string $Fecha_Fin
 * @property string $Hora_Inicio
 * @property string $Hora_Fin
 * @property integer $Estado_Solicitud
 * @property string $Fecha_Solicitud
 * @property integer $Entregado_Por
 * @property integer $Retirado_Por
 * @property string $Observaciones
 * @property string $Observaciones_2
 * @property string $Observaciones_3
 * @property integer $Id_Periodo
 *
 * @property DetalleSolicitud[] $detalleSolicituds
 * @property Tipo[] $idTipos
 * @property Prestamos[] $prestamos
 * @property Equipos[] $idEquipos
 * @property Ayudantes $entregadoPor
 * @property Ayudantes $retiradoPor
 * @property Periodos $idPeriodo
 * @property Ubicaciones $idUbicacion
 * @property Personas $idPersona
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
            [['Id_Persona', 'Id_Ubicacion', 'Estado_Solicitud', 'Entregado_Por', 'Retirado_Por', 'Id_Periodo'], 'integer'],
            [['Fecha_Inicio', 'Hora_Inicio', 'Hora_Fin'], 'required'],
            [['Fecha_Inicio', 'Fecha_Fin', 'Hora_Inicio', 'Hora_Fin', 'Fecha_Solicitud'], 'safe'],
            [['Observaciones'], 'string', 'max' => 400],
            [['Observaciones_2', 'Observaciones_3'], 'string', 'max' => 500],
            [['Entregado_Por'], 'exist', 'skipOnError' => true, 'targetClass' => Ayudantes::className(), 'targetAttribute' => ['Entregado_Por' => 'Id_Ayudante']],
            [['Retirado_Por'], 'exist', 'skipOnError' => true, 'targetClass' => Ayudantes::className(), 'targetAttribute' => ['Retirado_Por' => 'Id_Ayudante']],
            [['Id_Periodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodos::className(), 'targetAttribute' => ['Id_Periodo' => 'Id_Periodo']],
            [['Id_Ubicacion'], 'exist', 'skipOnError' => true, 'targetClass' => Ubicaciones::className(), 'targetAttribute' => ['Id_Ubicacion' => 'Id_Ubicacion']],
            [['Id_Persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['Id_Persona' => 'Id_Persona']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Solicitud' => Yii::t('app', 'Id  Solicitud'),
            'Id_Persona' => Yii::t('app', 'Id  Persona'),
            'Id_Ubicacion' => Yii::t('app', 'Id  Ubicacion'),
            'Fecha_Inicio' => Yii::t('app', 'Fecha  Inicio'),
            'Fecha_Fin' => Yii::t('app', 'Fecha  Fin'),
            'Hora_Inicio' => Yii::t('app', 'Hora  Inicio'),
            'Hora_Fin' => Yii::t('app', 'Hora  Fin'),
            'Estado_Solicitud' => Yii::t('app', 'Estado  Solicitud'),
            'Fecha_Solicitud' => Yii::t('app', 'Fecha  Solicitud'),
            'Entregado_Por' => Yii::t('app', 'Entregado  Por'),
            'Retirado_Por' => Yii::t('app', 'Retirado  Por'),
            'Observaciones' => Yii::t('app', 'Observaciones'),
            'Observaciones_2' => Yii::t('app', 'Observaciones 2'),
            'Observaciones_3' => Yii::t('app', 'Observaciones 3'),
            'Id_Periodo' => Yii::t('app', 'Id  Periodo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleSolicituds()
    {
        return $this->hasMany(DetalleSolicitud::className(), ['Id_Solicitud' => 'Id_Solicitud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipos()
    {
        return $this->hasMany(Tipo::className(), ['Id_Tipo' => 'Id_Tipo'])->viaTable('detalle_solicitud', ['Id_Solicitud' => 'Id_Solicitud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['Id_Solicitud' => 'Id_Solicitud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipos()
    {
        return $this->hasMany(Equipos::className(), ['Id_Equipo' => 'Id_Equipo'])->viaTable('prestamos', ['Id_Solicitud' => 'Id_Solicitud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregadoPor()
    {
        return $this->hasOne(Ayudantes::className(), ['Id_Ayudante' => 'Entregado_Por']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRetiradoPor()
    {
        return $this->hasOne(Ayudantes::className(), ['Id_Ayudante' => 'Retirado_Por']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeriodo()
    {
        return $this->hasOne(Periodos::className(), ['Id_Periodo' => 'Id_Periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUbicacion()
    {
        return $this->hasOne(Ubicaciones::className(), ['Id_Ubicacion' => 'Id_Ubicacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersona()
    {
        return $this->hasOne(Personas::className(), ['Id_Persona' => 'Id_Persona']);
    }
}
