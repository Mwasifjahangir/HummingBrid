<?php

namespace opera\bytecode;

class Registry {

    private $register = array();
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Registry;
        }

        return self::$instance;
    }

    public function __set($key, $val) {
        $this->register[$key] = $val;
    }

    public function __get($key) {
        if (isset($this->register[$key])) {
            return $this->register[$key];
        } else {
            return null;
        }
    }

}
