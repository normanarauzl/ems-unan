<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipo".
 *
 * @property integer $Id
 * @property integer $IdTipo
 * @property integer $Prestado
 * @property string $Marca
 * @property string $Modelo
 * @property string $NoSerie
 * @property string $CodInventario
 * @property string $Color
 * @property string $Estado
 * @property string $Descripcion
 * @property integer $UbicacionOrigen
 * @property integer $UbicacionActual
 *
 * @property DetalleSolicitud[] $detalleSolicituds
 * @property TipoEquipo $idTipo
 * @property MovimientoMantenimiento[] $movimientoMantenimientos
 */
class Equipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTipo', 'Prestado', 'UbicacionOrigen', 'UbicacionActual'], 'integer'],
            [['Marca', 'Modelo', 'NoSerie', 'CodInventario', 'Color', 'Estado', 'Descripcion'], 'string', 'max' => 255],
            [['IdTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEquipo::className(), 'targetAttribute' => ['IdTipo' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'IdTipo' => Yii::t('app', 'Id Tipo'),
            'Prestado' => Yii::t('app', 'Prestado'),
            'Marca' => Yii::t('app', 'Marca'),
            'Modelo' => Yii::t('app', 'Modelo'),
            'NoSerie' => Yii::t('app', 'No Serie'),
            'CodInventario' => Yii::t('app', 'Cod Inventario'),
            'Color' => Yii::t('app', 'Color'),
            'Estado' => Yii::t('app', 'Estado'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'UbicacionOrigen' => Yii::t('app', 'Ubicacion Origen'),
            'UbicacionActual' => Yii::t('app', 'Ubicacion Actual'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleSolicituds()
    {
        return $this->hasMany(DetalleSolicitud::className(), ['IdEquipo' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(TipoEquipo::className(), ['Id' => 'IdTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientoMantenimientos()
    {
        return $this->hasMany(MovimientoMantenimiento::className(), ['IdEquipo' => 'Id']);
    }
}
