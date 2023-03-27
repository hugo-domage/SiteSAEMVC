<?php
final class Constants
{
// Les constantes relatives aux chemins

const VIEW_DIRECTORY        = '/views/';

const MODEL_DIRECTORY      = '/models/';

const CORE_DIRECTORY       = '/core/';

const EXCEPTIONS_DIRECTORY  = '/core/Exceptions/';

const CONTROLLERS_DIRECTORY = '/controllers/';

const DATABASE_DIRECTORY = '/core/Database/';

    public static function rootDirectory() {
        return realpath(__DIR__ . '/../');
    }

    public static function coreDirectory() {
        return self::rootDirectory() . self::CORE_DIRECTORY;
    }

    public static function exceptionsDirectory() {
        return self::rootDirectory() . self::EXCEPTIONS_DIRECTORY;
    }

    public static function viewsDirectory() {
        return self::rootDirectory() . self::VIEW_DIRECTORY;
    }

    public static function modelDirectory() {
        return self::rootDirectory() . self::MODEL_DIRECTORY;
    }

    public static function controllersDirectory() {
        return self::rootDirectory() . self::CONTROLLERS_DIRECTORY;
    }
    public static function databseDirectory() {
        return self::rootDirectory() . self::DATABASE_DIRECTORY;
    }
}