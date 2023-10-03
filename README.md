# php-json5

Use rust to implement a JSON5 parser for PHP.

## Building

```sh
$ cargo build --release
```

This will create a libphp_json5 library in `target/release/`. You can use it from there or move it to the directory containing your other PHP extensions.

## PHP

```php
<?php

$json5 = <<<END
[
    // Just a list of values
    "string",
    1,
    10.13,
    true,
    null,
    // And now an object
    {
        value: 1,
    },
]
END;

var_dump(json5_decode($json5));
```

will output:

```
array(6) {
  [0] =>
  string(6) "string"
  [1] =>
  int(1)
  [2] =>
  double(10.13)
  [3] =>
  bool(true)
  [4] =>
  NULL
  [5] =>
  class stdClass#1 (1) {
    public $value =>
    int(1)
  }
}
```
