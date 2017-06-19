# Virp
A port of the js framework virgilio to php


## Why
I personally find the namespacing in php to be awefully lacking coming from nodejs+virgilio.

So this framework tries to eliviate that pain by being able to create namespaces
and define functions on them

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
