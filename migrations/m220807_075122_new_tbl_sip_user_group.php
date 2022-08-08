<?php

use yii\db\Migration;

/**
 * Class m220807_075122_new_tbl_sip_user_group
 */
class m220807_075122_new_tbl_sip_user_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tblSipUsersGroups', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'desc' => $this->string(1024)->defaultValue(''),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tblSipUsersGroups');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220807_075122_new_tbl_sip_user_group cannot be reverted.\n";

        return false;
    }
    */
}
