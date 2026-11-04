--TEST--
Test calling json5_decode() with NULL
--FILE--
<?php

try {
  var_dump(json5_decode(NULL));
} catch (TypeError $e) {
  var_dump($e);
}

?>
--EXPECTF--
object(TypeError)#1 (7) {
  ["message":protected]=>
  string(41) "Invalid value given for argument `json5`."
  ["string":"Error":private]=>
  string(0) ""
  ["code":protected]=>
  int(0)
  ["file":protected]=>
  string(%d) "%s"
  ["line":protected]=>
  int(%d)
  ["trace":"Error":private]=>
  array(1) {
    [0]=>
    array(4) {
      ["file"]=>
      string(%d) "%s"
      ["line"]=>
      int(%d)
      ["function"]=>
      string(12) "json5_decode"
      ["args"]=>
      array(1) {
        [0]=>
        NULL
      }
    }
  }
  ["previous":"Error":private]=>
  NULL
}
