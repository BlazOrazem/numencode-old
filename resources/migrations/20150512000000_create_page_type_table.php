<?php

use Phinx\Migration\AbstractMigration;

class CreatePageTypeTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('page_type', array('id' => false, 'primary_key' => 'id'));
        $table->addColumn('id', 'integer', array('identity' => true, 'limit' => 10, 'signed' => false))
            ->addColumn('code', 'string', array('limit' => 255))
            ->addColumn('title', 'string', array('limit' => 255, 'null' => true, 'default' => null))
            ->addColumn('ord', 'integer', array('null' => true, 'default' => null))
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('page_type');
    }
}