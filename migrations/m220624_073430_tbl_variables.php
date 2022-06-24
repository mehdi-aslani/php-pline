<?php

use yii\db\Migration;

/**
 * Class m220624_073430_tbl_variables
 */
class m220624_073430_tbl_variables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tblVariables', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'value' => $this->string()->notNull(),
            'desc' => $this->string(1024)->notNull()->defaultValue(''),
        ]);

        $this->insert('tblVariables', [
            'name'  => 'global_codec_prefs',
            'value' => 'PCMU,PCMA,G729,GSM',
            'desc' => '',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("tblVariables");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220624_073430_tbl_variables cannot be reverted.\n";

        return false;
    }
    */
}