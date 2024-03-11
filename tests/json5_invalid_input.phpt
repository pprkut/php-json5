--TEST--
Test calling json5_decode() with NULL
--FILE--
<?php

try {
  var_dump(json5_decode(NULL));
} catch (Exception $e) {
  var_dump($e);
}

?>
--EXPECTF--
object(Exception)#1 (7) {
  ["message":protected]=>
  string(41) "Invalid value given for argument `json5`."
  ["string":"Exception":private]=>
  string(0) ""
  ["code":protected]=>
  int(0)
  ["file":protected]=>
  string(%d) "%s"
  ["line":protected]=>
  int(%d)
  ["trace":"Exception":private]=>
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
  ["previous":"Exception":private]=>
  NULL
}
