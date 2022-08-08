<?php

namespace app\models\sip_profiles;

use Yii;

/**
 * This is the model class for table "tblSipProfiles".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $parameters
 * @property bool $enable
 */
class TblSipProfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblSipProfiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name',], 'required'],
            [['enable'], 'boolean'],
            [['name', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['parameters'], 'ValodationParameter'],
            [['parameters'], 'string', 'max' => 3072],
        ];
    }

    public function ValodationParameter()
    {
        $params = json_encode($this->parameters);
        if ($params) {
            $this->parameters = $params;
            return true;
        }
        $this->addError("parameters", "Parameters must be a string.");
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'parameters' => 'Parameters',
            'enable' => 'Enable',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblSipProfilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSipProfilesQuery(get_called_class());
    }
}
