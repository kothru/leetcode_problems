class Solution {

/**
 * @param Integer $x
 * @return Integer
 */
function reverse($x) {
    if ($x == 0) {
        return 0;
    }
    $tgt = $x;
    if ($x < 0) {
        $tgt *= -1;
    }
    $str = (string)$tgt;
    $arr = str_split($str);
    $arr = array_reverse($arr);
    $ret = implode($arr);
    $ret = ltrim($ret, "0");
    if ($x < 0) {
        $ret *= -1;
    }
    if (-pow(2,31) > $ret || (pow(2,31) - 1) < $ret) {
        return 0;
    }
    return $ret;
}
}