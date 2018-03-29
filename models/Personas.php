<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property integer $Id_Persona
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Cedula
 * @property integer $Telefono
 * @property integer $Tipo
 * @property string $Estado
 *
 * @property Solicitud[] $solicituds
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'Cedula', 'Telefono', 'Tipo', 'Estado'], 'required'],
            [['Telefono'], 'integer'],
            [['Nombre', 'Apellido', 'Cedula'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Persona' => Yii::t('app', 'Id  Persona'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'Cedula' => Yii::t('app', 'Cedula'),
            'Telefono' => Yii::t('app', 'Telefono'),
//            'Tipo' => Yii::t('app', 'Tipo'),
            'Estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['Id_Persona' => 'Id_Persona']);
    }
}
