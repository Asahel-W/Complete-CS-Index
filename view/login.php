<!DOCTYPE html>
<html>
   <body>
      <form autocomplete="off" method="post" action="../controller/controller.php">
         <div class="loginContainer">
            email: <input type = "text" name = "email" id="email" required/>
            password: <input type = "password" name = "password" id="password" required/>
            <input type = "submit" id="login" name="login"/>
            <?php
            if (isset($_SESSION['loginError'])){
               echo $_SESSION['loginError'];
               $_SESSION['loginError'] = null;
            }
            ?>
         </div>
      </form>

      <a href="index.php"><input type="button" value="Home"></a>

      
   </body>
</html>