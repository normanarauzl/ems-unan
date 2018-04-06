<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $Id
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Cedula
 * @property string $Telefono
 * @property string $Estado
 * @property integer $IdTipo
 * @property integer $IdUsuario
 *
 * @property TipoPersona $idTipo
 * @property User $idUsuario
 * @property Solicitud[] $solicituds
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTipo', 'IdUsuario'], 'integer'],
            [['Nombres', 'Apellidos', 'Cedula', 'Telefono', 'Estado'], 'string', 'max' => 255],
            [['IdTipo'], 'unique'],
            [['IdUsuario'], 'unique'],
            [['IdTipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPersona::className(), 'targetAttribute' => ['IdTipo' => 'Id']],
            [['IdUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUsuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Nombres' => 'Nombres',
            'Apellidos' => 'Apellidos',
            'Cedula' => 'Cedula',
            'Telefono' => 'Telefono',
            'Estado' => 'Estado',
            'IdTipo' => 'Tipo de Persona',
            'IdUsuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(TipoPersona::className(), ['Id' => 'IdTipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'IdUsuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['IdPersona' => 'Id']);
    }
}
