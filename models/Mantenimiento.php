<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mantenimiento".
 *
 * @property integer $Id_Mantenimiento
 * @property integer $Id_Ubicacion
 * @property string $Fecha
 * @property string $Observacion
 * @property integer $Id_Ayudante
 *
 * @property Ayudantes $idAyudante
 * @property Ubicaciones $idUbicacion
 * @property MovimientosMantenimientos[] $movimientosMantenimientos
 * @property Equipos[] $idEquipos
 */
class Mantenimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mantenimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Ubicacion', 'Id_Ayudante'], 'integer'],
            [['Fecha'], 'safe'],
            [['Observacion'], 'string', 'max' => 400],
            [['Id_Ayudante'], 'exist', 'skipOnError' => true, 'targetClass' => Ayudantes::className(), 'targetAttribute' => ['Id_Ayudante' => 'Id_Ayudante']],
            [['Id_Ubicacion'], 'exist', 'skipOnError' => true, 'targetClass' => Ubicaciones::className(), 'targetAttribute' => ['Id_Ubicacion' => 'Id_Ubicacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Mantenimiento' => Yii::t('app', 'Id  Mantenimiento'),
            'Id_Ubicacion' => Yii::t('app', 'Ubicacion'),
            'Fecha' => Yii::t('app', 'Fecha'),
            'Observacion' => Yii::t('app', 'Observacion'),
            'Id_Ayudante' => Yii::t('app', 'Ayudante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAyudante()
    {
        return $this->hasOne(Ayudantes::className(), ['Id_Ayudante' => 'Id_Ayudante']);
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
    public function getMovimientosMantenimientos()
    {
        return $this->hasMany(MovimientosMantenimientos::className(), ['Id_Mantenimiento' => 'Id_Mantenimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipos()
    {
        return $this->hasMany(Equipos::className(), ['Id_Equipo' => 'Id_Equipo'])->viaTable('movimientos_mantenimientos', ['Id_Mantenimiento' => 'Id_Mantenimiento']);
    }
}
