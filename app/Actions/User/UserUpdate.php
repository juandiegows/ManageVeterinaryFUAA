<?php

namespace App\Actions\User;



use App\Models\User;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

 class UserUpdate
{


    public static function create(array $data): User|QueryException
    {
        try {

       
            $user =  User::find($data['id']);
            $user->fill($data);
            $user->save();

            return $user;

        } catch (QueryException $th) {
            return $th;
        }
    }
}
