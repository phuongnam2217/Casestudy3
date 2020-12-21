<?php


namespace App\Http\Repositories;


use App\Models\Category;

class CategoryRepository extends BaseRepository implements RepositoryInterface
{
    protected $modelCategory;
    public function __construct(Category $category)
    {
        $this->modelCategory = $category;
    }

    public function getAll()
    {
        return $this->modelCategory->all();
    }

    public function findById($id)
    {
        return $this->modelCategory->findOrFail($id);
    }
}
