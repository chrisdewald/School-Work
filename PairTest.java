/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author chrisdewald
 */
public class PairTest{
    
    public static void main(String[] args){
        
        Pair< Integer, String > numberPair = 
                new Pair <Integer, String> (1,"One");
        
        System.out.println("Christopher DeWald - Assignment 7 - CSIS 312\n");
        
        System.out.printf("Original pair: < %d, %s >\n", 
                numberPair.getFirst(), numberPair.getSecond() );
        
        numberPair.setFirst(2);
        
        numberPair.setSecond("Second");
        
        System.out.printf("Modified pair: < %d, %s >\n",
             
                numberPair.getFirst(), numberPair.getSecond());
        
    }
    
}
