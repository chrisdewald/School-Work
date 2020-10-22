/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author chrisdewald
 */
import java.util.*;

public class Word {
    
    private Random rand;
    private String[] article;
    private String[] noun;
    private String[] verb;
    private String[] preposition;
    
    public Word()
    {
        rand = new Random();
        
        article = new String[]{"the","a","one","some","any"};
        noun = new String[]{"boy","girl","dog","town","car"};
        verb = new String[]{"drove","jumped","ran", "walked","skipped"};
        preposition = new String[]{"to","from","over","under","on"};
    }
    
    public String getArticle()
    {
        int r = rand.nextInt(5);
        
        return article[r];
    }
    
    public String getNoun()
    {
        int r = rand.nextInt(5);
        
        return noun[r];
    }
    
    public String getVerb()
    {
        int r = rand.nextInt(5);
        
        return verb[r];
    }
    
    public String getPreposition()
    {
        int r = rand.nextInt(5);
        
        return preposition[r];
        
    }
    
}

class Sentence
{
    private Word wordObj;
    
    public Sentence()
    {
        wordObj = new Word();
    }
    
    public String getSentence()
    {
        String str = wordObj.getArticle()+" "+wordObj.getNoun()+" "+wordObj.getVerb()+" "+
                wordObj.getPreposition()+" "+wordObj.getArticle()+" "+wordObj.getNoun();
        
        str = str.substring(0,1).toUpperCase()+str.substring(1)+".";
        
        return str;
      
    }
}

class SentenceBuild
{
    public static void main(String args[])
    {
        
        System.out.println("Christopher DeWald - Assignment 4 - CSIS 312");
        
        Sentence sentenceObj;
        
        for(int i=1; i<=20; i++)
        {
         
            sentenceObj = new Sentence();
            
            System.out.println(sentenceObj.getSentence());
            
        }
    }
}
