<?php
    $matrix = [];
    for($i = 0; $i < 4; $i++){
        for($j = 0; $j < 4; $j++){
            $matrix[$i][$j] = rand(0, 1) == 0 ? 'S' : 'O';
        }
    }
    function checkAdjacentContent($top, $bottom, $right, $left, $topLeft, $bottomRight, $topRight, $bottomLeft) {
        if(($top == 'S' && $bottom == 'S') || ($right == 'S' && $left == 'S')
        || ($topLeft == 'S' && $bottomRight == 'S') || ($topRight == 'S' && $bottomLeft == 'S')) {
            return true;
        }
        return false;
    }
    $result = false;
    $i = 0;
    while ($i < 4 && $result == false) {
        $j = 0;
        while ($j < 4 && $result == false) {
            if($matrix[$i][$j] == 'O') {
                $t = $i - 1 >= 0 ? $matrix[$i - 1][$j] : 'X';
                $r = $j + 1 < 4 ? $matrix[$i][$j + 1] : 'X';
                $b = $i + 1 < 4 ? $matrix[$i + 1][$j] : 'X';
                $l = $j - 1 >= 0 ? $matrix[$i][$j - 1] : 'X';
                $tL = ($i - 1 >= 0) && ($j - 1 >= 0) ? $matrix[$i - 1][$j - 1] : 'X';
                $bR = ($i + 1 < 4) && ($j + 1 < 4) ? $matrix[$i + 1][$j + 1] : 'X';
                $tR = ($i - 1 >= 0) && ($j + 1 < 4) ? $matrix[$i - 1][$j + 1] : 'X';
                $bL = ($i + 1 < 4) && ($j - 1 >= 0) ? $matrix[$i + 1][$j - 1] : 'X';
                $result = checkAdjacentContent($t, $b, $r, $l, $tL, $bR, $tR, $bL);
            }
            $j++;
        }
        $i++;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOS Game | Sekar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&family=Indie+Flower&display=swap');
        * {
            box-sizing: border-box;
        }
        body {
            text-align: center;
            font-family: "Concert One", cursive;
        }
        .card {
            box-shadow: 0 0 15px 2px rgba(42, 104, 148, 0.336);
            border-radius: 10px;
            padding: 20px;
            margin: 12px auto;
            width: fit-content;
        }
        table {
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 4px 2px #53B8BB;
        }
        h1 {
            font-family: "Indie Flower", cursive;
            font-size: 40px;
            color: #0A1931;
            text-shadow: 4px 4px 5px #53B8BB;
            margin: 0;
        }
        td {
            width: 70px;
            height: 70px;
            border-radius: 5px;
            border: 3px solid #53B8BB;
            font-size: 30px;
            background-color: #003638;
            color: white;
            transition: 1s;
        }
        td:hover {
            color: #003638;
            background-color: white;
            border-radius: 50%;
            transform: rotate(360deg);
            cursor: grab;
        }
        button {
            border: 3px solid #53B8BB;
            border-radius: 25px;
            padding: 10px 15px;
            cursor: pointer;
            text-align: center;
            background-color: #003638;
            color: white;
            box-shadow: 0 5px #999;
            margin: 10px auto 25px auto;
            font-family: "Concert One", cursive;
        }
        button:active {
            box-shadow: 0 1px #666;
            transform: translateY(2px);
        }
        .result-field .result {
            color: #003638;
            font-size: 30px;
            margin: 20px auto;
            padding: 0;
        }
        .result-field p {
            font-size: 25px;
            color: #003638;
            margin: 0 auto;
            padding: 0;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>SOS GAMES!</h1>
        <hr>
        <div class="board">
            <table border="0" cellpadding="15px" cellspacing="4">
                <?php foreach($matrix as $row) { ?>
                <tr>
                    <?php foreach($row as $col) { ?>
                        <td><?= $col; ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="btn-refresh-page">
            <button onclick="refreshPage()" name="btn-refresh-page">RANDOMIZE!</button>
        </div>
        <div class="result-field">
            <p>Hasil Pencarian :</p>
            <p class="result"><?= $result == true ? "THERE'S" : "NO" ?> SOS!</p>
        </div>
    </main>
    <script>
        function refreshPage(){
            window.location.reload();
        }
    </script>
</body>
</html>