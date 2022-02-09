<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<title>PHP課題5</title>
</head>
<body>
<?php

//関数課題１
//"第一引数と第二引数の値で、足し算、引き算、掛け算、割り算、剰余のそれぞれ計算を行って、結果を返す各関数作成し、呼び出そう。
//ただし、関数は別のphpファイルに書き、呼び出す時は、includeで関数定義を読み込もう。また、各関数名は処理に合った名前を付ける事。
//また、関数内の処理で、計算結果は、第一引数に上書き保存し、その第一引数を結果として返すようにしよう。"
$a=10;
$b=5;
print '第一引数:'.$a.'第二引数:'.$b.'<br />';
print '<br />';

include('php_kadai5_function.php');

$sum=puls($a,$b);
print '足し算:';
print $sum;
print '<br />';

$difference=difference($a,$b);
print '引き算:';
print $difference;
print '<br />';

$product=product($a,$b);
print '掛け算:';
print $product;
print '<br />';

$quotient=quotient($a,$b);
print '割り算:';
print $quotient;
print '<br />';

$modulus=modulus($a,$b);
print '余剰:';
print $modulus;
print '<br />';

print '<br />';


//関数課題２
//"関数課題１の関数をコピーして、引数を参照渡しにした関数を作り、呼び出そう。
//作った参照渡しの各関数を呼び出す時は、常に第一引数を変数aに。第二引数を変数bにしよう。
//その上で、事前に変数aとbには、好きな数値を入れて、その値がどうなるか予測しながら、実際の値をプログラムを書いて、検証しよう。"
$a=100;
$b=26;
print '第一引数:'.$a.'第二引数:'.$b.'<br />';
print '<br />';


$sum=puls1($a,$b);
print '足し算:';
print $sum;
print '<br />';

$difference=difference1($a,$b);
print '引き算:';
print $difference;
print '<br />';

$product=product1($a,$b);
print '掛け算:';
print $product;
print '<br />';

$quotient=quotient1($a,$b);
print '割り算:';
print $quotient;
print '<br />';

$modulus=modulus1($a,$b);
print '余剰:';
print $modulus;
print '<br />';

?>


</body>
</html>
