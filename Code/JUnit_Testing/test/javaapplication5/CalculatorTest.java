/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication5;

import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author x15015556
 */
public class CalculatorTest {
    
    public CalculatorTest() {
    }
    
    @BeforeClass
    public static void setUpClass() {
    }
    
    @AfterClass
    public static void tearDownClass() {
    }
    
    @Before
    public void setUp() {
    }
    
    @After
    public void tearDown() {
    }

    /**
     * Test of CalcAdd method, of class Calculator.
     */
    @Test
    public void testCalcAdd() {
        System.out.println("CalcAdd");
        int num1 = 0;
        int num2 = 0;
        int expResult = 0;
        int result = Calculator.CalcAdd(num1, num2);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of CalcMinus method, of class Calculator.
     */
    @Test
    public void testCalcMinus() {
        System.out.println("CalcMinus");
        int num1 = 0;
        int num2 = 0;
        int expResult = 0;
        int result = Calculator.CalcMinus(num1, num2);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of CalcMul method, of class Calculator.
     */
    @Test
    public void testCalcMul() {
        System.out.println("CalcMul");
        int num1 = 0;
        int num2 = 0;
        int expResult = 0;
        int result = Calculator.CalcMul(num1, num2);
        assertEquals(expResult, result);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }

    /**
     * Test of CalcDiv method, of class Calculator.
     */
    @Test
    public void testCalcDiv() {
        System.out.println("CalcDiv");
        double num1 = 2.0;
        double num2 = 1.0;
        double expResult = 2.0;
        double result = Calculator.CalcDiv(num1, num2);
        assertEquals(expResult, result, 0.0);
        // TODO review the generated test code and remove the default call to fail.
        //fail("The test case is a prototype.");
    }
        
    @Test(expected = IllegalArgumentException.class)
    public void testDivExc() {
        System.out.println("divExc");
        double num1 = 1.0;
        double num2 = 0.0;
        System.out.println("Dividing by 0: " + Calculator.CalcDiv(num1, num2));
    }
}
