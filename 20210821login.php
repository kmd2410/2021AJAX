<?
    if (isset($_POST["login"])){
        $connection = new mysqli("locahost","root","123456,");

        $email = $connection->real_escape_string($_POST["emailPHP"]);
        $password = $connection->real_escape_string($_POST["passwordPHP"]);

        $data = $connection->query("SELECT id FROM users WHERE eamil = '$emial' AND password = 'password'");
        if ($data->num_rows > 0) {
            exit("sucess");
        }else {
            exit("failed");
        }


        exit($email . "=" . $password);
    }
?>


<html>
    <head>
        <title>jQuery Tutorial - Login Form</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function(){
                $("#login").on("click",function(){
                    let email = $("#email").val();
                    let password = $("#password").val();

                    if (email == empty || password == empty){
                        alert("모두 입력해주세요");
                    }

                    $.ajax(
                        {   
                            url: login.php,
                            method:"POST",
                            data:{
                                    login: 1,
                                    emailPHP: email,
                                    passwordPHP: password
                            },
                            success: function(){console.log(response);},
                            dataType: "text"
                        }
                    );
                });
            });
        </script>
    </head>
    <body>
        <form action="login.php" method="post">
            <input type="text" id="email" placeholder="Email..."><br>
            <input type="password" id="password" placeholder="Password..."><br>
            <input type="submit" value="Log In" id="login">
        </form>
    </body>
</html>