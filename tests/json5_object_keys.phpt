--TEST--
Test json5_decode() preserves key order and maps numeric keys like json_decode()
--FILE--
<?php
$json = '{"b":1,"a":2,"10":3,"-5":4,"01":5,"-0":6,"9223372036854775808":7,"c":{"z":8,"y":9},"b":10}';

var_dump(json5_decode($json));
var_dump(json5_decode($json, true));
var_dump(json5_decode($json, true) === json_decode($json, true));

?>
--EXPECTF--
object(stdClass)#%d (8) {
  ["b"]=>
  int(10)
  ["a"]=>
  int(2)
  ["10"]=>
  int(3)
  ["-5"]=>
  int(4)
  ["01"]=>
  int(5)
  ["-0"]=>
  int(6)
  ["9223372036854775808"]=>
  int(7)
  ["c"]=>
  object(stdClass)#%d (2) {
    ["z"]=>
    int(8)
    ["y"]=>
    int(9)
  }
}
array(8) {
  ["b"]=>
  int(10)
  ["a"]=>
  int(2)
  [10]=>
  int(3)
  [-5]=>
  int(4)
  ["01"]=>
  int(5)
  ["-0"]=>
  int(6)
  ["9223372036854775808"]=>
  int(7)
  ["c"]=>
  array(2) {
    ["z"]=>
    int(8)
    ["y"]=>
    int(9)
  }
}
bool(true)
