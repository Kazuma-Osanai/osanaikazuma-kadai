<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<title>PHP課題4</title>
</head>
<body>
<?php

//(1)
//arrayを使用して、平日の曜日の文字列だけの配列を作成し、表示するプログラムを作ろう
$youbi = array('月曜日', '火曜日', '水曜日', '木曜日', '金曜日');
foreach($youbi as $value){
    print $value.'<br />';
   }

print '<br />';


//(2)
//「"英語" => "日本語"」の形式として、色んな英単語の連想配列を作成し、表示するプログラムを作ろう
//"Cat" => "猫"　など
$eng = array('cat' => '猫','dog' => '犬','bird' => '鳥');
foreach($eng as $key => $value){
    print $key.'：';
    print $value.'<br />';
    }

print '<br />';


//(3)
//問題(1)と(2)で作った配列から、それぞれ好きな値を選んで、表示するプログラムを作ろう
print $youbi[0].'<br />';
print $eng['cat'].'<br />';

print '<br />';


//(4)
//問題(1)と(2)の配列の要素を数えて、表示するプログラムを作ろう
print '問題(1)の配列の要素数：'.count($youbi).'<br />';
print '問題(2)の配列の要素数：'.count($eng).'<br />';

print '<br />';


//(5)
//"多次元の連想配列を作り、表示するプログラムを作ろう
//ただし、「リテラル」や「マジックナンバー」の意味をネットで調べ、リテラルやマジックナンバーを使わないこと。"
$food = array(
	'果物'=>array('りんご','みかん','なし'),
	'家電'=>array('テレビ','リモコン','エアコン'),
	'野菜'=>array('とうふ','ねぎ','いも'),
);

foreach($food as $key=>$vals){
    print $key.':'.$vals[0].','.$vals[1].','.$vals[2];
    print '<br>';
}



?>


</body>
</html>
