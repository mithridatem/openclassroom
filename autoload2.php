<?php
    $file = "./class.json";
    $json = file_get_contents($file);
    $liste = json_decode($json);
    if(file_exists($json)){
        foreach ($liste->class as $value) {
            if(file_exists($value->path)){
                require_once($value->path);
            }
        }
    }