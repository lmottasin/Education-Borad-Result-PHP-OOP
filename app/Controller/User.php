<?php
namespace App\Controller;
use App\Support\Database;

/**
 * class Users
 *
 */

class User extends Database{
    /**
     * @param $data
     * Admin registration
     */
    public function registerAdmin($data)
    {
         $return_val_from_database_create_method =
             $this->create('users', [
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> password_hash($data['password'], PASSWORD_DEFAULT)


    ]);
        if ($return_val_from_database_create_method == true)
        {
            return $msg = "<p class='alert alert-success'> Successfully Registered! <button class='close' data-dismiss='alert'>&times;</button></p>";
        }
        else
        {
            return $msg = "<p class='alert alert-danger'> Invalid Registration! <button class='close' data-dismiss='alert'>&times;</button></p>";
        }
    }

}