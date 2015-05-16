<?php

use Phinx\Migration\AbstractMigration;
use Faker\Factory as Faker;

class PageTableSeeder extends AbstractMigration
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
        $faker = Faker::create();

        for ($i=1; $i <= 7; $i++) {
            $parentId = $i == 1 ? 'NULL' : 1;

            $this->query("INSERT INTO `page` (`id`, `page_id`, `page_type_id`, `display_rule`, `is_sitemap`, `is_hidden`, `ord`, `created_at`, `updated_at`, `created_by`, `updated_by`)
              VALUES ('{$i}', {$parentId}, '1', 'always', '1', NULL, '{$i}0', CURRENT_TIMESTAMP, NULL, '1', '1')");
        }

        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (1, 'en', 'Main Menu', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (2, 'en', 'Home', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (3, 'en', 'About us', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (4, 'en', 'News', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (5, 'en', 'Catalog', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (6, 'en', 'Gallery', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        $this->query("INSERT INTO `page_i18n` (`page_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
            VALUES (7, 'en', 'Contact', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('TRUNCATE TABLE page');
        $this->execute('TRUNCATE TABLE page_i18n');
    }
}