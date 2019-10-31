<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Change Password Page
-->
<?php
$title  = "Change Password";
$file   = "change-password.php";
$date   = "SEPT 15, 2019";
$banner = "Change Password";
$desc   = "Change Password page use to greet Change Password.";
require("./header.php");

if(!isset($_SESSION['user_type_s'])){
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}

if(is_get())
{
    // Setting variables
    $old_password_helper = "";
    $new_password_helper = "";
    $con_password_helper = "";
    $old_password = "";
    $new_password = "";
    $con_password = "";
    $errors=0;
    $error="";

} else if(is_post())
{

    $old_password_helper = "";
    $new_password_helper = "";
    $con_password_helper = "";
    $errors=0;
    $error="";

    $old_password = trimP('old_password');
    $new_password = trimP('new_password');
    $con_password = trimP('con_password');

    //Old Password validation
    if(!isset($old_password) || empty($old_password))
    {
        $old_password_helper = "Old Password is required";
        $errors+=1;
    }

    //New Password validation
    if(!isset($new_password) || empty($new_password))
    {
        $new_password_helper = "New Password is required";
        $errors+=1;
    } else if(strlen($new_password) >= MAX_PASSWORD || strlen($new_password) <= MIN_PASSWORD){
        $new_password_helper = "New Password must be between 6 and 20";
        $errors+=1;
    }

    //Password validation
    if(!isset($con_password) || empty($con_password))
    {
        $con_password_helper = "Confirm Password is required";
        $errors+=1;
    } else if($con_password != $new_password){
        $con_password_helper = "Confirm Password does not match new password";
        $errors+=1;
    }

    // If everything went smoothly, begin adding to database
    if($errors<=0) {
        $old_password = hashmd5($old_password);
        $new_password = hashmd5($new_password);
        $last_access = date("Y-m-d",time());

        //Getting values from session
        $user_id = $_SESSION['user_id_s'];

        $query1 = "SELECT * 
        FROM users
        WHERE users.user_id = \$1 AND users.password = \$2";

        $prepare1 = db_prepare('user_exist', $query1);
        $exe1 = db_execute('user_exist', array($user_id, $old_password));

        if(pg_num_rows($exe1) <= 0){
            $error = "Old password is incorrect.";
        } else {
            $query2 = "UPDATE users SET last_access = \$1 , password = \$2 
                                                  WHERE users.user_id = \$3";
            $prepare2 =  db_prepare('update_last_access', $query2);
            $exe2 = db_execute('update_last_access', array($last_access, $new_password, $user_id));

            $currentUser = pg_fetch_array($exe1);
            setcookie("LOGIN_COOKIE", $cookie_currentUser, COOKIE_LIFESPAN);

            $session_msg[] = "Successfully changed password";
            $_SESSION['session_messages'] = $session_msg;

            //Redirect user to their respective page after login
            user_redirection();
            exit();
        }

        $old_password = "";
        $new_password = "";
        $con_password = "";
    } else {
        $error = "Something went wrong";
        $old_password = "";
        $new_password = "";
        $con_password = "";
    }

    $old_password = "";
    $new_password = "";
    $con_password = "";
}

?>

    <div class="w-full flex flex-wrap justify-center">
        <form class="w-1/3 bg-white p-6 my-10 shadow-lg rounded-lg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl font-headline">Change Password</p>
            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>
            <div>
                <p class="text-lg font-semibold py-2 text-gray-500">Old Password</p>
                <input type="password" name="old_password" value="<?php echo $old_password ?>" class="w-full py-3 px-4 shadow rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100 border-solid border border-blue-400"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $old_password_helper ?></p>
            <div>
                <p class="text-lg font-semibold py-2 text-gray-500">New Password</p>
                <input type="password" name="new_password" value="<?php echo $new_password ?>" class="w-full py-3 px-4 shadow rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100 border-solid border border-blue-400"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $new_password_helper ?></p>
            <div>
                <p class="text-lg font-semibold py-2 text-gray-500">Confirm Password</p>
                <input type="password" name="con_password" value="<?php echo $con_password ?>" class="w-full py-3 px-4 shadow rounded-lg my-2 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100 border-solid border border-blue-400"/>
            </div>
            <p class="pl-2 text-red-500 text-sm font-semibold"><?php echo $con_password_helper ?></p>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <input type="submit" value="Change Password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-primary hover:bg-transparent text-white hover:text-primary border hover:border-blue-600 font-semibold cursor-pointer"/>
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-primary hover:bg-transparent text-white hover:text-primary border hover:border-blue-600 font-semibold cursor-pointer"/>
                </div>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>