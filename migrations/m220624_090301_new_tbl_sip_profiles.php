<?php

use yii\db\Migration;

/**
 * Class m220624_090301_new_tbl_sip_profiles
 */
class m220624_090301_new_tbl_sip_profiles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("tblSipProfiles", [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'description' => $this->string()->defaultValue('')->notNull(),
            'parameters' => $this->string(1024 * 3)->notNull(),
            'enable' => $this->boolean()->defaultValue(true)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("tblSipProfiles");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220624_090301_new_tbl_sip_profiles cannot be reverted.\n";

        return false;
    }
    */
}
