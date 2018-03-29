<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipos".
 *
 * @property integer $Id_Equipo
 * @property integer $Id_Tipo
 * @property integer $Prestado
 * @property string $Marca
 * @property string $Modelo
 * @property string $No_Serie
 * @property integer $Cod_Inventario
 * @property string $Color
 * @property integer $Estado
 * @property string $Descripcion
 * @property integer $Ubicacion_Origen
 * @property integer $Ubicacion_Actual
 *
 * @property Tipo $idTipo
 * @property MovimientosMantenimientos[] $movimientosMantenimientos
 * @property Mantenimiento[] $idMantenimientos
 * @property Prestamos[] $prestamos
 * @property Solicitud[] $idSolicituds
 */
class Equipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Tipo', 'Prestado', 'Cod_Inventario', 'Estado', 'Ubicacion_Origen', 'Ubicacion_Actual'], 'integer'],
            [['Marca', 'Modelo', 'No_Serie', 'Estado'], 'required'],
            [['Marca', 'Modelo', 'No_Serie', 'Color', 'Descripcion'], 'string', 'max' => 50],
            [['Id_Tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['Id_Tipo' => 'Id_Tipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Equipo' => Yii::t('app', 'Id  Equipo'),
            'Id_Tipo' => Yii::t('app', 'Tipo'),
            'Prestado' => Yii::t('app', 'Prestado'),
            'Marca' => Yii::t('app', 'Marca'),
            'Modelo' => Yii::t('app', 'Modelo'),
            'No_Serie' => Yii::t('app', 'Serie'),
            'Cod_Inventario' => Yii::t('app', 'Cod/Inventario'),
            'Color' => Yii::t('app', 'Color'),
            'Estado' => Yii::t('app', 'Estado'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'Ubicacion_Origen' => Yii::t('app', 'Ubicacion  Origen'),
            'Ubicacion_Actual' => Yii::t('app', 'Ubicacion  Actual'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(Tipo::className(), ['Id_Tipo' => 'Id_Tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientosMantenimientos()
    {
        return $this->hasMany(MovimientosMantenimientos::className(), ['Id_Equipo' => 'Id_Equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMantenimientos()
    {
        return $this->hasMany(Mantenimiento::className(), ['Id_Mantenimiento' => 'Id_Mantenimiento'])->viaTable('movimientos_mantenimientos', ['Id_Equipo' => 'Id_Equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['Id_Equipo' => 'Id_Equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['Id_Solicitud' => 'Id_Solicitud'])->viaTable('prestamos', ['Id_Equipo' => 'Id_Equipo']);
    }
}
