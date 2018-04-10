<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mantenimiento".
 *
 * @property integer $Id
 * @property integer $IdUbicacion
 * @property string $Fecha
 * @property string $Observacion
 * @property integer $IdAyudante
 *
 * @property MovimientoMantenimiento[] $movimientoMantenimientos
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
            [['IdUbicacion', 'IdAyudante'], 'integer'],
            [['Fecha', 'Observacion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'IdUbicacion' => Yii::t('app', 'Ubicacion'),
            'Fecha' => Yii::t('app', 'Fecha'),
            'Observacion' => Yii::t('app', 'Observacion'),
            'IdAyudante' => Yii::t('app', 'Enviado por'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientoMantenimientos()
    {
        return $this->hasMany(MovimientoMantenimiento::className(), ['IdMantenimiento' => 'Id']);
    }
    
}
