<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
    <form action="adduser.php">
    username: <input type="text" name="username"><br>
    password: <input type="password" name="password"><br>
    confirmpassword: <input type="password" name="confirmpassword"><br>

    <br>
    <!--Next 3 lines create radio buttons to select user role-->
    <input type="radio" name="role" value="user" checked> Pupil<br>
    <input type="radio" name="role" value="admin"> Admin<br>
    <input type="submit" value="Add User">
    </form>
</body>
</html