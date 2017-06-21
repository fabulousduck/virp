<?php

final class virp {
    public static $namespaces = [];
    private static $instActive = null;
    public static function getInstance() {
        if(self::$instActive === null) {
            self::$instActive = true;
            return new virp();
        }
    }

    private function __construct() {}

    public static function virpspace($namespaceName) {
        if(!self::namespaceExists($namespaceName)) {
            $newNamespace = new virpSpace($namespaceName);
            array_push(self::$namespaces, $newNamespace);
            return $newNamespace;
        } else {
            return self::getNamespace($namespaceName);
        }
    }

    public static function namespaceExists($namespaceName) {
        for($i = 0; $i < count(self::$namespaces); $i++) {
            if(self::$namespaces[$i]->name === $namespaceName) {
                return true;
            }
        }
        return false;
    }

    protected static function getNamespace($namespaceName) {
        for($i = 0; $i < count(self::$namespaces); $i++) {
            if(self::$namespaces[$i]->name === $namespaceName) {
                return self::$namespaces[$i];
            }
        }
    }
}

class virpspace {
    public $functions = [];
    public $name;

    public function __construct($namespaceName) {
        $this->name = $namespaceName;
    }

    public function __call($name, $args) {
        if (array_key_exists($name, $this->functions)) {
            $this->functions[$name]($args);
        } else {
            $this->functions[$name] = $args[0];
        }
    }
}