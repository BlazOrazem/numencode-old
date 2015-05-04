<?php namespace App\Core;

class Session {

    /**
     * Create a new Session instance.
     */
    public function __construct()
    {
        try {
            session_start();
        } catch(\Exception  $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Set session variable.
     *
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Unset session variable.
     *
     * @param $key
     */
    public static function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Get session variable.
     *
     * @param string $key
     * @return string
     */
    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Destroy the global PHP session.
     *
     */
    public static function destroy()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
    }

}
