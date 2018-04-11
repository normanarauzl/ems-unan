<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificacion_ubicacion".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $PermitirUsuario
 *
 * @property Ubicacion[] $ubicacions
 */
class ClasificacionUbicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clasificacion_ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PermitirUsuario'], 'integer'],
            [['Descripcion'], 'string', 'max' => 100],
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
            'PermitirUsuario' => Yii::t('app', 'Permitir al Usuario?'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacions()
    {
        return $this->hasMany(Ubicacion::className(), ['IdClasificacionUbicacion' => 'Id']);
    }
}
