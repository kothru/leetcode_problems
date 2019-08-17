class Solution {

/**
 * @param Integer $x
 * @return Boolean
 */
function isPalindrome($x) {
    $str = (string)$x;
    $len = strlen($str);
    if ($len <= 1) {
        return true;
    }
    $sub1 = "";
    $sub2 = "";
    if ($len % 2 == 0) {
        $halfLen = $len/2;
        $sub1 = substr($str, 0, $halfLen);
        $sub2 = substr($str, $halfLen);
    } else {
        $halfLen = floor($len/2);
        $sub1 = substr($str, 0, $halfLen);
        $sub2 = substr($str, $halfLen+1);
    }
    return strcmp($sub1, strrev($sub2)) == 0;
}
}