<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<title>PHP課題2</title>
</head>
<body>
<?php

//(1)
//以下の文の値を予測して、その後、プログラムを書き、検証しよう。
//2 + 4 - 5	1
//4 - 5 + 2	1
//4 * 5 / 2	10
//5 / 2 * 4	10

print 2 + 4 - 5 .'<br />';
print 4 - 5 + 2 .'<br />';
print 4 * 5 / 2 .'<br />';
print 5 / 2 * 4 .'<br />';

print '<br />';


//(2)
//以下の文の値を予測して、その後、プログラムを書き、検証しよう。
//2 * 3 + 4 + 1;	11
//2 * (3 + 4 + 1);	16

print 2 * 3 + 4 + 1 .'<br />';
print 2 * (3 + 4 + 1) .'<br />';

print '<br />';


//(3)
//else文とif文について、以下のソースを見て、以下の質問に答えよ。
//"①trueが実行される条件を、画面上に表示しよう。
//②falseが実行されるには、どのような処理が追加で必要か、解説を画面上に表示しよう。"
//"if ($username == ""Admin"") {
//  echo (""Welcome to the admin page."");
//} else {
//  echo (""Welcome to the user page."");
//}"
print '①trueが実行される条件を、画面上に表示しよう。<br />';
print '$usernameにAdminと入れる<br />';
print '②falseが実行されるには、どのような処理が追加で必要か、解説を画面上に表示しよう。<br />';
print '$usernameにAdmin以外を入れる<br />';

print '<br />';


//(4)
//適当な配列を作り、複数の値を保存する事。また、保存した値を、ループ処理で順番に表示するプログラムを作ろう。
$a=array('B','T','Q','A','F');
foreach ($a as $value) 
	{
	print $value . '<br>';
	}
	
print '<br />';
print '<br />';


//(5)
//問題(4)で作った配列の内容を、sort関数でアルファベット順に並べて、ループ処理で順番に表示するプログラムを作ろう。
sort($a);
foreach ($a as $value) 
	{
	print $value . '<br>';
	}

print '<br />';
print '<br />';


//(6)
//"適当な多次元配列を作成し、foreachで内容を順番に表示するプログラムと、whileで内容を順番に表示するプログラムを作ろう。
//ただし、「マジックナンバー」の意味をネットで調べ、マジックナンバーを使わないこと。"

$list = array(
    array(
        'num'=>1,
        'name'=>'長内'
    ),
    array(
        'num'=>2,
        'name'=>'江戸川'
    ),
    array(
        'num'=>3,
        'name'=>'毛利'
    )
);



while ($value = current($list)) {
    echo '番号:'.$value['num'].'名前:'.$value['name'].'<br />';
    next($list);
}

print '<br />';

foreach($list as $key=>$vals){
    print '番号:'.$vals['num'].'名前:'.$vals['name'].'<br />';
}


?>


</body>
</html>
