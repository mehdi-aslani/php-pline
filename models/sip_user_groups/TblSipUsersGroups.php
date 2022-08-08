<?php

namespace app\models\sip_user_groups;

use Yii;

/**
 * This is the model class for table "tblSipUsersGroups".
 *
 * @property int $id
 * @property string $name
 * @property string|null $desc
 */
class TblSipUsersGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblSipUsersGroups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 1024],
            [['name'], 'unique'],
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
            'desc' => 'Desc',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblSipUsersGroupsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSipUsersGroupsQuery(get_called_class());
    }
}
