/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author chrisdewald
 */

import java.util.ArrayList;

public class Stack<T> {
    
    private ArrayList<T> stack;
    
    public Stack(){
        
        this.stack= new ArrayList<T>();
        
    }
    
    public boolean isEmpty(){
        
        return (this.stack.size()==0);
        
    }
    
    public int size(){
        
        return this.stack.size();
    }
    
    public void push(T element){
        
        this.stack.add(element);
    }
    
    public T  pop() throws IndexOutOfBoundsException {
        
        if (stack.isEmpty())
            throw new IndexOutOfBoundsException("Stack is Empty");
        
        return this.stack.remove(this.stack.size() - 1);
    }
    
    
}
