<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_equipos".
 *
 * @property integer $Id
 * @property string $Marca
 * @property string $Modelo
 * @property string $Color
 * @property string $NoSerie
 * @property string $Estado
 * @property string $Descripcion
 * @property integer $PermitirUsuario
 * @property integer $Prestado
 */
class ListaEquipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lista_equipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'PermitirUsuario', 'Prestado'], 'integer'],
            [['Marca', 'Modelo', 'Color', 'NoSerie', 'Estado', 'Descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Marca' => 'Marca',
            'Modelo' => 'Modelo',
            'Color' => 'Color',
            'NoSerie' => 'No Serie',
            'Estado' => 'Estado',
            'Descripcion' => 'Descripcion',
            'PermitirUsuario' => 'Permitir Usuario',
            'Prestado' => 'Prestado',
        ];
    }
}
