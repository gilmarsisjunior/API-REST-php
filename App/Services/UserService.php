<?php 

namespace App\Services;
use App\Models\User;

    class UserService
    {
        public function get($id = '')
        {
           if ($id)
           {
            return User::getUser($id);
           }
           else {
               return User::getAllUser();
           }
        }
    }