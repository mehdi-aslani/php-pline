<?php

use yii\db\Migration;

/**
 * Class m220807_185901_new_tbl_sip_users
 */
class m220807_185901_new_tbl_sip_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tblSipUsers', [
            'id' => $this->primaryKey(),
            'uid' => $this->string()->unique()->notNull(),
            'parallel' => $this->string(512)->defaultValue(''),
            'acl' => $this->string(512)->defaultValue(''),
            'password' => $this->string()->defaultValue(''),
            'effectiveCallerIdNumber' => $this->string()->defaultValue(''),
            'effectiveCallerIdName' => $this->string()->defaultValue(''),
            'outboundCallerIdNumber' => $this->string()->defaultValue(''),
            'outboundCallerIdName' => $this->string()->defaultValue(''),
            'enable' => $this->boolean()->defaultValue(true),
            'profile_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'FOREIGN KEY (profile_id) REFERENCES "tblSipProfiles" (id)',
            'FOREIGN KEY (group_id) REFERENCES "tblSipUsersGroups" (id)',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tblSipUsers');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220807_185901_new_tbl_sip_users cannot be reverted.\n";

        return false;
    }
    */
}
