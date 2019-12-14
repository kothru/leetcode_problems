class Solution {

/**
 * @param Integer $n
 * @return String[][]
 */
function solveNQueens($n) {
    if ($n == 1) {
        return [
            ["Q"]
        ];
    } else if ($n == 2) {
        return [
            ["Q.",
            ".Q"],
            [".Q",
            "Q."]
        ];
    } else {
        $base = $this->createBaseArray($n); // create identity matrix
        $ans = $this->getAnswerArray($base, $n);
        $ret = $this->convertResultArray($ans);
        $revRet = $this->reverseArray($ret);
        return [$ret,$revRet];
    }
    
}

function createBaseArray($n) {
    $ret = [];
    $cons = str_repeat("0", $n);
    for ($i=0;$i<$n;$i++) {            
        $ret[] = str_split($cons);
        $ret[$i][$i] = 1;
    }
}

function getAnswerArray($base, $n) {
    $cnt = 0;
    $numbers = range(0, $n-1);
    while($cnt < 100) {
        shuffle($numbers);
        $arr = [];
        foreach ($numbers as $num) {
            $arr[] = $base[$num];
        }
        if($this->evalSolution($arr, $n)) {
            return $arr;
        }
        $cnt += 1;
    }
    return $base;
}

function evalSolution($arr, $n) {
    for ($i=0;$i<$n;$i++) {
        $index = $i;
        $sum = 0;
        for ($j=0;$j<$n;$j++) {
            $sum = $sum + $arr[$index][$j];
            if ($sum == 2){
                return false;
            }
            $index += 1;
            if ($index >= $n) {
                break;
            }
        }
    }
    
    for ($i=0;$i<$n;$i++) {
        $index = $i;
        $sum = 0;
        for ($j=$n-1;$j>=0;$j--) {
            $sum = $sum + $arr[$index][$j];
            if ($sum == 2){
                return false;
            }
            $index += 1;
            if ($index >= $n) {
                break;
            }
        }
    }        
    
    return true;
}




function convertResultArray($ret) {
    $ret2 = [];
    $search = ["0","1"];
    $replace = [".","Q"];
    foreach ($ret as $row) {
        $ret2[] = str_replace($search,$replace,implode($row));
    }
    return $ret2;
}    

function reverseArray($arr) {
    $cnt = count($arr);
    $ret = [];
    for ($i=0;$i<$cnt;$i++) {
        $ret[] = strrev($arr[$i]);
    }
    return $ret;
}
}