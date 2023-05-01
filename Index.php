<?php
    //la connexion à la base de donnée.
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="base";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "La connexion a ete bien retablie";
    }
    catch (PDOException $e){
        echo "La connexion a echouer" . $e->getMessage();
    }
    if(isset($_POST['submit']))
    {
        $user_name = $_POST["user_name"];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];

        $sql = ("INSERT INTO `apprenants`(`id`, `nom`, `prenom`, `date_de_naissance`) VALUES (':user_name', ':last_name', ':birth_date')");
        $stmt = $conn->prepare($sql);

        
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':birth_date', $birth_date);
            $stmt->execute();
        //Pour changer deux ou plus dans une seule fois clique sur cntrl +d
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.bundle.min.js">
    <link rel="stylesheet" href="Styles/Style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" action="" id="forme">
                    <fieldset form="forme">
                        <legend>Inscription</legend>
                            <label for="name">Nom:</label>
                            <input type="text" id="name" name="user_name" autocomplete="off" required><br><br>
                            <label for="last_name">Prenom:</label>
                            <input type="text" id="last_name" name="last_name" autocomplete="off" required><br><br>
                            <label for="birth_date">Date de naissance:</label>
                            <input type="date" name="birth_date" id="birth_date" autocomplete="off" required><br><br>
                            <label for="reset"></label>
                            <input type="reset" id="reset" name="reset" value="Effacer">
                            <label for="submit"></label>
                            <input type="submit" id="submit" name="submit" value="Valider">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>