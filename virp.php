<?php

final class virp {
    /*  this array contains all namespaces defined
        by keeping track of them here, the main instance
        can distribute them across files
    */
    public static $namespaces = [];
    /*  keeps track of the current instance */
    private static $instActive = null;
    /*
        function for instantiating a new instance of virp
        if an instance is already active, we wont allow another
        as we adhere to the singleton principle
    */
    public static function init() {
        if(self::$instActive === null) {
            self::$instActive = true;
            return new virp();
        }
    }

    private function __construct() {}
    /*
        function that returns a new namespace if the
        argument @namespaceName doen not exist in the
        @namespaces array
        If it does exist in the array, that namespace
        will be returned
    */
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
    /*  keeps track of the current db connection */
    private static $conn = null;

    public function __construct($namespaceName) {
        $this->name = $namespaceName;
    }

    public static function getName() {
        return self::$name;
    }

    public function __call($name, $args) {
        if (array_key_exists($name, $this->functions)) {
            $this->functions[$name]($args);
        } else {
            $this->functions[$name] = $args[0];
        }
    }

    public static function connect($servername, $unameEnv, $pwdEnv, $db) {
        if(self::$conn != null) {
            return;
        }
        self::$conn = mysqli_connect($servername, $_SERVER[$unameEnv], $_SERVER[$pwdEnv], $db);
        if(!self::$conn) {
            die();
        }
    }

    public static function exec($query) {
        if(!self::$conn) {
            return null;
        }
        $Qresult = mysqli_query(self::$conn, $query);

        return $Qresult;
    }

    public static function closeConn(): bool {
        return mysqli_close(self::$conn);
    }
}
