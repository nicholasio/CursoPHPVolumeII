<?php


class Event {
    protected static $callbacks = [];

    public static function registerCallback($eventName, $callback) {
        if ( !is_callable($callback) ) {
            throw new Exception("Callback inválida");
        }

        $eventName = strtolower($eventName);

        self::$callbacks[$eventName][] = $callback;

    }

    public static function trigger($eventName, $data = null) {
        $eventName = strtolower($eventName);
        if ( isset(self::$callbacks[$eventName]) ) {
            foreach(self::$callbacks[$eventName] as $callback) {
                $callback($data);
            }
        }
    }
}