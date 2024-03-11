--TEST--
json5_decode() tests
--FILE--
<?php

var_dump(json5_decode('{ "test": { "foo": "bar" } }'));
var_dump(json5_decode('{ "test": { "foo": "" } }'));
var_dump(json5_decode('{ "": { "foo": "" } }'));
var_dump(json5_decode('{ "": { "": "" } }'));

?>
--EXPECTF--
object(stdClass)#%d (1) {
  ["test"]=>
  object(stdClass)#%d (1) {
    ["foo"]=>
    string(3) "bar"
  }
}
object(stdClass)#%d (1) {
  ["test"]=>
  object(stdClass)#%d (1) {
    ["foo"]=>
    string(0) ""
  }
}
object(stdClass)#%d (1) {
  [""]=>
  object(stdClass)#%d (1) {
    ["foo"]=>
    string(0) ""
  }
}
object(stdClass)#%d (1) {
  [""]=>
  object(stdClass)#%d (1) {
    [""]=>
    string(0) ""
  }
}
