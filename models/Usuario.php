<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $Id
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Usuario
 * @property string $Password
 * @property integer $IdRol
 * @property string $Email
 * @property integer $Activo
 * @property integer $ResetPassword
 *
 * @property Rol $Rol
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Usuario', 'Password', 'IdRol', 'Email', 'Activo', 'ResetPassword'], 'required'],
            [['IdRol', 'Activo', 'ResetPassword'], 'integer'],
            [['Nombre', 'Apellido'], 'string', 'max' => 100],
            [['Usuario'], 'string', 'max' => 45],
            [['Password'], 'string', 'max' => 500],
            [['Email'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Usuario' => 'Usuario',
            'Password' => 'Password',
            'IdRol' => 'Id Rol',
            'Email' => 'Email',
            'Activo' => 'Activo',
            'ResetPassword' => 'Reset Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['Id' => 'IdRol']);
    }
}
