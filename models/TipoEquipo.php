<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_equipo".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $PermitirUsuario
 *
 * @property Equipo[] $equipos
 */
class TipoEquipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_equipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PermitirUsuario'], 'integer'],
            [['Descripcion'], 'string', 'max' => 255],
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
            'PermitirUsuario' => Yii::t('app', 'Permitir Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['IdTipo' => 'Id']);
    }
}
