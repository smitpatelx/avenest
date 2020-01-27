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

if(isset($_SESSION['user_type_s'])){
    user_redirection();
}

if(is_get())
{
    // Setting variables
    $email_helper = "";
    $password_helper = "";
    $errors=0;
    $error="";

    if(isset($_COOKIE['LOGIN_COOKIE']))
    {
        $login_cookie = explode("_|",$_COOKIE['LOGIN_COOKIE']);
        $cookie_email = $login_cookie[2];
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
    } else if(strlen($email) >= MAX_EMAIL_LENGTH || strlen($email) <= MIN_EMAIL_LENGTH ){
        $email_helper = "You entered \"".$email."\" "."Email must be between ".MIN_EMAIL_LENGTH." and ".MAX_EMAIL_LENGTH;
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
    } else if(strlen($password) >= MAX_PASSWORD_LENGTH || strlen($password) <= MIN_PASSWORD_LENGTH){
        $password_helper = "Password must be between ".MIN_PASSWORD_LENGTH." and ".MAX_PASSWORD_LENGTH;
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

        if(pg_num_rows($exe1) == 0){
            $error = "User with this email and password doesn't exist";
            $password = "";
        } else {
            $query2 = "UPDATE users SET last_access = '".$last_access."'
                                                  WHERE users.email_address = \$1 AND users.password = \$2 ;";
            db_prepare('update_last_access', $query2);
            $exe2 = db_execute('update_last_access', array($email, $password));
            
            $currentUser = pg_fetch_assoc($exe1);
            $id_sql = "SELECT * FROM users, persons WHERE users.user_id = \$1 AND persons.user_id = \$1 ;";
            db_prepare('get_users', $id_sql);
            $id_exe = db_execute('get_users', array($currentUser['user_id']));
            
            print_r($currentUser);
            $currentUser = pg_fetch_assoc($id_exe);
            unset($currentUser['password']);
            $_SESSION['user_type_s'] = $currentUser['user_type'];
            $_SESSION['user_s'] = $currentUser;

            $cookie_currentUser = implode("_|",$currentUser);
            setcookie("LOGIN_COOKIE", $cookie_currentUser, COOKIE_LIFESPAN);

            $session_msg[] = "Successfully logged in";
            $_SESSION['session_messages'] = $session_msg;

            //Redirect user to their respective page after login
            user_redirection();
            exit();
        }
    } else {
        $error = "Something went wrong";
        $password = "";
    }
    $password = "";
}

?>

    <!-- The login form for the page -->
    <div class="w-full flex lg:flex-wrap flex-wrap-reverse justify-center">
        <div class="w-full lg:w-2/3 h-auto object-cover p-4 justify-center items-center flex flex-wrap">
            <img src="./images/undraw_mobile_login_ikmv.svg" alt="undraw_mobile_login_ikmv.svg" class="object-fit" style="height: 35rem;"/>
        </div>
        <form class="h-auto w-full lg:w-1/3 px-8 pb-4 md:pb-0" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-700 my-2 text-4xl mt-4 font-headline">Login</p>
            <p class="text-left font-semibold text-gray-500 my-2">Email and Password needed</p>

            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>

            <div>
                <p class="text-lg font-normal py-2 text-black lg:mt-24">Email</p>
                <input autofocus type="text" name="email" value="<?php echo $email ?>" class="w-full py-3 px-4 shadow-lg rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $email_helper ?></p>
            <div>
                <p class="text-lg font-normal py-2 text-black">Password</p>
                <input type="password" name="password" value="<?php echo $password ?>" class="w-full py-3 px-4 shadow-lg rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $password_helper ?></p>
            <div class="flex flex-wrap flex-row mt-4 justify-center">
                <div class="pr-2 py-2">
                    <input type="submit" value="Login" class="focus:outline-none focus:shadow-outline w-full py-2 px-3 shadow-lg rounded hover:bg-primary-500 bg-primary-300 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pl-2 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-2 px-3 shadow-lg rounded bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
                </div>
            </div>
            <div class="flex flex-wrap flex-col text-center text-base">
                <a href="./password-request.php" class="w-full font-semibold text-blue-600 hover:text-blue-700 underline">Forgot Password</a>
                <a href="./register.php" class="w-full font-semibold text-blue-600 hover:text-blue-700 underline">Register Here</a>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>