<html>
<head>
    <title>ToDo List </title>
</head>

<body>
<h1> Welcome on ToDoList website ! </h1>

<?php
    if(!isset($_SESSION['connecte']))
    {
        echo "
         <form method=\"POST\">
             Login : <input type=\"text\" name=\"login\" title=\"Username\"/>
             Password : <input type=\"password\" name=\"password\" title=\"Password\"/>
             <input type=\"submit\" name=\"action\" value=\"Valider\"/>
             <input type=\"submit\" name=\"action\" value=\"Register\"/>
         </form>
        ";
    }
?>

<h2> Public list</h2>

<?php
    foreach ($listTask as $value)
    {
        if(!$value->isComplete())
            echo "<input type=\"checkbox\" name=\"complete\"/>";
        echo $value->getName();
        echo "   ";
        echo $value->getDescription();
        echo "   ";
        echo "<br \>";
    }

    if(isset($_SESSION['connecte']))
    {
        echo "<h2>Private list</h2>";
        foreach ($listTaskPerso as $value)
        {
            if(!$value->isComplete())
                echo "<input type=\"checkbox\" name=\"complete\"/>";
            echo $value->getName();
            echo "   ";
            echo $value->getDescription();
            echo "   ";
            echo "<br \>";
        }
    }
?>



</body>
</html>