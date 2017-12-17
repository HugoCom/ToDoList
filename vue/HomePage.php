<html>
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="HTML,CSS,PHP">
        <meta name="author" content="Hugo Combe & Thomas Deffradas">
        <title>ToDo List </title>
        <link href="http://localhost/ToDoList/vue/style/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <header>
                <h1> Welcome on ToDoList ! </h1>
            </header>
            <section>
                <?php
                    if ($_SESSION['connecte'] == "no") {
                        echo "
                        <form method='POST'>
                        <p id='FORM'>Login</p>
                        <input id='inside' type='text' name='login' title='Username' placeholder=\"Your login..\"/>
                        <p id='FORM'>Password</p>
                        <input id='inside' type='password' name='password' title='Password' placeholder=\"Your password..\"/>
                        <input id='log' type='submit' name='action' value='Log in'/>
                        <input id='register' type='submit' name='action' value='Sign up'/>
                        </form>
                        ";
                    }
                ?>
            </section>

            <article>
                 <h2 id="pub"> Public Lists </h2>

                <?php
                    foreach ($listTask as $value)
                    {
                        if(!$value->isComplete())
                            echo "<input type=\"checkbox\" name=\"complete\"/>";
                        echo $value->getName();
                        echo "   : ";
                        echo $value->getDescription();
                        echo "   ";
                        echo "<br \>";
                    }

                    if($_SESSION['connecte'] == "yes")
                    {
                        echo "<h2 id='priv'>Private Lists</h2>";
                        foreach ($listTaskPerso as $value)
                        {
                            if(!$value->isComplete())
                                echo "<form method='POST'>        <input type=\"checkbox\" name=\"complete\"/></form>";
                            echo $value->getName();
                            echo "   : ";
                            echo $value->getDescription();
                            echo "   ";
                            echo "<br \>";
                        }
                    }
                ?>

            <form method="POST">
                <input id="taskpub" type="submit" name="action" value="Add a task">
            </form>
                <?php
                    if ($_SESSION['connecte'] == "yes")
                        echo "
                            <form method='POST'>
                                <input id=\"taskpriv\" type='submit' name='action' value='Add a private task'>
                            </form>
                        ";
                ?>
            </article>
            <footer>Copyright : Hugo Combe & Thomas Deffradas, Groupe 7 - 2017</footer>
        </div>
    </body>
</html>