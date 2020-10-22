



// Christopher DeWald - CSIS 312 - Assignment 5


package com.mycompany.mavenproject5;

import java.util.*;

public class RandomInteger {
    
    public static void main(String [] args)
    {
        Random rand=new Random(100);
        
        LinkedList<Integer> list = new LinkedList<Integer>();
        
        for(int i=0;i<25;i++)
        {
            list.add(rand.nextInt(100));
        }
        
        System.out.println("Christopher DeWald - Assignment 5 - CSIS 312\n");
        
        
        System.out.println("Elements before sorting:\n");
        
        System.out.println(list);
        
        int sum;
        
        sum = 0;
        
        for (Integer n : list){
            
            sum = sum + n;
            
        }
        
        System.out.println("\nSum of the elements:\n");
        
        System.out.println(sum);
        
        float avg = 0;
        
        for (Integer n : list){
           
            avg = sum / n;
            
        }
        
        System.out.println("\nAverage of the elements:\n");
        
        System.out.println(avg);
        
    }
    
}
