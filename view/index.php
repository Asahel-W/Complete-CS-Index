<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/index.css">
    <title>Complete CS Index</title>
</head>

<body>
<?php 
    session_start();

    if (isset($_SESSION['LOGGED']) && $_SESSION['LOGGED'] == true){
        echo '<a href="../controller/controller.php?logout=true" ><button>Logout</button></a>';
    } else {
        echo '<a href="newUser.php" ><button>Register</button></a><br>';
        echo '<a href="login.php" ><button>Login</button></a>';
    }
?>
<h1>Complete coder index for every language</h1>
<label for="allsearch">Search:</label>
<input type="search" name="allsearch">
<input type="button" name="entersearch" value="Enter">

<table id="languageTable">
    <tr>
        <th><a href="python.html">Python</a></th>
    </tr>
    <tr>
        <th>Java</th>
    </tr>
    <tr>
        <th>C</th>
    </tr>
</table>
</body>
</html>
