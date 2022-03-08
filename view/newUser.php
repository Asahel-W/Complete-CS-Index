<!DOCTYPE html>
<html>
   <body>
      <?php
         session_start();
      ?>
      <form action="../controller/controller.php?register=true" method="post">
         email: <input type = "text" name = "email" id="email"/>
         username: <input type = "text" name = "username" id="username"/>
         password: <input type = "password" name = "password" id="password" />
         re-type password: <input type = "password" name = "password2" id="password2"/>
         <input type = "submit" id="create" value="submit" onclick=""/>
      </form>

      <a href="index.php"><input type="button" value="Home"></a>

   <?php
	   if (isset($_SESSION['registerError'])){
	      echo $_SESSION['registerError'];
	      $_SESSION['registerError'] = null;
	   }
   ?>
   </body>
</html>