<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_equipos".
 *
 * @property integer $Id_Equipo
 * @property integer $Estado
 * @property integer $PermitirUsuario
 * @property string $Color
 * @property string $No_Serie
 * @property string $Modelo
 * @property string $Marca
 * @property string $Descripcion
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
            [['Id_Equipo', 'Estado', 'PermitirUsuario'], 'integer'],
            [['Estado', 'No_Serie', 'Modelo', 'Marca'], 'required'],
            [['Color', 'No_Serie', 'Modelo', 'Marca', 'Descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Equipo' => Yii::t('app', 'Id  Equipo'),
            'Estado' => Yii::t('app', 'Estado'),
            'PermitirUsuario' => Yii::t('app', 'Permitir Usuario'),
            'Color' => Yii::t('app', 'Color'),
            'No_Serie' => Yii::t('app', 'No  Serie'),
            'Modelo' => Yii::t('app', 'Modelo'),
            'Marca' => Yii::t('app', 'Marca'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
