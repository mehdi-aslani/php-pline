<?php

namespace app\models\sip_users;

use app\models\sip_profiles\TblSipProfiles;
use app\models\sip_user_groups\TblSipUsersGroups;
use Yii;

/**
 * This is the model class for table "tblSipUsers".
 *
 * @property int $id
 * @property string $uid
 * @property string|null $parallel
 * @property string|null $acl
 * @property string|null $password
 * @property string|null $effectiveCallerIdNumber
 * @property string|null $effectiveCallerIdName
 * @property string|null $outboundCallerIdNumber
 * @property string|null $outboundCallerIdName
 * @property bool|null $enable
 * @property int $profile_id
 * @property int $group_id
 *
 * @property TblSipUsersGroup $group
 * @property TblSipProfile $profile
 */
class TblSipUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblSipUsers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'profile_id', 'group_id'], 'required'],
            [['enable'], 'boolean'],
            [['profile_id', 'group_id'], 'integer'],
            [['uid', 'password', 'effectiveCallerIdNumber', 'effectiveCallerIdName', 'outboundCallerIdNumber', 'outboundCallerIdName'], 'string', 'max' => 255],
            [['parallel', 'acl'], 'string', 'max' => 512],
            [['uid'], 'unique'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSipUsersGroups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSipProfiles::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'User Id',
            'parallel' => 'Parallel',
            'acl' => 'Acl',
            'password' => 'Password',
            'effectiveCallerIdNumber' => 'Effective Caller Id Number',
            'effectiveCallerIdName' => 'Effective Caller Id Name',
            'outboundCallerIdNumber' => 'Outbound Caller Id Number',
            'outboundCallerIdName' => 'Outbound Caller Id Name',
            'enable' => 'Enable',
            'profile_id' => 'SIP Profile',
            'group_id' => 'SIP User Group',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery|TblSipUsersGroupQuery
     */
    public function getGroup()
    {
        return $this->hasOne(TblSipUsersGroups::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery|TblSipProfileQuery
     */
    public function getProfile()
    {
        return $this->hasOne(TblSipProfiles::className(), ['id' => 'profile_id']);
    }

    /**
     * {@inheritdoc}
     * @return TblSipUsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSipUsersQuery(get_called_class());
    }
}
