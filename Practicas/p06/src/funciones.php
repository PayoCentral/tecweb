<?php
function esMultiplo($num){
    $num = $_GET['numero'];
    if ($num%5==0 && $num%7==0)
    {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
    }
    else
    {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
    }
}

function _3numeros(){
    $digits = 3;
    $num1 = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $num2 = rand(pow(10, $digits-1), pow(10, $digits)-1);
    $num3 = rand(pow(10, $digits-1), pow(10, $digits)-1);
    while($num1%2==0 || $num2%2!=0 || $num3%2==0)
    {
        $num1 = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $num2 = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $num3 = rand(pow(10, $digits-1), pow(10, $digits)-1);
        echo '<h3>'.$num1.', '.$num2.', '.$num3.'</h3>';
    }
    //echo '<h3>Los números son: '.$num1.', '.$num2.', '.$num3.'</h3>';
}
?>