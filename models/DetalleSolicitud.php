<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_solicitud".
 *
 * @property integer $Id
 * @property integer $IdEquipo
 * @property integer $IdSolicitud
 *
 * @property Equipo $idEquipo
 * @property Solicitud $idSolicitud
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
            [['IdEquipo', 'IdSolicitud'], 'integer'],
            [['IdEquipo'], 'exist', 'skipOnError' => true, 'targetClass' => Equipo::className(), 'targetAttribute' => ['IdEquipo' => 'Id']],
            [['IdSolicitud'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitud::className(), 'targetAttribute' => ['IdSolicitud' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'IdEquipo' => Yii::t('app', 'Id Equipo'),
            'IdSolicitud' => Yii::t('app', 'Id Solicitud'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipo()
    {
        return $this->hasOne(Equipo::className(), ['Id' => 'IdEquipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSolicitud()
    {
        return $this->hasOne(Solicitud::className(), ['Id' => 'IdSolicitud']);
    }
}
