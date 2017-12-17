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
             <h1> Sign up </h1>
            </header>

                <article>
                    <?php

                    echo "
                             <form method=\"POST\">
                             
                                <p id='REGI'>Login</p>
                                    <input id='reg' type=\"text\" name=\"login\" title=\"Login\" placeholder=\"Your login..\"/>
                                <p id='REGI'>Password</p>
                                    <input id='reg' type=\"password\" name=\"password\" title=\"Password\" placeholder=\"Your password..\"/>
                                <p id='REGI'>Surname</p>
                                    <input id='reg' type=\"text\" name=\"surname\" title=\"Surname\" placeholder=\"Your surname..\"/>
                                <p id='REGI'>Name</p>
                                    <input id='reg' type=\"text\" name=\"name\" title=\"Name\" placeholder=\"Your name..\"/>
                                <p id='REGI'>Email</p>
                                    <input id='reg' type=\"email\" name=\"email\" title=\"Email\" placeholder=\"Your email..\"/>
                                <P> </P>
                                    <input id='regilogin' type=\"submit\" name=\"action\" value=\"Register\"/>
                             </form>
                            ";
                    ?>
                </article>
            <footer>Copyright : Hugo Combe & Thomas Deffradas, Groupe 7 - 2017</footer>
        </div>
    </body>
</html>