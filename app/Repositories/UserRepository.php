<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\IUserRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    protected $user = null;

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {
        if(is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make($collection['password']);
            $user->save();
            return $user;
        }

        $user = User::find($id);
            if(!$user) return null;

        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->save();
        return $user;

    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
