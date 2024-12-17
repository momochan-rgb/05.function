<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 150; // 商品金額

function calc($yen, $product)
{
    // この関数内に処理を記述
    $i = $yen - $product;
    $tenThousand = floor($i / 10000);
    $fiveThousand = floor($i / 5000);
    $oneThousand = floor(($i - (5000 * $fiveThousand)) / 1000);
    $fivehundred = floor(($i - (5000 * $fiveThousand) - (1000 * $oneThousand)) / 500);
    $onehundred = floor(($i - (5000 * $fiveThousand) - (1000 * $oneThousand) - (500 * $fivehundred)) / 100);
    $fifty = floor(($i - (5000 * $fiveThousand) - (1000 * $oneThousand) - (500 * $fivehundred) - (100 * $onehundred)) / 50);
    $ten = floor(($i - (5000 * $fiveThousand) - (1000 * $oneThousand) - (500 * $fivehundred) - (100 * $onehundred) - (50 * $fifty)) / 10);
    $five = floor(($i - (5000 * $fiveThousand) - (1000 * $oneThousand) - (500 * $fivehundred) - (100 * $onehundred) - (50 * $fifty) - (10 * $ten)) / 5);
    $one = floor(($i - (5000 * $fiveThousand) - (1000 * $oneThousand) - (500 * $fivehundred) - (100 * $onehundred) - (50 * $fifty) - (10 * $ten) - (5 * $five)) / 1);

    if ($yen >= $product) {
        echo "10000円札×".$tenThousand."枚、";
        echo "5000円札×".$fiveThousand."枚、";
        echo "1000円札×".$oneThousand."枚、";
        echo "500円玉×".$fivehundred."枚、";
        echo "100円玉×".$onehundred."枚、";
        echo "50円玉×".$fifty."枚、";
        echo "10円玉×".$ten."枚、";
        echo "5円玉×".$five."枚、";
        echo "1円玉×".$one."枚";

    } elseif ($yen < $product) {
        echo abs($i)."円足りません。";
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お釣り</title>
</head>
<body>
    <section>
        <!-- ここに結果表示 -->
        <?php echo calc($yen, $product); ?>
    </section>
</body>
</html>