<?php

// public class A {
//     static {
//         System.out.println("A static");
//     }
//     B b = new B();
//     {
//         System.out.println("A not static");
//     }
//     A(){
//         System.out.println("A constructor");
//     }
//     public static void main(String[] args) {
//         System.out.println("Hello World!");
//         A m = new A();
//     }
// }

// class B{
//     static {
//         System.out.println("B static");
//     }
//     {
//         System.out.println("B not static");
//     }
//     B(){
//         System.out.println("B constructor");
//     }
// }

// 测试类的继承

class Action
{
    public function __construct()
    {
       echo '<br/>hello Action';
    }
    public function A1()
    {
       echo '<br/>hello A1';
    }
}


class Bction extends Action
{
    // public function __construct()
    // {
    //         echo 'hello Bction';
    // }
    public function B1()
    {
       echo '<br/>hello B1';
    }
}


$A = new Bction();
$A-> B1();

?>