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
                <?php
                    echo "
                    <p> </p>
                    <form method='POST'>
                    <input id='taskpub' type='submit' name='action' value='Home Page'/>
                    </form>
                    ";
                ?>

            </article>

        <footer>Copyright : Hugo Combe & Thomas Deffradas, Groupe 7 - 2017</footer>

    </body>
</html>