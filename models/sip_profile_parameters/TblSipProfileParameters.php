<?php

namespace app\models\sip_profile_parameters;

use Yii;

/**
 * This is the model class for table "tblSipProfileParameters".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string $desc
 */
class TblSipProfileParameters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblSipProfileParameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name', 'value'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'desc' => 'Desc',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\TblSipProfileParametersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSipProfileParametersQuery(get_called_class());
    }
}
