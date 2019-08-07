class Solution {

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $length = strlen($s);
    $ret = 0;
    for($i=0;$i<$length;$i++){
        $len = $this->lengthOfSubstring(substr($s,$i));
        if($len > $ret){
            $ret = $len;
        }   
    }
    return $ret;
}

function lengthOfSubstring($s) {
    $arr = str_split($s);
    $dummy = array();
    $cnt = 0;
    foreach($arr as $char){
        $idx = ord($char);
        if(isset($dummy[$idx])){
            break;
        }
        $dummy[$idx] = 1;
        $cnt += 1;
    }
    return $cnt;
}

}
