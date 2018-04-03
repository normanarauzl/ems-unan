<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_personas".
 *
 * @property integer $Id
 * @property string $NombreCompleto
 */
class ListaPersonas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lista_personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['NombreCompleto'], 'string', 'max' => 101],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'NombreCompleto' => 'Nombre Completo',
        ];
    }
}
