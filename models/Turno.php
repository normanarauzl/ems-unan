<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property integer $Id
 * @property string $Descripcion
 * @property string $Estado
 *
 * @property Periodo[] $periodos
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion', 'Estado'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodos()
    {
        return $this->hasMany(Periodo::className(), ['IdTurno' => 'Id']);
    }
}
