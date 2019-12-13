<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Dashboard Page
-->
<?php
$title  = "406 Error";
$file   = "406.php";
$date   = "SEPT 15, 2019";
$banner = "406 Error";
$desc   = "406 page use for disabled users.";
require("./header.php");
?>

<div class="w-full flex flex-wrap justify-center items-center text-center px-6 md:px-10 lg:px-32 py-10 md:py-24">
    <?php
    if (isset($_SESSION['user_type_s']) ? $_SESSION['user_type_s'] == DISABLED : false){
        echo "
            <div class='font-semibold subpixel-antialiased text-2xl text-center text-primary-500 mb-10'>
                Your Account Have Been Disabled
            </div>
        ";
    }

    if (isset($_SESSION['user_type_s']) ? $_SESSION['user_type_s'] == INCOMPLETE : false){
        echo "
            <div class='font-semibold subpixel-antialiased text-2xl text-center text-primary-500 mb-10'>
                Your Account Is Incomplete
            </div>
        ";
    }

    ?>
    <p class="font-normal subpixel-antialiased text-lg text-left text-gray-600">
        Avenest LLC (Avenest) provides an abuse point of contact through an e-mail address (such as: support@avenest.com). This e-mail address will allow multiple staff members to monitor and address abuse reports.
        <br/><br/>
        Avenest reserves the right, at its sole discretion and at any time and without limitation, to deny, suspend, cancel, Avenestirect, or transfer any registration or transaction, or place any domain name(s) on registry lock, hold, or similar status as it determines necessary for any of the following reasons:
        <br/><br/>
    </p>
    <br/><br/>
    <ul class="list-disc text-left my-4 font-normal subpixel-antialiased text-lg text-gray-600">
        <li>to protect the integrity and stability of .realtor™;</li>
        <li>to enforce the .realtor™ end user licensing agreement as may be amended from time to time;</li>
        <li>to comply with any applicable laws, government rules or requirements, requests of law enforcement, or any dispute resolution process;</li>
        <li>to avoid any liability, civil or criminal, on the part of NAR, Avenest, its affiliates, subsidiaries, officers, directors, contracted parties, agents, or employees;</li>
        <li>to comply with the terms of the applicable registration agreement and/or .realtor™ policies;</li>
        <li>where registrant fails to keep Whois information accurate or up-to-date;</li>
        <li>domain name use is abusive or violates this AUP, or a third partyʹs rights or acceptable use policies, including but not limited to the infringement of any copyright or trademark;</li>
        <li>to correct mistakes made by a registry operator or any registrar in connection with a domain name registration; or</li>
        <li>as needed during resolution of a dispute.</li>
    </ul>
    <br/><br/>
    <p class="font-normal subpixel-antialiased text-lg text-left text-gray-600">
        Abusive use of a domain is described as an illegal, disruptive, malicious, or fraudulent action and includes, without limitation, the following:
    </p>
    <br/><br/>
    <ul class="list-disc text-left my-4 font-normal subpixel-antialiased text-lg text-gray-600">
        <li>distribution of malware;</li>
        <li>dissemination of software designed to infiltrate or damage a computer system without the owners informed consent, including, without limitation, computer viruses, worms, keyloggers, trojans, and fake antivirus products;</li>
        <li>phishing, or any attempt to acquire sensitive information such as usernames, passwords, and cAvenestit card details by masquerading as a trustworthy entity in an electronic communication;</li>
        <li>DNS hijacking or poisoning;</li>
        <li>spam, including using electronic messaging systems to send unsolicited bulk messages, including but not limited to e-mail spam, instant messaging spam, mobile messaging spam, and the spamming of Internet forums;</li>
        <li>botnets, including malicious fast-flux hosting;</li>
        <li>denial-of-service attacks;</li>
        <li>child pornography or any images of child abuse;</li>
        <li>promotion, encouragement, sale, or distribution of prescription medication without a valid prescription in violation of applicable law; and</li>
        <li>illegal access of computers or networks.</li>
    </ul>
</div>
<?php
require("./footer.php");
?>