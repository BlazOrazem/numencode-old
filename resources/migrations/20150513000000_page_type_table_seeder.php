<?php

use Phinx\Migration\AbstractMigration;

class PageTypeTableSeeder extends AbstractMigration
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
        $this->query("INSERT INTO `page_type` (`id`, `code`, `title`, `ord`)
          VALUES ('1', 'main', 'Main menu', '10')");

        $this->query("INSERT INTO `page_type` (`id`, `code`, `title`, `ord`)
          VALUES ('2', 'hidden', 'Hidden menu', '20')");

        $this->query("INSERT INTO `page_type` (`id`, `code`, `title`, `ord`)
          VALUES ('3', 'header', 'Header menu', '30')");
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('TRUNCATE TABLE page_type');
    }
}