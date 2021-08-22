<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(function(){
                $("#submit").click(function(){
                    let uname = $("#username").val();
                    let pass = $("#pass").val();
                    let dataString = "uname1=" + uname + "&pass1=" + pass;

                    if (uname == "" || pass == ""){
                        $("#display").html("Please Fill All Fields");
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "20210822processor.php",
                            data: dataString,
                            cache: false,
                            success: function(result){
                                $("#display").html(result);
                            }
                        });
                    }
                    return false;
                });
            });
        </script>

    </head>
    <body>
        <input type="text" id="username" placeholder="Username">
        <input type="password" id="pass" placeholder="Password">
        <input type="button" id="submit" value="Log In">
    </body>
</html>