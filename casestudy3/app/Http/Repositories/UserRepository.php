<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository implements RepositoryInterface
{
    protected $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    public function getAll()
    {
        return $this->userModel->latest()->get();
    }

    public function findById($id)
    {
        return $this->userModel->findOrFail($id);
    }

}
