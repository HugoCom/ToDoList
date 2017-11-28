/**
* Created by PhpStorm.
* User: hucombe
* Date: 23/11/17
* Time: 15:00
*/

<html>
    <head>
        <title>Erreur !</title>
    </head>

    <body>
        <h1>Erreurs :</h1>
        <?php
            if (isset($TErreur)) {
                foreach ($TErreur as $value){
                    echo $value;
                }
            }
        ?>
    </body>
</html>