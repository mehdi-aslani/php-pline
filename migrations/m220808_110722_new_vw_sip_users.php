<?php

use yii\db\Migration;

/**
 * Class m220808_110722_new_vw_sip_users
 */
class m220808_110722_new_vw_sip_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE VIEW vwSipUsers AS SELECT 
            su.* ,
            sp.name as profile_name,
            sug.name as sip_user_group_name
            FROM tblSipUsers su left outer join tblSipProfiles sp on su.profile_id=sp.id 
            left outer join tblSipUsersGroups sug on su.group_id=sug.id;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP VIEW vwSipUsers");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220808_110722_new_vw_sip_users cannot be reverted.\n";

        return false;
    }
    */
}
