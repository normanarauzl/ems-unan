<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_solicitud".
 *
 * @property integer $Id_Tipo
 * @property integer $Id_Solicitud
 *
 * @property Solicitud $idSolicitud
 * @property Tipo $idTipo
 */
class DetalleSolicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id_Tipo', 'Id_Solicitud'], 'required'],
            [['Id_Tipo', 'Id_Solicitud'], 'integer'],
            [['Id_Solicitud'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitud::className(), 'targetAttribute' => ['Id_Solicitud' => 'Id_Solicitud']],
            [['Id_Tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['Id_Tipo' => 'Id_Tipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Tipo' => 'Id  Tipo',
            'Id_Solicitud' => 'Id  Solicitud',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSolicitud()
    {
        return $this->hasOne(Solicitud::className(), ['Id_Solicitud' => 'Id_Solicitud']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(Tipo::className(), ['Id_Tipo' => 'Id_Tipo']);
    }
}
