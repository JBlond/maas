<?php

namespace jblond\maas;

class Logger
{
    /**
     * @param string $message
     */
    public static function log(string $message) {
        //if (isset($_ENV['DEBUG']) && $_ENV['DEBUG'] == true) {
            echo '<pre>';
            print_r($message);
            echo '</pre>';
            //return;
        //}

        if (file_put_contents(
                '../logs/error_log_' . date("Y-m-d") . '.txt',
                "\n" . date("Y-n-j H:i:s") . ' ' . $message . "\n ------------",
                FILE_APPEND
            ) === false) {
            error_log($message);

        }
    }

}
