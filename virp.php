<?php

final class virp {
    public static $namespaces = [];
    public static function getInstance() {
        $inst = null;
        if($inst === null) {
            $inst = new virp();
        }
    }

    private function __construct() {}

    public static function virpSpace($namespaceName) {
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

class virpSpace {
    public $functions = [];
    public $name;

    public function __construct($namespaceName) {
        $this->name = $namespaceName;
    }
}