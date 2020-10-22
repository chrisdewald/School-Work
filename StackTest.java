/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author chrisdewald
 */
public class StackTest {
    
    
    public static void main(String[] args){
        
        System.out.println("Christopher DeWald - Assignment 8 - CSIS 312");
        
        Stack<String> stringStack = new Stack<String>();
        
        System.out.println("The size of the String stack is " + stringStack.size());
        System.out.println("Pushing onto String Stack \"This is a Test\"");
        stringStack.push("This");
        stringStack.push("is");
        stringStack.push("a");
        stringStack.push("Test");
        System.out.println("The size of the String stack is " + stringStack.size());
        System.out.println("the String stack is empty (T/F):" + (stringStack.isEmpty() ? "True" : "False"));
        System.out.println("Popping elements off of the String stack");
        try{
            while(!stringStack.isEmpty())
                System.out.println(stringStack.pop() + " ");
        } catch (IndexOutOfBoundsException iobe) {
            System.out.println(iobe.getMessage());
        }
        
        System.out.println();
        System.out.println("the String stack is empty(T/F):"
                + (stringStack.isEmpty() ? "True" : "False"));
        System.out.println(("The size of the String stack is " + stringStack.size()));
        System.out.println();
        
        
        Stack<Integer> intStack = new Stack<Integer>();
        
        System.out.println("The size of the Integer stack is " + intStack.size());
        System.out.println("Pushing onto Integer stack \"1 2 3 4\"");
        intStack.push(1);
        intStack.push(2);
        intStack.push(3);
        intStack.push(4);
        System.out.println("The size of the integer stack is " + intStack.size());
        System.out.println("The Integer stack is empty (T/F):" + (intStack.isEmpty() ? "True" : "False"));
        System.out.println("Popping elements off of the Integer stack");
        
        try {
            while(!intStack.isEmpty())
                System.out.print(intStack.pop() + " ");
        }
        catch (IndexOutOfBoundsException iobe){
            System.out.println(iobe.getMessage());
        }
        
        System.out.println();
        System.out.println("The Integer stack is empty(T/F):" + (intStack.isEmpty()? "True" : "False"));
        System.out.println("The size of the Integer Stack is " + intStack.size());
        
        System.out.println("\nDemonstrating popping from an empty stack");
        try{
            System.out.print(intStack.pop() + " ");
        }
        catch (IndexOutOfBoundsException iobe){
            
            System.out.println(iobe.getMessage());
        }
        
    }
    
    
    
}
