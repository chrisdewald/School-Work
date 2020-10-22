/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.mavenproject1;

/**
 *
 * @author chrisdewald
 */
class PieceWorker extends Employee {
    
    //private instance variables wage and pieces
    
    private double wage;
    private int pieces;
    
    //constructor
    
public PieceWorker(String firstName, String lastName, String socialSecurityNumber, 
        double wagePerPiece, int numOfPieces){
    
    super(firstName, lastName, socialSecurityNumber);
    
    setWage(wagePerPiece);
    setPieces(numOfPieces);
}    

// set wage

public void setWage(double wagePerPiece)
{
    wage = wagePerPiece;
}


// set pieces

public void setPieces( int numOfPieces)
{
    pieces = numOfPieces;
}

// get wage

public double getWage()
{
    return wage;
}

// get pieces

public double getPieces()
{
    return pieces;
}

// calculate earnings; override abstract method earning in Employee

@Override

public double earnings()
{
    return wage*pieces;
}

@Override

public String toString()
{
    return String.format("piece worker: %s%n%s: $%,.2f, %s: $%,.2f",
            super.toString(), "number of pieces", getPieces(), 
            "wage per piece",getWage());
}

} // end class PieceWorker
