# Virp
A port of the js framework virgilio to php


## Why
In my view, PHP does not have a greate ecosystem for dealing with
linear project scalability, and neither did JS.
This framework aims to provide linear scalability for PHP projects.

## How does it help ?
The main goal of this framework is foremostly to prevent having to import
a lot of different files to access their functionality.
Virp tries to eliviate this  by having you define all functions on virpSpaces which Virp keeps track of internally.
This makes it possible to only have to import one file and haveaccess to all namespaces and functions in other files.

## A short example

**file A.php**

```php
  include "../virp/index.php";
  
  $app = virp::init();
  
  $myNamespace = $app::virpspace("myNamespace");
  
  $myNamespace->doSomething((function($a) {
    printf("%s%s", $a[0], $a[1]);
  }));
 ```

**file B.php**

```php
  include "../virp/index.php";
  
  $myNamespace = $app::virpspace("myNamespace");
  $myNamespace->doSomething(["Hello, ", "Virp !"]);
```

## functions
Virp contains relatively little functions, but it does not need many to be effective.
In fact, the core of Virp is only about 100 lines long !

### ```virp::init()```
Inits a new instance of virp.

The virp object is a singleton, this way one instance can govern your entire app.

### ```virp::virpSpace(name:string)```
Defines or calls a namespace with the name given.
If a namespace with the given name does not exist, one will be made.

 ## database

 Virpspaces have inbuilt functions for dealing with databse connections.
 It has these to enforce the principle of having namespaces only dealing with one database at the time.

 ### ```virp::connect(servername:string, unameEnv:string, pwdEnv:string, db:string)```
