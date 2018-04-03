<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_periodos".
 *
 * @property integer $Id
 * @property string $DescripcionCompleta
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
            [['Id'], 'integer'],
            [['DescripcionCompleta'], 'string', 'max' => 250],
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
        ];
    }
}
