class Solution {

/**
 * @param String $s
 * @return Integer
 */
function romanToInt($s) {
    $arr = str_split($s);
    $intArr = [];
    foreach ($arr as $char) {
        $intArr[] = $this->convInt($char);
    }
    $total = 0;
    $cnt = count($intArr);
    for ($i=0;$i<$cnt;$i++) {
        if ($i == $cnt - 1) {
            $total += $intArr[$i];
            break;
        }
        if ($intArr[$i] < $intArr[$i+1]) {
            $total -= $intArr[$i];
            continue;
        }
        $total += $intArr[$i];
    }
    return $total;
}

function convInt($char)
{
    switch($char){
        case 'I':
            return 1;
        case 'V':
            return 5;
        case 'X':
            return 10;
        case 'L':
            return 50;
        case 'C':
            return 100;
        case 'D':
            return 500;
        case 'M':
            return 1000;
        default:
            return 0;
    }
}
}