<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_periodos".
 *
 * @property integer $Id
 * @property string $DescripcionCompleta
 * @property integer $IdTurno
 */
class ListaPeriodos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lista_periodos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'IdTurno'], 'integer'],
            [['DescripcionCompleta'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'DescripcionCompleta' => 'Descripcion Completa',
            'IdTurno' => 'Id Turno',
        ];
    }
}
