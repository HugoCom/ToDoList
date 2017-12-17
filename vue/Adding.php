<html>
    <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,PHP">
    <meta name="author" content="Hugo Combe & Thomas Deffradas">
    <title>Task</title>
    <link href="http://localhost/ToDoList/vue/style/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <header>
                <h1> Add a task !</h1>
            </header>
            <article>
                <form method=\"POST\">
                    <p id='REGI'>Task name</p>
                        <input id='reg' type='text' name='name' title='name' placeholder="Name it !"/>
                    <p id='REGI'>Description</p>
                        <input id='reg' type='text' name='description' title='description' placeholder="Describe it !"/>
                    <?php
                        if($_SESSION['Rule'] == "public")
                            echo "
                                <p> </p>
                                <input id=\"taskpub\" type='submit' name='action' value='Add task'>
                            ";
                        else
                            echo "
                                <p> </p>
                                <input id=\"taskpriv\" type='submit' name='action' value='Add private task'>
                            ";
                    ?>
                </form>
            </article>

            <footer>Copyright : Hugo Combe & Thomas Deffradas, Groupe 7 - 2017</footer>
        </div>
    </body>
</html>