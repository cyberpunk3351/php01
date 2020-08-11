<?php

    /*
    target - одномерный массив 
    fields - список строк
    */
    function extractFields(array $target, array $fields) : array {
        $res = [];

        foreach($fields as $field){
            $res[$field] = trim($target[$field]);
        }
        return $res;
    }
?>