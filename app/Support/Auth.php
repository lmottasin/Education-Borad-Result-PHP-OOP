<?php
namespace App\Support;

use App\Support\Database;

class Auth extends Database
{
    public function login($email, $password)
    {
        $data = $this->customQuery("SELECT * FROM users WHERE email='$email'");



        $login_user_num = $data ->num_rows;
        $login_user_data = $data -> fetch_assoc();

        if ( $login_user_num == 1)
        {
            /**
             * echo '<pre>';

             * print_r($login_user_data);

             * echo '</pre>';
             **/
            // chceking the hash password
            if ( password_verify($password, $login_user_data['password']))
            {

            }
            else
            {
                return $msg = "<p class='alert alert-warning'> Wrong Password ! <button class='close' data-dismiss='alert'>&times;</button></p>";

            }
        }
        else
        {

            return $msg = "<p class='alert alert-danger'> Wrong Email Address ! <button class='close' data-dismiss='alert'>&times;</button></p>";
        }

    }
}