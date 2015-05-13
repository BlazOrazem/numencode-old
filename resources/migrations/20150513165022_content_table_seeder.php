<?php

use Phinx\Migration\AbstractMigration;
use Faker\Factory as Faker;

class ContentTableSeeder extends AbstractMigration
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

        $this->query("INSERT INTO `content` (`id`, `page_id`, `plugin_code`, `plugin_param`, `position`, `display_rule`, `ord`, `is_hidden`, `created_at`, `updated_at`, `created_by`, `updated_by`)
                          VALUES ('1', NULL, NULL, NULL, 'center', 'always', '10', NULL, CURRENT_TIMESTAMP, NULL, '1', '1')");
        $this->query("INSERT INTO `content_i18n` (`id`, `content_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
                      VALUES ('1', '1', 'en', 'Main Menu', NULL, NULL, NULL, NULL, NULL)");

        for ($i=2; $i <= 6; $i++) {
            $this->query("INSERT INTO `content` (`id`, `page_id`, `plugin_code`, `plugin_param`, `position`, `display_rule`, `ord`, `is_hidden`, `created_at`, `updated_at`, `created_by`, `updated_by`)
                          VALUES ({$i}, '1', NULL, NULL, 'center', 'always', '{$i}0', NULL, CURRENT_TIMESTAMP, NULL, '1', '1')");

            $this->query("INSERT INTO `content_i18n` (`id`, `content_id`, `lang_id`, `title`, `subtitle`, `body`, `meta_title`, `meta_description`, `meta_keywords`)
                          VALUES ({$i}, {$i}, 'en', '{$faker->sentence}', '{$faker->sentence}', '<p>{$faker->text}</p><p>{$faker->text}</p><p>{$faker->text}</p>', '{$faker->sentence}', '{$faker->sentence}', '{$faker->word}, {$faker->word}, {$faker->word}')");
        }
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('TRUNCATE TABLE content');
        $this->execute('TRUNCATE TABLE content_i18n');
    }
}