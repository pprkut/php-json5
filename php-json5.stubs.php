<?php

// Stubs for php-json5

namespace {
    /**
     * Decodes a JSON5 string
     *
     * @param string    $json5       The JSON5 string being decoded.
     * @param bool|null $associative When <b>TRUE</b>, returned objects will be converted into associative arrays.
     *
     * @return mixed The value encoded in JSON5 in appropriate PHP type. Values true, false and null (case-insensitive)
     *               are returned as <b>TRUE</b>, <b>FALSE</b> and <b>NULL</b> respectively. <b>NULL<b> is returned if
     *               the JSON5 cannot be decoded.
     */
    function json5_decode(string $json5, ?bool $associative = null): mixed {}
}
