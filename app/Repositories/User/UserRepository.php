<?php

namespace App\Repositories\User;


use App\Repositories\User\UserInterface as UserInterface;
use App\Models\User;


class UserRepository implements UserInterface
{
    public $user;
    function __construct(User $user) {
	$this->user = $user;
    }


    public function getAll()
    {
       $data = User::paginate(3);
       return $data;
        // return $this->user->getAll();
    }


    public function find($id)
    {
        return User::find($id);
        // return $this->user->findUser($id);
    }


    public function delete($id)
    {
       return User::find($id)->delete();
        // return $this->user->deleteUser($id);
    }
}
?>