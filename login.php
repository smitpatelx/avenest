<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
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
    // Setting variables
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


    // Email validation
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

    //Password validation
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

    // If everything went smoothly, begin adding to database
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

            $session_msg[] = "Successfully logged in";
            $_SESSION['session_messages'] = $session_msg;

            //Redirect user to their respective page after login
            user_redirection();
            exit();
        }
    } else {
        $error = "Something went wrong";
    }
}

?>

    <!-- The login form for the page -->
    <div class="w-full flex flex-wrap justify-center">
        <div class="w-2/3 h-auto object-cover p-32">
            <img src="./images/login-page-bg.svg" alt="login-page-bg.svg" class="object-fit w-full"/>
        </div>
        <form class="h-auto w-1/3 px-8" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-16 font-headline">Login</p>
            <p class="text-left font-semibold text-gray-500 my-2">Email and Password needed</p>

            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>

            <div>
                <p class="text-lg font-semibold py-2 text-gray-500 mt-24">Email</p>
                <input type="text" name="email" value="<?php echo $email ?>" class="w-full py-3 px-4 shadow rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100 border-solid border border-blue-400"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $email_helper ?></p>
            <div>
                <p class="text-lg font-semibold py-2 text-gray-500">Password</p>
                <input type="password" name="password" value="<?php echo $password ?>" class="w-full py-3 px-4 shadow rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100 border-solid border border-blue-400"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $password_helper ?></p>
            <div class="flex flex-wrap flex-row mt-4 justify-center">
                <div class="pr-2 py-2">
                    <input type="submit" value="Login" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow rounded-lg bg-primary hover:bg-blue-500 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pl-2 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow rounded-lg bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
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