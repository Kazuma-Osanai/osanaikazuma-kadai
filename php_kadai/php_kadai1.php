<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<title>PHP課題1</title>
</head>
<body>
<?php

//(1)
//2つの文字列を比較し、同じ文字列かどうか、知らせる文を表示するプログラムを作ろう。
//最低限、if文と、PHPに標準で備わっているstrcasecmp関数をネットで調べて、かつ使用する事。
$a='にんじん';
$b='にんじん';
//$b='じゃがいも';

if(strcasecmp($a,$b)==0)
{
	print '文字列は同じ';
}
else
{
	print '文字列は違う';
}

print '<br />';
print '<br />';


//(2)
//２つ以上の文字列を連結して表示するプログラムを作ろう。
print 'おさない'.'かずま';

print '<br />';
print '<br />';


//(3)
//文字列と数値を結合して表示するプログラムを作ろう。
print '好きな数字は'. 14;

print '<br />';
print '<br />';


//(4)
//定数を使って文字列作成し表示するプログラムを２つ作ろう。
//ただし、定数の構文は２種類あるので、１種類ずつ使う事。
define('TEISU1', '定数1');
const TEISU2 = '定数2';

$teisu=TEISU1;
print $teisu;
print '<br />';
$teisu=TEISU2;
print $teisu;

print '<br />';
print '<br />';


//(5)
//PHPに標準で備わっている定数を使用して、行番号とファイル名を表示するプログラムを作ろう。
//PHPに標準で備わっている定数には、どんなものがあるか、自分で調べてみよう。
print '行番号：'.__LINE__;
print '<br />';
print 'ファイル名：'.__FILE__;

print '<br />';
print '<br />';


//(6)
//３００の数値を変数に設定して、３６５の数値で割った答えを表示するプログラムを作ろう。
$e=300;
print $e/365;
print '<br />';
print '<br />';


//(7)
//好きな数値を入れた変数を用意して、後置加算演算子を使い、加算後の結果を表示するプログラムを作ろう。
$f=14;
$f++;
print $f;

print '<br />';
print '<br />';


//(8)
//好きな数値を入れた変数を用意して、後置減算演算子を使い、減算後の結果を表示するプログラムを作ろう。
$f=14;
$f--;
print $f;

print '<br />';
print '<br />';


//(9)
//前置演算子と後置演算子を組み合わせて使用し、その結果を表示するプログラムを作り、前置と後置の違いを体感しよう。
$f=14;
print '前置演算子<br />';
print '最初は' . ++$f . '<br />';
print '次は' . $f . '<br />';
print '後置演算子<br />';
print '最初は' . $f++ . '<br />';
print '次は' . $f . '<br />';

print '<br />';
print '<br />';


//(10)
//３と２の数値を設定した変数を用意して、その変数を足し算した値を表示するプログラムを作ろう。
$g=3;
$h=2;
print $g+$h;

print '<br />';
print '<br />';


//(11)
//「1234」の数値を、文字列の値に変換して表示するプログラムを作ろう。
//その際に、現在の値の型まで表示してくれる関数var_dump()を使おう。
var_dump((string)1234);

print '<br />';
print '<br />';


//(12)
//以下のソースの間違えを考え、修正し、正しい結果を表示するプログラムに変えよう。
//3 = $locations;
//2 + $locations = $c;
//print($c);

$locations = 3;
$c = 2 + $locations;
print $c;


?>


</body>
</html>
