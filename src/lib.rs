// SPDX-FileCopyrightText: Copyright 2023 Heinz Wiesinger, Amsterdam, The Netherlands
// SPDX-License-Identifier: MIT

#![cfg_attr(windows, feature(abi_vectorcall))]
use ext_php_rs::prelude::*;
use ext_php_rs::types::{ZendHashTable, ZendObject, Zval};
use ext_php_rs::exception::PhpResult;
use json5;
use serde_json::Value;

fn convert(json5: Value, associative: bool) -> PhpResult<Zval>
{
    let mut zv = Zval::new();

    match json5 {
        Value::String(s) => {
            zv.set_string(&s, false).map_err(|_| "String value could not be mapped")?;
        },
        Value::Null => zv.set_null(),
        Value::Bool(b) => zv.set_bool(b),
        Value::Number(n) => {
            if n.is_f64() {
                zv.set_double(n.as_f64().unwrap());
            }
            else {
                zv.set_long(n.as_i64().unwrap());
            }
        },
        Value::Array(arr) => {
            let mut ht = ZendHashTable::with_capacity(
                arr.len().try_into().map_err(|_| "JSON5 array too big")?,
            );

            for val in arr.into_iter() {
                ht.push(convert(val, associative)).map_err(|_| "Array value could not be mapped")?;
            }
            zv.set_hashtable(ht);
        }
        Value::Object(_o) => {
            if associative {
                let mut ht = ZendHashTable::new();

                for (key, val) in _o {
                    ht.insert(&key, convert(val, associative)).map_err(|_| "Object value could not be mapped to associative array")?;
                }

                zv.set_hashtable(ht);
            }
            else {
                let mut obj = ZendObject::new_stdclass();

                for (key, val) in _o {
                    let _ = obj.set_property(&key, convert(val, associative));
                }

                zv.set_object(&mut obj);
            }
        }
    }

    return Ok(zv);
}

/// Decodes a JSON5 string
///
/// @param string    $json5       The JSON5 string being decoded.
/// @param bool|null $associative When <b>TRUE</b>, returned objects will be converted into associative arrays.
///
/// @return mixed The value encoded in JSON5 in appropriate PHP type. Values true, false and null (case-insensitive)
///               are returned as <b>TRUE</b>, <b>FALSE</b> and <b>NULL</b> respectively. <b>NULL<b> is returned if
///               the JSON5 cannot be decoded.
#[php_function]
pub fn json5_decode(json5: String, associative: Option<bool>) -> PhpResult<Zval> {
    let json5_val: Value = json5::from_str::<Value>(&json5).map_err(|_| "Syntax error")?;

    return convert(json5_val, associative.unwrap_or(false));
}

#[php_module]
pub fn get_module(module: ModuleBuilder) -> ModuleBuilder {
    module
}
