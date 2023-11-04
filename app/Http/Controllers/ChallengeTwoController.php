<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeTwoController extends Controller
{
    function findDuplicates($arr) {
        $n = count($arr);
        $result = [];
    
        for ($i = 0; $i < $n; $i++) {
            $element = abs($arr[$i]);
    
            if ($arr[$element] > 0) {
                $arr[$element] = -$arr[$element];
            } else {
                $result[] = $element;
            }
        }
    
        return $result;
    }
    
    $arr = [2, 3, 1, 2, 3];
    $duplicates = findDuplicates($arr);
    print_r($duplicates);      
}
