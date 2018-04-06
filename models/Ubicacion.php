<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicacion".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property integer $Estado
 * @property integer $Clasificacion
 *
 * @property Solicitud[] $solicituds
 */
class Ubicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado', 'Clasificacion'], 'integer'],
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
            'Estado' => Yii::t('app', 'Estado'),
            'Clasificacion' => Yii::t('app', 'Clasificacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['IdUbicacion' => 'Id']);
    }
}
