<?php

namespace app\models\sip_users;

use Yii;

/**
 * This is the model class for table "vwSipUsers".
 *
 * @property int|null $id
 * @property string|null $uid
 * @property string|null $parallel
 * @property string|null $acl
 * @property string|null $password
 * @property string|null $effectiveCallerIdNumber
 * @property string|null $effectiveCallerIdName
 * @property string|null $outboundCallerIdNumber
 * @property string|null $outboundCallerIdName
 * @property bool|null $enable
 * @property int|null $profile_id
 * @property int|null $group_id
 * @property string|null $profile_name
 * @property string|null $sip_user_group_name
 */
class VwSipUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vwSipUsers';
    }

    public static function primaryKey()
    {
        return [
            'id',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'profile_id', 'group_id'], 'integer'],
            [['enable'], 'boolean'],
            [['uid', 'password', 'effectiveCallerIdNumber', 'effectiveCallerIdName', 'outboundCallerIdNumber', 'outboundCallerIdName', 'profile_name', 'sip_user_group_name'], 'string', 'max' => 255],
            [['parallel', 'acl'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'parallel' => 'Parallel',
            'acl' => 'Acl',
            'password' => 'Password',
            'effectiveCallerIdNumber' => 'Effective Caller Id Number',
            'effectiveCallerIdName' => 'Effective Caller Id Name',
            'outboundCallerIdNumber' => 'Outbound Caller Id Number',
            'outboundCallerIdName' => 'Outbound Caller Id Name',
            'enable' => 'Enable',
            'profile_id' => 'Profile ID',
            'group_id' => 'Group ID',
            'profile_name' => 'Profile Name',
            'sip_user_group_name' => 'Sip Use Group Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return VwSipUsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VwSipUsersQuery(get_called_class());
    }
}
