<?
    seesion_start();
    include_once("20210822config.php");
    $name = mysqli_real_escape_string($con, $_POST["uname1"]);
    $nameclean = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $pass = mysqli_real_escape_string($con, $_POST["pass1"]);
    $passclean = filter_var($pass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $hash = sha1(md5($passclean));
    $result = $con->query("SELECT * FROM users WHERE username='$nameclean' AND password= '$hash'");
    $total=$result->num_rows;
    if($total<1){
        echo "That user is not in our System";
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "Yes we have a match and the email is ".$row["email"];
            $_SESSION["id"]= $row["id"];
            echo "<br/>The Session ID is" . $_SESSION["id"];
        }
    }
    $con->cloes();
?>