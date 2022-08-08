<?php

namespace app\models\sip_trunks;

use app\models\sip_profiles\TblSipProfiles;
use Yii;

/**
 * This is the model class for table "tblSipTrunks".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string|null $realm
 * @property string|null $from_user
 * @property string|null $from_domain
 * @property string|null $password
 * @property string|null $extension
 * @property string $proxy
 * @property string|null $outbound_proxy
 * @property bool|null $register
 * @property string|null $register_proxy
 * @property int|null $expire_seconds
 * @property string|null $register_transport
 * @property int|null $retry_second
 * @property bool|null $caller_id_in_from
 * @property string|null $contact_params
 * @property int|null $ping
 * @property int $profile_id
 * @property bool $enable
 * @property string|null $desc
 *
 * @property TblSipProfile $profile
 */
class TblSipTrunks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblSipTrunks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username', 'proxy', 'profile_id', 'enable'], 'required'],
            [['register', 'caller_id_in_from', 'enable'], 'boolean'],
            [['expire_seconds', 'retry_second', 'ping', 'profile_id'], 'integer'],
            [['name', 'username', 'realm', 'from_user', 'from_domain', 'password', 'extension', 'proxy', 'outbound_proxy', 'register_proxy', 'register_transport', 'contact_params', 'desc'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'name' => 'Name',
            'username' => 'Username',
            'realm' => 'Realm',
            'from_user' => 'From User',
            'from_domain' => 'From Domain',
            'password' => 'Password',
            'extension' => 'Extension',
            'proxy' => 'Proxy',
            'outbound_proxy' => 'Outbound Proxy',
            'register' => 'Register',
            'register_proxy' => 'Register Proxy',
            'expire_seconds' => 'Expire Seconds',
            'register_transport' => 'Register Transport',
            'retry_second' => 'Retry Second',
            'caller_id_in_from' => 'Caller Id In From',
            'contact_params' => 'Contact Params',
            'ping' => 'Ping',
            'profile_id' => 'SIP Profile',
            'enable' => 'Enable',
            'desc' => 'Desc',
        ];
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
     * @return TblSipTrunksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblSipTrunksQuery(get_called_class());
    }
}
