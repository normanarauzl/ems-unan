<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lista_ubicaciones".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $PermitirUsuario
 */
class ListaUbicaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lista_ubicaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'PermitirUsuario'], 'integer'],
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
}
