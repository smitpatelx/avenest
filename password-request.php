<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Register Page
-->
<?php
// Initialize basic variables
$title  = "Password Request";
$file   = "password-request.php";
$date   = "DEC 2, 2019";
$banner = "Password Request";
$desc   = "Password Request page includes fields for email.";
require("./header.php");

if(isset($_SESSION['user_type_s'])){
    user_redirection();
}

if(is_get()) {
    $email="";
    $errors=0;
    $error="";
} else if(is_post()) {
    $email = trimP('email');
    $errors=0;
    $error="";

    if(!isset($email) || empty($email))
    {
        $error .= "<br/>Email is required";
        $errors+=1;
        $email = "";
    } else if(strlen($email) >= MAX_EMAIL_LENGTH || strlen($email) <= MIN_EMAIL_LENGTH ){
        $error .= "<br/>You entered \"".$email."\" "."Email must be between ".MIN_EMAIL_LENGTH." and ".MAX_EMAIL_LENGTH."";
        $errors+=1;
        $email = "";
    }  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "<br/>You entered \"".$email."\" "."Invalid email address"; 
        $errors+=1;
        $email = "";
    }

    if($errors==0){
        $sql = "SELECT * FROM users WHERE email_address=\$1";
        $prepare = db_prepare('verify_email', $sql);
        $execute = db_execute('verify_email', array($email));

        $number_of_users = pg_num_rows($execute);
        if($number_of_users == 0){
            $error .= "<br/>User with this email doesn't exist";
        } else if($number_of_users == 1) {
            //Email logic
            $new_password = random_str();
            $subject = "New Requested Password";
            $message = "Your new password is : ".$new_password."<br/> We request you to change this password ASAP";
            $headers = 'From: noreply@avenest.com';
            
            $php_mail = mail($email, $subject, $message, $headers);

            if(php_mail){
                $session_messages[] = "Email sent successfully!";
                $_SESSION['session_messages'] = $session_messages;
                header("Location: ./login.php");
                ob_flush();
                exit();
            } else {
                $error .= "<br/>Error encountered while sending email."; 
            }
        } else {
            $error .= "<br/>Contact admin, unexpected result encountered.";
        }
    }
}
?>

    <div class="w-full flex flex-wrap justify-center items-center px-4 py-10">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-full md:w-1/2 lg:w-1/3 bg-white border-2 border-solid border-gray-400 py-4 px-3 flex flex-wrap rounded-lg shadow-lg">
            <h1 class="w-full text-2xl font-semibold text-center text-primary-500">Password Request</h1>
            <p class="w-full text-center pt-2 text-red-500 text-sm"><?php echo $error ?></p>
            <div class="w-full mt-4">
                <p class="text-lg font-normal py-1 text-black">Email</p>
                <input autofocus type="text" name="email" value="<?php echo $email ?>" class="border border-solid border-gray-400 w-full py-3 px-4 shadow-lg rounded-lg my-1 focus:outline-none focus:shadow-outline bg-white focus:bg-gray-100"/>
            </div>
            <div class="w-full flex flex-wrap flex-row mt-4 justify-center">
                <div class="pr-2 py-2">
                    <input type="submit" value="Get New Password" class="focus:outline-none focus:shadow-outline w-full py-2 px-3 shadow-lg rounded hover:bg-primary-500 bg-primary-300 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pl-2 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-2 px-3 shadow-lg rounded bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
                </div>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>