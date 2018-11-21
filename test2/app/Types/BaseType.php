<?php

namespace App\Types;

use App\Rules\BaseRule;

abstract class BaseType
{
    abstract public function getFieldsAndRules();

    public function validateFields($data)
    {
        $data = $this->removeEmptyCells($data);
        return $this->keysAreEqual($this->getFieldsAndRules(), array_flip($this->getHeaderRaw($data[0])));
    }

    public function validateData($data)
    {
        $rules = $this->getFieldsAndRules();
        $header = $this->getHeaderRaw($data[0]);
        $index = 1;
        $errors = [];
        while ($index < sizeof($data)) {
            $row = $index + 1;
            foreach ($data[$index] as $key => $field) {
                if (isset($header[$key])) {
                    if (isset($rules[$header[$key]])) {
                        $rule = $rules[$header[$key]];
                        if ($rule instanceof BaseRule) {
                            $error = $rule->validate($field, $header[$key]);
                            if ($error != null) {
                                $errors[$row][] = $error;
                            }
                        }
                    }
                }
            }
            if (isset($errors[$row])) {
                $errors[$row] = implode(',', $errors[$row]);
            }
            $index++;
        }
        return empty($errors) ? null : $errors;
    }

    function keysAreEqual($array1, $array2)
    {
        return !array_diff_key($array1, $array2) && !array_diff_key($array2, $array1);
    }

    function getHeaderRaw($data)
    {
        $header = [];
        foreach ($data as $field) {
            $header[] = strtolower(str_replace(str_split('*#'), '', $field));
        }
        return $header;
    }

    private function removeEmptyCells($data)
    {
        foreach ($data as $rowKey => $row) {
            foreach ($row as $fieldKey => $field) {
                if ($field == null) {
                    unset($data[$rowKey][$fieldKey]);
                }
            }
            if (empty($data[$rowKey])) {
                unset($data[$rowKey]);
            }
        }

        return $data;
    }

}