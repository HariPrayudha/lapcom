<form method="post" name="loginform">
    <p>Username</p>
    <input type="text" name="username" placeholder="Username"> <br>
    <p>Password</p>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" name="submit" value="LOGIN">
</form> 
<?php
if(isset($_POST['submit']) == 'LOGIN'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password)){
        echo"<meta http-equiv='refresh' content='0 url =index.php?page=login'>";
    }else{
        $sql = mysqli_query($koneksi, "SELECT * FROM user
        WHERE id_user='$username' and password = '$password'");
        $result = mysqli_fetch_array($sql);
        if($result[1]){
            $_SESSION['username'] = $username;
            //header('Location: Login.php);
            echo "<meta http-equiv='refresh' content='0 url=admin/index.php'>";
            }else{
                //Tidak ada di database
                echo "<meta http-equiv='refresh' content='0 url=index.php?page=login'>";
            }
}
}
if(isset($_GET['action'])=="logout"){
    session_destroy();
}
?>