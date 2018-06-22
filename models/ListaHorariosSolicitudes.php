<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_horarios_solicitudes".
 *
 * @property int $IdSolicitud
 * @property string $EstadoSolicitud
 * @property int $IdPeriodo
 * @property int $IdUbicacion
 * @property string $HoraInicio
 * @property string $HoraFin
 * @property string $FechaInicio
 * @property string $FechaFin
 * @property string $Titulo
 */
class ListaHorariosSolicitudes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lista_horarios_solicitudes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdSolicitud', 'IdPeriodo', 'IdUbicacion'], 'integer'],
            [['Titulo'], 'string'],
            [['EstadoSolicitud', 'HoraInicio', 'HoraFin', 'FechaInicio', 'FechaFin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSolicitud' => 'Id Solicitud',
            'EstadoSolicitud' => 'Estado Solicitud',
            'IdPeriodo' => 'Id Periodo',
            'IdUbicacion' => 'Id Ubicacion',
            'HoraInicio' => 'Hora Inicio',
            'HoraFin' => 'Hora Fin',
            'FechaInicio' => 'Fecha Inicio',
            'FechaFin' => 'Fecha Fin',
            'Titulo' => 'Titulo',
        ];
    }
}
