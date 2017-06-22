# Virp
A port of the js framework virgilio to php


## Why
I personally find the namespacing in php to be awefully lacking coming from nodejs+virgilio.

So this framework tries to eliviate that pain by being able to create namespaces
and define functions on them

## How does it help ?
You all know the hell of having to import a lot
of files to use the functions in them.

This is what Virp tries to eliviate by having you define all functions on virpSpaces which Virp keeps track of internally.

This makes it possible to only have to import one file and haveaccess to all namespaces and functions in other files

## A short example

**file A.php**

```php
  include "../virp/index.php";
  
  $app = virp::getInstance();
  
  $myNamespace = $app::virpspace("myNamespace");
  
  $myNamespace->((function($a) {
    printf("%s", $a[0]);
  }));
 ```

**file B.php**

```php
  include "../virp/index.php";
  
  $myNamespace = $app::virpspace("myNamespace");
  
  $myNamespace->doSomething("Hello, Virp!");
``
