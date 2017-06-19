# Virp
A port of the js framework virgilio to php


## Why
I personally find the namespacing in php to be awefully lacking coming from nodejs+virgilio.

So this framework tries to eliviate that pain by being able to create namespaces
and define functions on them

## How does it help ?
You all know the hell of having to import a lot
of files to use the functions in them.

This is what Virp tries to eliviate by having you define

all functions on virpSpaces which Virp keeps track of internally.


This makes it possible to only have to import one file and have

access to all namespaces and functions in other files

## A short example

```php
  include "../virp/index.php";
  
  $app = virp::getInstance();
  
  $myNamespace = $app::virpSpace("myNamespace");
  
  $myNamespace->defineAction(function doSomething($a) {
    printf("%s", a);
  });
  
  $myNamespace->doSomething("Hello, Virp!");
```
