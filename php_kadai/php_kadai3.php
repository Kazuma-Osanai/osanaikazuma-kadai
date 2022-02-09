<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<title>PHP課題3</title>
</head>
<body>
<?php

//(1)
//複数条件のチェック
//"表示する度に、ランダムで、if elseif elseのどれかの処理が行われるプログラムを作ろう。
//PHPに標準で備わっているrand()関数をネットで調べよう。"
$randamu=rand(0,15);
if($randamu<5)
{
    print '$randamu='.$randamu.'<br />';
    print '値は5より小さい';
}
else if($randamu<10){
    print '$randamu='.$randamu.'<br />';
    print '値は5以上、10より小さい';
}
else
{
    print '$randamu='.$randamu.'<br />';
    print '値は10以上';
}

print '<br />';
print '<br />';


//(2)
//三項演算子を使用して、表示する度にランダムで表示するメッセージが変わるプログラムを作ろう。

print $randamu <= 7 ? '値は7以下' : '値は7より大きい';
print '<br />';
print '<br />';


//(3)
//「1～4」の数値をランダムに変数へ保存し、その変数がどの値であるか、switch文でチェックし表示するプログラムを作ろう。
$randamu_switch=rand(1,4);
print 'ランダムな値：'.$randamu_switch.'<br />';

switch ($randamu_switch) {
    case 1:
        print '値は1';
        break;

    case 2:
        print '値は2';
        break;

    case 3:
        print '値は3';
        break;
    
    case 4:
        print '値は4';
        break;
}

print '<br />';
print '<br />';


//(4)
//"問題(3)で作ったプログラムをコピーし、break文を抜いたら、処理はどうなるか。
//予測した後、コピーしたプログラムを修正して検証しよう。"

//break文を抜くとswitch文の終わりまで全て処理される。

print 'ランダムな値：'.$randamu_switch.'<br />';

switch ($randamu_switch) {
    case 1:
        print '値は1';
        //break;

    case 2:
        print '値は2';
        //break;

    case 3:
        print '値は3';
        //break;
    
    case 4:
        print '値は4';
        //break;
}
print '<br />';
print '<br />';


//(5)
//"問題(3)で作ったプログラムをコピーし、「1～6」の数値をランダムに変数へ保存するよう変更。
//default文を使用して「1～4」以外の数値の時は、エラーを示すような文章を表示するプログラムを作ろう。"
$randamu_max6=rand(1,6);
print 'ランダムな値：'.$randamu_max6.'<br />';

switch ($randamu_max6) {
    case 1:
        print '値は1';
        break;

    case 2:
        print '値は2';
        break;

    case 3:
        print '値は3';
        break;
    
    case 4:
        print '値は4';
        break;

    default:
        print '「1~4」以外の数値のためエラー';
}

print '<br />';
print '<br />';


//(6)
//問題(3)で作ったプログラムをコピーし、endswitch文を使用した、switch文に修正しよう。
print 'ランダムな値：'.$randamu_switch.'<br />';

switch ($randamu_switch) :
    case 1:
        print '値は1';
        break;

    case 2:
        print '値は2';
        break;

    case 3:
        print '値は3';
        break;
    
    case 4:
        print '値は4';
        break;
endswitch ;

print '<br />';
print '<br />';


//(7)
//whileループで、10回ループ処理をし、ループ数を数えて表示するプログラムを作ろう。
$count=1;
while($count<11)
{
    print 'ループ'.$count.'回目<br />';
    $count++;
}

print '<br />';

//(8)
//do～whileで10回ループ処理をし、ループ数を数えて表示するプログラムを作ろう。
$count=1;
do{
    print 'ループ'.$count.'回目<br />';
    $count++;
  }while ($count<11);

print '<br />';


//(9)
//下記のソースにbreak文を加えて「ゼロで割り算する事」を避けるプログラムを作ろう。
//"for ($counter = -3; $counter < 10; $counter++) {
//    echo 100 / $counter;
//  }"

for ($counter = -3; $counter < 10; $counter++) {
    if($counter==0)
    {
        break;
    }
    echo 100 / $counter;
    print '<br />';
}

print '<br />';


//(10)
//"問題(9)で作ったプログラムをコピーし、break文の代わりにcontinue文を使用するとどうなるか。
//予測した後、プログラムを書いて検証しよう。"

//continue文を使用するとfor文を抜けずに続きから処理される

for ($counter = -3; $counter < 10; $counter++) {
    if($counter==0)
    {
        continue;
    }
    echo 100 / $counter;
    print '<br />';
}
?>

</body>
</html>