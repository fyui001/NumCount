<?php
/* ソート用関数 */
function descendingSort($a, $b){
    $a = intval($a);
    $b = intval($b);
    return $a - $b;
}

$filePath = './q_5000000_3000.txt';
$numArr = [];
$duplicationNumArr = [];

if(!file_exists($filePath)){
    echo "ファイルが見つかりません。\n";
    return 0;
}

$f = fopen($filePath, 'r');
while( $content = fgets($f, 4096) ) {
    if( !isset($numArr[$content]) ){
        $numArr[$content] = 1;
        continue;
    }
    $numArr[$content]++;
}

foreach($numArr as $content => $value){
    if($value === 2){
        $duplicationNumArr[$content] = 0;
    }
}

uksort($duplicationNumArr, 'descendingSort');
foreach ($duplicationNumArr as $content => $value){
    echo $content;
}

echo '要素数:'.count($duplicationNumArr)."\n";

fclose($f);
