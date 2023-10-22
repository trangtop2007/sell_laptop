/**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */
/**
 * @param {ListNode} l1
 * @param {ListNode} l2
 * @return {ListNode}
 */
var addTwoNumbers = function(l1, l2) {
    var ln1=[]
    var ln2=[]
    for(let i=0;i<l1.length;i++){
        ln1.unshift(l1[i])
    }
    for(let i=0;i<l2.length;i++){
        ln2.unshift(l2[i])
    }
    var arr=String(Number(ln1.join(""))+Number(ln2.join(""))).split("").map((item)=>Number(item))
    var result=[]
    for(let i=0;i<arr.length;i++){
        result.unshift(arr[i])
    }
    return result
};
console.log( addTwoNumbers([9,9,9,9,9,9,9],[9,9,9,9]))
