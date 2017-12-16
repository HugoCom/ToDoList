<html>
<head>
    <title>ToDo List </title>
</head>

<body>
<h1> Add a task ! </h1>
    <form method=\"POST\">
        Task name : <input type='text' name='name' title='name'/>
        Description : <input type='text' name='description' title='description'/>
        <?php
            if($_SESSION['Rule'] == "public")
                echo "
                    <input type='submit' name='action' value='Add task'>
                ";
            else
                echo "
                    <input type='submit' name='action' value='Add private task'>
                ";
        ?>
    </form>

</body>
</html>