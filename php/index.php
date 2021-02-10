<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$login = $password = "";
$login_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_login = trim($_POST["login"]);
    if(empty($input_login)){
        $login_err = "Please enter a login.";
    } else{
        $login = $input_login;
    }
    
    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter the password.";     
    } else{
        $password = $input_password;
    }
    
    // Check input errors before inserting in database
    if(empty($login_err) && empty($password_err)){
        // Prepare an insert statement
        //$sql = "INSERT INTO employees (name, address, password) VALUES (?, ?, ?)";
        $sql = "SELECT id FROM `user` WHERE login='" . $_POST['login'] . "'"."AND password='" . $_POST['password'] . "'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            header('Location: /crud.php');      
            exit();
        } else {
            echo "Mauvais mot de passe / Login";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Login</h2>
                    </div>
                    <p>Please login</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($login_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="login" class="form-control" value="<?php echo $login; ?>">
                            <span class="help-block"><?php echo $login_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="crud.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>