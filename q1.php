class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target): array {
    $length = count($nums);
    $ret = [];
    for($i = 0;$i < $length;$i++){
        for($j = $i+1;$j < $length;$j++){
            if ($nums[$i]+$nums[$j]==$target){
                $ret = [$i,$j];
                break 2;
            }
        }
    }
    return $ret;
}
}
