/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $arr1 = $this->reader($l1,array());        
        $arr2 = $this->reader($l2,array());

        $ret = array();
        $length1 = count($arr1);
        $length2 = count($arr2);        
        
        $length = $length1 > $length2 ? $length1 : $length2;
        
        $adv = 0;
        for($i=0;$i<$length;$i++){
            $val1 = (isset($arr1[$i]) ? $arr1[$i] : 0);
            $val2 = (isset($arr2[$i]) ? $arr2[$i] : 0);                
            $sum = $val1 + $val2 + $adv;
            if ($sum>=10){
                $mod = $sum % 10;
                $ret[] = $mod;
                $adv = ($sum - $mod) / 10;
            }else{
                $ret[] = $sum;
                $adv = 0;
            }
        }
        if($adv>0){
            $ret[]=$adv;
        }
        $ret = array_reverse($ret);
        $node = new ListNode($ret[0]);
        if (count($ret) == 1) {
            return $node;
        }
        return $this->writer($ret,$node,1);
    }
    
    function reader($node,$ret){
        $ret[] = $node->val;
        if ($node->next === null){
            return $ret;
        }
        return $this->reader($node->next,$ret);
    }
    function writer($arr,$node,$index){
        if($index>=count($arr)){
            return $node;
        }
        $newNode = new ListNode($arr[$index]);
        $newNode->next = $node;
        return $this->writer($arr,$newNode,$index+1);
    }
}