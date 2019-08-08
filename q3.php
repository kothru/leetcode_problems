class Solution {

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $length = strlen($s);
    if ($length <= 1) {
        return $length;
    }
    $arr = str_split($s);
    $cnt = count($arr);
    $uniArr = array_unique($arr);
    $uniCnt = count($uniArr);
    if ($cnt == $uniCnt){
        return $cnt;
    }
    if ($uniCnt == 1) {
        return 1;
    }
    
    $ret = 0;
    for ($i=$uniCnt;$i>1;$i--){
        $ret = $i;
        for ($j=0;$j<=($cnt-$i);$j++) {
            $sub = substr($s,$j,$i);
            $subArr = str_split($sub);
            $subCnt = count(array_unique($subArr));
            if ($i == $subCnt) {
                break 2;
            }
        }
    }
    
    return $ret;
}   
}