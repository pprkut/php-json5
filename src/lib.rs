// SPDX-FileCopyrightText: Copyright 2023 Heinz Wiesinger, Amsterdam, The Netherlands
// SPDX-License-Identifier: MIT

#![cfg_attr(windows, feature(abi_vectorcall))]
use ext_php_rs::prelude::*;
use ext_php_rs::types::{ZendHashTable, ZendObject, Zval};
use json5;
use serde_json::Value;

fn convert(json5: Value) -> Zval
{
    let mut zv = Zval::new();

    match json5 {
        Value::String(s) => {
            zv.set_string(&s, false).unwrap();
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
                arr.len().try_into().unwrap(),
            );

            for val in arr.into_iter() {
                ht.push(convert(val)).unwrap();
            }
            zv.set_hashtable(ht);
        }
        Value::Object(_o) => {
            let mut obj = ZendObject::new_stdclass();

            for (key, val) in _o {
                let _ = obj.set_property(&key, convert(val));
            }

            zv.set_object(&mut obj);
        }
    }

    return zv;
}

/// Parses and returns a hash-map array of JSON5 to PHP
///
/// @param string $source JSON5 source file
///
/// @return array parsed JSON5
#[php_function]
pub fn json5_decode(json5: String) -> Zval {
    let json5_val: Value = json5::from_str::<Value>(&json5).unwrap();

    return convert(json5_val);
}

#[php_module]
pub fn get_module(module: ModuleBuilder) -> ModuleBuilder {
    module
}
