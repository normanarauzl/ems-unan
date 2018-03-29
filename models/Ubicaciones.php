<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ubicaciones".
 *
 * @property integer $Id_Ubicacion
 * @property string $Descripcion
 * @property integer $Estado
 * @property integer $Clasificacion
 *
 * @property Mantenimiento[] $mantenimientos
 * @property Solicitud[] $solicituds
 */
class Ubicaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ubicaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado', 'Clasificacion'], 'integer'],
            [['Clasificacion'], 'required'],
            [['Descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Ubicacion' => Yii::t('app', 'Id  Ubicacion'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'Estado' => Yii::t('app', 'Estado'),
            'Clasificacion' => Yii::t('app', 'Clasificacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMantenimientos()
    {
        return $this->hasMany(Mantenimiento::className(), ['Id_Ubicacion' => 'Id_Ubicacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['Id_Ubicacion' => 'Id_Ubicacion']);
    }
}
