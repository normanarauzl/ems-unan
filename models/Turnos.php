<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turnos".
 *
 * @property integer $Id_Turno
 * @property string $Descripcion
 * @property integer $Estado
 *
 * @property Periodos[] $periodos
 */
class Turnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado'], 'integer'],
            [['Descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id_Turno' => Yii::t('app', 'Id  Turno'),
            'Descripcion' => Yii::t('app', 'Descripcion'),
            'Estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodos()
    {
        return $this->hasMany(Periodos::className(), ['Id_Turno' => 'Id_Turno']);
    }
}
