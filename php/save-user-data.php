<?php
session_start();
include_once '../admin/php/config.php';
$fname = strtoupper(mysqli_real_escape_string($con, $_POST['fname']));
$lname = strtoupper(mysqli_real_escape_string($con, $_POST['lname']));
$email = mysqli_real_escape_string($con, $_POST['email']);
$passwprd = mysqli_real_escape_string($con, $_POST['psw']);
if (!empty($fname) && !empty($lname) && !empty($email) && !empty($passwprd)) {

    if (!preg_match('/[^A-Za-z\s]/', $fname)) {

        if (!preg_match('/[^A-Za-z]/', $lname)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                if (!preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $email)) {

                    $sql = mysqli_query($con, "SELECT * FROM users WHERE email='{$email}' ");

                    if (!mysqli_num_rows($sql) > 0) {

                        $user_id = substr($fname, 0, 5) . time();
                        $hash_psw = password_hash($passwprd, PASSWORD_BCRYPT);
                        $status = "unverified";
                        $otp = rand(111111, 999999);

                        $insert_data = "INSERT INTO users (unique_id    ,fname,lname,email,password,otp,status) VALUES('{$user_id}','{$fname}','{$lname}','{$email}','{$hash_psw}',{$otp},'{$status}')";
                       
                        if (mysqli_query($con, $insert_data)) {

                            include_once '../admin/php/sendemail.php';
                            $head = "Takemeon OTP Verification";
                            $body = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                                        <div style="margin:50px auto;width:70%;padding:20px 0">
                                                            <div style="border-bottom:1px solid #eee;text-align: center;">
                                                                <img src="https://takemeon.in/img/glogo.png" alt="Takemeon" style="width: 150px;">
                                                            </div>';
                            $body .=
                                '<p style="font-size:1.1em">Hi,' .
                                $fname .
                                '</p>
                                                            <p>Thank you for join Us. Use the following OTP to complete your Sign Up procedures.</p>';
                            $body .=
                                '<h2
                                                                style="background: #527b8f;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
                                                                ' .
                                $otp .
                                '</h2>
                                                            <p style="font-size:0.9em;">Regards,<br />Takemeon</p>
                                                            <hr style="border:none;border-top:1px solid #eee" />
                                                            <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                                                <p>Takemeon</p>
                                                                <p>India</p>
                                                            </div>
                                                        </div>
                                                    </div>';
                            if (send_email($email, $head, $body)) {
                                $_SESSION['user_email'] = $email;
                                
                                $_SESSION['user_full_name'] = $fname . " " . $lname;
                                 setcookie("otp_status","unverified",time()+86400,"/");
                                 setcookie("user_temp_email",$email,time()+86400,"/");




                                echo "DONE";
                                exit();
                            } else {
                                echo "We Are Anable To Send OTP";
                            }
                        } else {
                            echo "Query Field";
                        }
                    } else {
                        echo "Your Email Already Exit Please Go Login";
                    }
                } else {
                    echo "Don't Right Any Special Charactor Except-@,.";
                }
            } else {
                echo "Please Enter Valied Email-id";
            }
        } else {
            echo "Please Enter Only A-z in Last Name";
        }
    } else {
        echo "Please Enter Only A-z in First Name";
    }
} else {
    echo "Plase Enter All Field";
}
