class Solution {

/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Float
 */
function findMedianSortedArrays($nums1, $nums2) {
    $cnt1 = count($nums1);
    if ($cnt1 == 0) {
        return $this->arrayMedian($nums2);
    }
    $cnt2 = count($nums2);
    if ($cnt2 == 0) {
        return $this->arrayMedian($nums1);
    }        
    $sumCnt = ($cnt1 + $cnt2);
    if ($sumCnt == 2) {
        return ($nums1[0] + $nums2[0]) / 2;
    }
    $medCnt = $sumCnt / 2;
    $divFlg = is_int($medCnt);
    if ($divFlg) {
        $medCnt = $medCnt;
    } else {
        $medCnt = ceil($medCnt);
    }
    
    $cnt = 0;
    $j = 0;
    $before = 0;
    $i = 0;
    while($i<$cnt1) {
        if ($cnt == $medCnt) {
            if ($divFlg) {
                if ($j >= $cnt2) {
                    return ($before + $nums1[$i]) / 2;
                } else {
                    $after = $nums1[$i] > $nums2[$j] ? $nums2[$j] : $nums1[$i];
                    return ($before + $after) / 2;
                }
            } else {
                return $before;
            }
        }
        if ($j >= $cnt2) {
            break;
        }
        $cnt++;
        if ($nums1[$i] > $nums2[$j]) {
            $before = $nums2[$j];
            $j++;
            $i--;
        } else {
            $before = $nums1[$i];
        }
        $i++; 
    }
    
    if ($j >= $cnt2) {
        // num2 is over
        if ($cnt == $medCnt) {
            if ($divFlg) {
                return ($before + $nums1[$i]) / 2;
            } else {
                return $before;
            }                
        } else {
            $leftCnt = $medCnt - $cnt;
            $before = $nums1[$i + $leftCnt - 1];
            if ($divFlg) {
                return ($before + $nums1[$i + $leftCnt]) / 2;
            } else {
                return $before;
            }                   
        }
    } else {
        // num1 is over
        if ($cnt == $medCnt) {
            if ($divFlg) {
                return ($before + $nums2[$j]) / 2;
            } else {
                return $before;
            }  
        } else {
            $leftCnt = $medCnt - $cnt;
            $before = $nums2[$j + $leftCnt - 1];
            if ($divFlg) {
                return ($before + $nums2[$j + $leftCnt]) / 2;
            } else {
                return $before;
            }
        }
    }
}

function arrayMedian($array){
    $cnt = count($array);
    if ($cnt == 1) {
        return $array[0];
    }
    $medCnt = $cnt / 2;
    if (is_int($medCnt)) {
        return ($array[$medCnt - 1] + $array[$medCnt]) / 2;
    } else {
        return $array[floor($medCnt)];
    }
}

}