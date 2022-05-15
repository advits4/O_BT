<?php 
class AppConfig {
    private static $appRootPath;
    private static $appWebTitle;
    private static $appName;

    public function __construct() {}

    // some of the common app level properties

    public static function getRootPath(): String
    {
        if (!isset(self::$appRootPath)) {
            self::$appRootPath = __DIR__ . DIRECTORY_SEPARATOR;
        }
        return self::$appRootPath;
    }

    public static function getPageTitle(): String
    {
        if (!isset(self::$appWebTitle)) {
            self::$appWebTitle = 'Bee Game Test';
        }
        return self::$appWebTitle;
    }

    public static function getAppName(): String
    {
        if (!isset(self::$appName)) {
            self::$appName = 'beeGame';
        }
        return self::$appName;
    }
}