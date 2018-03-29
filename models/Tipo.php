<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo".
 *
 * @property integer $Id_Tipo
 * @property string $Descripcion
 * @property integer $PermitirUsuario
 *
 * @property DetalleSolicitud[] $detalleSolicituds
 * @property Solicitud[] $idSolicituds
 * @property Equipos[] $equipos
 */
class Tipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PermitirUsuario'], 'integer'],
            [['Descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Tipo' => Yii::t('app', 'Id  Tipo'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'PermitirUsuario' => Yii::t('app', 'Permitir Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleSolicituds()
    {
        return $this->hasMany(DetalleSolicitud::className(), ['Id_Tipo' => 'Id_Tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['Id_Solicitud' => 'Id_Solicitud'])->viaTable('detalle_solicitud', ['Id_Tipo' => 'Id_Tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipos::className(), ['Id_Tipo' => 'Id_Tipo']);
    }
}
