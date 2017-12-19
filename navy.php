<!DOCTYPE html>
<html>
<head>
    <title>Join the navy !</title>
    <link rel="stylesheet" type="text/css" href="navy.css">
</head>
<body>
<div id="home">
    <h1 class="qg">Mon QG :</h1>
    <input id="moi" type="text" placeholder="Mon nom">
    <button class="button-play" disabled>Start the game !</button>
    <div id="history">
    </div>
</div>

<div id="no-mans-land">
    <p>NO MAN'S LAND</p>
</div>

<div id="enemy">
    <h1>Adversaire</h1>
    <p id="megaphone">> En attente d'un joueur</p>

    <table>
        <?php
        $tabCol = ['', 'A', 'B', 'C', 'D', 'E', 'F'];
        $fleet = [
                'A0' => '1',
                'A1' => '1',
//                'A2' => '1',
//                'B4' => '2',
//                'C4' => '2',
//                'D4' => '2',
//                'E4' => '2',
//                'B7' => '3',
//                'B8' => '3',
//                'D2' => '4',
//                'D3' => '4',
        ];

        for ($i = 0; $i < 7; $i++) :?>
            <tr>
                <th><?= $tabCol[$i] ?></th>
                <?php for ($j = 0; $j < 10; $j++) :
                    if ($i == 0) {
                        echo('<th>' . $j . '</th>');
                    } else {
                        $coord = $tabCol[$i] . $j;
                        $content = (array_key_exists($coord, $fleet)) ? $fleet[$coord] : '0';
                        echo('<td id="' . $coord . '" data-content="' . $content . '"></td>');
                    }
                endfor ?>
            </tr>
        <?php endfor ?>
    </table>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="navy.js"></script>
</body>
</html>