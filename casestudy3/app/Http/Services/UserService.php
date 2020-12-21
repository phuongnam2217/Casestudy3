<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements ServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAll()
    {
        return $this->userRepository->getAll();
    }
    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function add($request, $obj = null)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        $this->userRepository->save($user);
    }
    public function update($request, $obj = null)
    {
        $obj->name = $request->name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->address = $request->address;
        $obj->phone = $request->phone;
        $obj->role_id = $request->role;
        $this->userRepository->save($obj);
    }
    public function delete($obj)
    {

    }
}
