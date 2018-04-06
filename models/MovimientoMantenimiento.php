<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimiento_mantenimiento".
 *
 * @property integer $Id
 * @property integer $IdEquipo
 * @property integer $IdMantenimiento
 * @property string $FechaRetiro
 * @property integer $RetiradoPor
 *
 * @property Equipo $idEquipo
 * @property Mantenimiento $idMantenimiento
 */
class MovimientoMantenimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimiento_mantenimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdEquipo', 'IdMantenimiento', 'RetiradoPor'], 'integer'],
            [['FechaRetiro'], 'string', 'max' => 255],
            [['IdEquipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['IdEquipo' => 'Id']],
            [['IdMantenimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Mantenimiento::className(), 'targetAttribute' => ['IdMantenimiento' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'IdEquipo' => Yii::t('app', 'Id Equipo'),
            'IdMantenimiento' => Yii::t('app', 'Id Mantenimiento'),
            'FechaRetiro' => Yii::t('app', 'Fecha Retiro'),
            'RetiradoPor' => Yii::t('app', 'Retirado Por'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipo()
    {
        return $this->hasOne(Equipo::className(), ['Id' => 'IdEquipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMantenimiento()
    {
        return $this->hasOne(Mantenimiento::className(), ['Id' => 'IdMantenimiento']);
    }
}
