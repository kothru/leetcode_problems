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
        $length = count($arr1);
        if ($length === 1){
            $sum = $l1->val + $l2->val;
            if($sum>=10){
                $lowerNode = new ListNode($sum % 10);
                $upperNode = new ListNode(1);
                $lowerNode->next = $upperNode;
                return $lowerNode;
            }else{
                return new ListNode($sum);
            }
        }
        
        $adv = 0;
        for($i=0;$i<$length;$i++){
            $sum = $arr1[$i] + $arr2[$i] + $adv;
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
