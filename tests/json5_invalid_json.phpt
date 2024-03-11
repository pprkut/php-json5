--TEST--
Test json5_decode() with invalid JSON
--FILE--
<?php

try {
  var_dump(json5_decode(""));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode("", 1));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode("", 0));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode(".", 1));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode(".", 0));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode("<?>"));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode(";"));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode("руссиш"));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode("blah"));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode('{ "": { "": "" }'));
} catch (Exception $e) {
  var_dump($e);
}

try {
  var_dump(json5_decode('{ "": "": "" } }'));
} catch (Exception $e) {
  var_dump($e);
}

?>
--EXPECTF--
object(Exception)#1 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(0) ""
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#2 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
      array(2) {
        [0]=>
        string(0) ""
        [1]=>
        int(1)
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#1 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
      array(2) {
        [0]=>
        string(0) ""
        [1]=>
        int(0)
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#2 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
      array(2) {
        [0]=>
        string(1) "."
        [1]=>
        int(1)
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#1 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
      array(2) {
        [0]=>
        string(1) "."
        [1]=>
        int(0)
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#2 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(3) "<?>"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#1 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(1) ";"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#2 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(12) "руссиш"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#1 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(4) "blah"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#2 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(16) "{ "": { "": "" }"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
object(Exception)#1 (7) {
  ["message":protected]=>
  string(12) "Syntax error"
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
        string(16) "{ "": "": "" } }"
      }
    }
  }
  ["previous":"Exception":private]=>
  NULL
}
