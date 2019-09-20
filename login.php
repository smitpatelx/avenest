<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Login Page
-->
<?php
$title  = "Login";
$file   = "login.php";
$date   = "SEPT 15, 2019";
$banner = "Login";
$desc   = "Login page includes fields for email and password.";
require("./header.php");

if(is_get())
{
    $email_helper = "";
    $password_helper = "";
    $errors=0;
    $error="";

    if(isset($_COOKIE['LOGIN_COOKIE']))
    {
        $login_cookie = explode("|",$_COOKIE['LOGIN_COOKIE']);
        $cookie_email = $login_cookie[1];
        $email = $cookie_email;
        $password= "";  
    }
    else{
        $email = "";
        $password = "";
    } 
} else if(is_post())
{
    $email_helper = "";
    $password_helper = "";
    $errors=0;
    $error="";

    $email = trimP('email');
    $password = trimP('password');

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if(!isset($email) || empty($email))
    {
        $email_helper = "Email is required";
        $errors+=1;
        $email = "";
    } else if(strlen($email) >= 50 || strlen($email) <= 6 ){
        $email_helper = "You entered \"".$email."\" "."Email must be between 6 and 50";
        $errors+=1;
        $email = "";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_helper = "You entered \"".$email."\" "."Invalid email address"; 
        $email = "";
    }

    if(!isset($password) || empty($password))
    {
        $password_helper = "Password is required";
        $errors+=1;
        $password="";
    } else if(strlen($password) >= 20 || strlen($password) <= 6){
        $password_helper = "Password must be between 6 and 20";
        $errors+=1;
        $password="";
    }

    if($errors<=0) {
        $password = hashmd5($password);
        $last_access = date("Y-m-d",time());

        $query1 = "SELECT * 
        FROM users
        WHERE users.email_address = \$1 AND users.password = \$2";

        $prepare1 = db_prepare('user_exist', $query1);
        $exe1 = db_execute('user_exist', array($email, $password));

        if(pg_num_rows($exe1) <= 0){
            $error = "User with this email and password doesn't exist";
        } else {
            $query2 = "UPDATE users SET last_access = '".$last_access."'
                                                  WHERE users.email_address = \$1 AND users.password = \$2";
            $prepare2 =  db_prepare('update_last_access', $query2);
            $exe2 = db_execute('update_last_access', array($email, $password));

            $currentUser = pg_fetch_array($exe1);
            echo $currentUser;
            $_SESSION['user_type_s'] = $currentUser['user_type'];
            $_SESSION['email_s'] = $currentUser['email_address'];
            $_SESSION['last_access_s'] = $currentUser['last_access'];
            $_SESSION['user_id_s'] = $currentUser['user_id'];

            $cookie_currentUser = [ 
                'user_type' => $_SESSION['user_type_s'],
                'email' => $_SESSION['email_s'],
                'last_access' => $_SESSION['last_access_s'],
                'user_id' => $_SESSION['user_id_s']
            ];
            $cookie_currentUser = implode("|",$cookie_currentUser);
            setcookie("LOGIN_COOKIE", $cookie_currentUser, COOKIE_LIFESPAN);
            $session_messages[] = "Cookie set for 30 days.";

            $_SESSION['session_messages'] = $session_messages;
            //Redirect user to their respective page after login
            user_redirection();
        }
    } else {
        $error = "Something went wrong";
    }
}

?>

    <div class="w-full flex flex-wrap justify-center">
        <div class="w-2/3 h-auto object-cover">
            <img src="./images/room-34V7TVQQFsU-unsplash.jpg" alt="room-34V7TVQQFsU-unsplash.jpg" class="object-fit w-full">
        </div>
        <form class="h-auto w-1/3 p-4 shadow-inner" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-24 font-headline">Login</p>
            <p class="text-left font-semibold text-gray-500 my-2">Email and Password needed</p>

            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>

            <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email" class="w-full py-3 px-4 shadow rounded-lg my-2 mt-24">
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $email_helper ?></p>
            <input type="password" name="password" value="<?php echo $password ?>" placeholder="Password" class="w-full py-3 px-4 shadow rounded-lg my-2">
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $password_helper ?></p>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <input type="submit" value="Login" class="w-full py-3 px-4 shadow rounded-lg bg-primary hover:bg-transparent text-white hover:text-primary border hover:border-blue-600 font-semibold cursor-pointer">
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="reset" value="Reset" class="w-full py-3 px-4 shadow rounded-lg bg-gray-300 hover:bg-transparent  text-black hover:text-gray-600 border hover:border-blue-600 font-semibold cursor-pointer">
                </div>
            </div>
            <div class="flex flex-wrap flex-col text-center p-2">
                <a href="./register.php" class="w-full font-semibold text-blue-600 hover:text-blue-700 underline">Do not have an account? Register Here</a>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>