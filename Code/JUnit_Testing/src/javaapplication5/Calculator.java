/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication5;

/**
 *
 * @author x15015556
 */
public class Calculator {
    public static int CalcAdd(int num1, int num2) {
        return num1+num2;
    }
    
    public static int CalcMinus(int num1, int num2) {
        return num1-num2;
    }
    
    public static int CalcMul(int num1, int num2) {
        return num1*num2;
    }
    
    public static double CalcDiv(double num1, double num2) {
        if(num2 == 0.0){
            throw new IllegalArgumentException("Cannot divide by 0");
                
        }
        else
            return num1/num2;
    }
}
