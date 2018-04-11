<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $Estado
 * @property integer $IdClasificacionUbicacion
 *
 * @property Solicitud[] $solicituds
 * @property ClasificacionUbicacion $idClasificacionUbicacion
 */
class Ubicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado', 'IdClasificacionUbicacion'], 'integer'],
            [['Descripcion'], 'string', 'max' => 255],
            [['IdClasificacionUbicacion'], 'exist', 'skipOnError' => true, 'targetClass' => ClasificacionUbicacion::className(), 'targetAttribute' => ['IdClasificacionUbicacion' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'Estado' => Yii::t('app', 'Estado'),
            'IdClasificacionUbicacion' => Yii::t('app', 'Categoria de Ubicacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['IdUbicacion' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClasificacionUbicacion()
    {
        return $this->hasOne(ClasificacionUbicacion::className(), ['Id' => 'IdClasificacionUbicacion']);
    }
}
