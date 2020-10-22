/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author chrisdewald
 */
public class Pair< F,S > {
    
    private F first;
    
    private S second;
    
    public Pair(F firstElement, S secondElement)
    {
        
        first = firstElement;
        
        second = secondElement;
        
    }
    
    public F getFirst()
    {
        
        return first;
        
    }
    
    public S getSecond()
    {
        
        return second;
        
    }
    
    public void setFirst( F firstElement)
    {
        
        first = firstElement;
        
    }
    
    public void setSecond( S secondElement){
        
        second = secondElement;
    }
}