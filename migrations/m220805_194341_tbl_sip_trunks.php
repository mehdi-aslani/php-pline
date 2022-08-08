<?php

use yii\db\Migration;

/**
 * Class m220805_194341_tbl_sip_trunks
 */
class m220805_194341_tbl_sip_trunks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tblSipTrunks', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'username' => $this->string()->notNull(),
            'realm' => $this->string(),
            'from_user' => $this->string(),
            'from_domain' => $this->string(),
            'password' => $this->string(),
            'extension' => $this->string(),
            'proxy' => $this->string()->notNull(),
            'outbound_proxy' => $this->string(),
            'register' => $this->boolean(),
            'register_proxy' => $this->string(),
            'expire_seconds' => $this->integer(),
            'register_transport' => $this->string(),
            'retry_second' => $this->integer(),
            'caller_id_in_from' => $this->boolean(),
            'contact_params' => $this->string(),
            'ping' => $this->integer(),
            'profile_id' => $this->integer()->notNull(),
            'enable' => $this->boolean()->notNull(),
            'desc' => $this->string()->defaultValue(''),
            'FOREIGN KEY (profile_id) REFERENCES "tblSipProfiles" (id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("tblSipTrunks");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220805_194341_tbl_sip_trunks cannot be reverted.\n";

        return false;
    }
    */
}
