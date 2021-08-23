<?php

namespace App\Entity;

class BattleLog
{
    private static $logs = array();

    /**
     * @return array
     */
    public static function getLogs()
    {
        return self::$logs;
    }



    public static function addToLog($log) {
        self::$logs[] = $log;
    }


}