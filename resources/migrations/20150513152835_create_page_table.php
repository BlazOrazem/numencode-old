<?php

use Phinx\Migration\AbstractMigration;

class CreatePageTable extends AbstractMigration
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
        $table = $this->table('page', array('id' => false, 'primary_key' => 'id'));
        $table->addColumn('id', 'integer', array('identity' => true, 'limit' => 10, 'signed' => false))
            ->addColumn('page_id', 'integer', array('null' => true, 'default' => null, 'limit' => 10, 'signed' => false))
            ->addColumn('page_type_id', 'integer', array('limit' => 10, 'signed' => false))
            ->addColumn('display_rule', 'string', array('default' => 'always'))
            ->addColumn('is_sitemap', 'integer', array('limit' => 1, 'null' => true, 'default' => 1, 'signed' => false))
            ->addColumn('is_hidden', 'integer', array('limit' => 1, 'null' => true, 'default' => null, 'signed' => false))
            ->addColumn('ord', 'integer', array('null' => true, 'default' => null))
            ->addColumn('created_at', 'datetime', array('default' => 'CURRENT_TIMESTAMP'))
            ->addColumn('updated_at', 'datetime', array('null' => true, 'update' => 'CURRENT_TIMESTAMP'))
            ->addColumn('created_by', 'integer', array('limit' => 10, 'signed' => false))
            ->addColumn('updated_by', 'integer', array('limit' => 10, 'signed' => false))
            ->addIndex('page_id')
            ->addIndex('page_type_id')
            ->save();

        $table = $this->table('page_i18n', array('id' => false, 'primary_key' => 'id'));
        $table->addColumn('id', 'integer', array('identity' => true, 'limit' => 10, 'signed' => false))
            ->addColumn('page_id', 'integer', array('limit' => 10, 'signed' => false))
            ->addColumn('lang_id', 'string', array('limit' => 2, 'default' => 'en'))
            ->addColumn('title', 'string', array('limit' => 255, 'null' => true, 'default' => null))
            ->addColumn('subtitle', 'string', array('limit' => 255, 'null' => true, 'default' => null))
            ->addColumn('body', 'text', array('null' => true, 'default' => null))
            ->addColumn('meta_title', 'string', array('limit' => 255, 'null' => true, 'default' => null))
            ->addColumn('meta_description', 'string', array('limit' => 255, 'null' => true, 'default' => null))
            ->addColumn('meta_keywords', 'string', array('limit' => 255, 'null' => true, 'default' => null))
            ->addIndex('page_id')
            ->addIndex('lang_id')
            ->save();
        $this->query('ALTER TABLE `page_i18n` ADD FULLTEXT(`title`, `subtitle`, `body`)');
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('page');
        $this->dropTable('page_i18n');
    }
}