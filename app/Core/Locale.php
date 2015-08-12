<?php namespace App\Core;

class Locale {

    /** @var void Set the default Locale. */
    protected $defaultLocale;

    /** @var void Set the active Locale. */
    protected $activeLocale;

    /** @var Database constructor injection. */
    protected $db;

    /**
     * Create a new Locale instance.
     *
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->db = $database;
        $this->defaultLocale = $this->setDefaultLocale();
        $this->activeLocale = $this->setActiveLocale();
    }

    /**
     * Set the default Locale.
     *
     * @return string Locale ID
     */
    public function setDefaultLocale()
    {
        return 'en';
        return $this->db->getCell('SELECT id FROM lang WHERE is_default = 1') ?: 'en';
    }

    /**
     * Set the active Locale.
     *
     * @return string Locale ID
     */
    public function setActiveLocale()
    {
        // Attempt to set the active locale, if it is defined in URL
        if (isset($_GET['lang'])) {
            return $this->attemptToSetActiveLocale(strtolower($_GET['lang']));
        }

        // Attempt to set the locale defined in Session, else return default
        return (Session::get('lang') !== null) ? Session::get('lang') : $this->setSessionLocale($this->defaultLocale);
    }

    /**
     * Attempt to set the locale requested in URL as active.
     *
     * @param string $locale Locale ID
     * @return string Locale ID
     */
    protected function attemptToSetActiveLocale($locale)
    {
        // Get all locales from Database
        $dbLocales = $this->db->getCol('SELECT id FROM lang');

        // If locale doesn't exists, return default
        if (!in_array($locale, $dbLocales)) {
            return $this->defaultLocale;
        }

        // If locale exists, set the session and active locale
        return $this->setSessionLocale($locale);
    }

    /**
     * Set the Session locale.
     *
     * @param string $locale Locale ID
     * @return string Locale ID
     */
    protected function setSessionLocale($locale)
    {
        Session::set('lang', $locale);
        return $locale;
    }

}
