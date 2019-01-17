<?php

/* ソート用関数 */
function ArrSort($a, $b){
    $a = intval($a);
    $b = intval($b);
    return $a - $b;
}

$FilePath = "./q_5000000_3000.txt"; /* テキストファイルのパス */
$NumArr = []; /* テキストファイルから取得した文字列を入れる配列 */
$CountArr = []; /* 重複数が２回の数列を入れる配列 */
$count = 0; /* 要素数のカウントを入れる変数 */

if(!file_exists($FilePath)){
    echo "ファイルが見つかりません。\n";
}else{

    $f = fopen("{$FilePath}", 'r');
    while(($content = fgets($f, 4096)) !== false){
        if(isset($content) && isset($NumArr[$content])){
            $NumArr[$content]++;
        }else{
            $NumArr[$content] = 1;
        }
    }

    foreach($NumArr as $content => $value){
        if($value == 2){
            $CountArr[$content] = 0;
        }
    }
    uksort($CountArr, "ArrSort"); /* 昇順にソート */
    foreach ($CountArr as $content => $value){
        echo $content; /* 2回重複している数列のみ表示 */
    }

    echo "要素数:".count($CountArr)."\n";

    fclose($f);
}
