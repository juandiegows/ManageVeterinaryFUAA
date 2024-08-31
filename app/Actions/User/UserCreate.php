<?php

namespace App\Actions\User;



use App\Models\User;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

 class UserCreate
{


    public static function create(array $data): User|QueryException
    {
        try {

       
            $user = new User;
            $user->fill($data);

            if (isset($data['password'])) {
                $user->password = Hash::make($user->password);
            }

            $user->save();

            return $user;

        } catch (QueryException $th) {
            return $th;
        }
    }
}
