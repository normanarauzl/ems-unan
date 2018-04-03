<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitudes".
 *
 * @property integer $Id
 * @property string $Solicitante
 * @property string $Ubicacion
 * @property string $FechaInicio
 * @property string $FechaFin
 */
class Solicitudes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitudes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['FechaInicio'], 'required'],
            [['Solicitante'], 'string', 'max' => 101],
            [['Ubicacion', 'FechaInicio', 'FechaFin'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Solicitante' => 'Solicitante',
            'Ubicacion' => 'Ubicacion',
            'FechaInicio' => 'Fecha Inicio',
            'FechaFin' => 'Fecha Fin',
        ];
    }
}
