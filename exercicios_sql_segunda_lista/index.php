<?php 

include_once("cabecalho.php");

?>

<body>
    <form action="login.php" method="POST">
        <div class="wrapper fadeInDown">
            <div id="formContent">
            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
            </div>

                <!-- Login Form -->
                <form action="login.php" method="POST">
                    <input type="text" class="fadeIn second" name="login" placeholder="login">
                    <input type="password"  class="fadeIn third" name="password" placeholder="password">
                    <input type="submit" class="fadeIn fourth" name="acessar" value="Acessar">
                </form>
            </div>
        </div>
    </form>
</body>
</html>