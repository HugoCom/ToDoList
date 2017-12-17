<html>
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="keywords" content="HTML,CSS,PHP">
            <meta name="author" content="Hugo Combe & Thomas Deffradas">
            <title>Error !</title>
            <link href="http://localhost/ToDoList/vue/style/style.css" rel="stylesheet" type="text/css"/>
        </head>
    </head>

    <body>
        <header>
            <h1>Errors :</h1>
        </header>

            <article id="error">
                <?php
                foreach ($TErreur as $value){
                    echo $value;
                }
                ?>
            </article>

        <footer>Copyright : Hugo Combe & Thomas Deffradas, Groupe 7 - 2017</footer>

    </body>
</html>