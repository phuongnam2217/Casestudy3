<?php


namespace App\Http\Services;


use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\CategoryRepository;

class CategoryService implements ServiceInterface
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }
    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function add($request, $obj = null)
    {
        $obj->name = $request->name;
        $this->categoryRepository->save($obj);
    }
    public function update($request, $obj = null)
    {
        $obj->name = $request->name;
        $this->categoryRepository->save($obj);
    }
    public function delete($obj)
    {
        $this->categoryRepository->delete($obj);
    }
}
