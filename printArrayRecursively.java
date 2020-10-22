


import java.util.Random;

public class printArrayRecursively {
    
    static int[] A = new int[100];
    
    public static void printArrayutil(int A[], int index){
        
        if (index == 0)
            return;
        
        printArrayutil(A, index - 1);
        
        System.out.print(A[index - 1] + " ");
    }
    
    public static void printArray(int A[]) {
        
        printArrayutil(A, A.length);
        
    }
    
    public static void main (String[] args){
        
        Random r = new Random();
        
        for (int i = 0; i < 100; i++)
            A[i] = r.nextInt(100) + 1;
        
        printArray(A);
    }
    
}
