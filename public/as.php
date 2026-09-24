<?php


$name = "assel";
$num=45;
$t=false;
$array=["12"];
var_dump($array);
echo"\n".($name );


$yes=true;
if($yes){

echo"\n".("حلو ");
}else{
    echo("مو حلو");
}
$sc=100;
if($sc>90 && $sc <=100){
echo"\n". "a+";

}elseif($sc>=80){
    echo "b";
}else{
    echo "f";
}

function calc($num1,$num2,$oprator){
    switch($oprator){
     case '+':
     return $num1+$num2;
     break;
     case '-':
        return $num1-$num2;
        break;
        case '*':
            return $num1*$num2;
            break;
            case '/':
                return $num1/$num2;
                break;
                default:
                return "invalid oprator";

    }
}
echo "\n".calc(10,2,'+');

$names=["aseel","nouf","lolo","jojo"];
echo "\n".$names[2];

$namess=["name1"=>"aseel","age"=>21,"name2"=>"nouf","lolo","jojo"];
echo "\n".$namess["name1"];
echo"\n". $namess["age"];