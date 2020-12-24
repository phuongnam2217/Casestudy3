<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;
use App\Models\StatusConstant;

class ProductService implements ServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function getAll()
    {
       return $this->productRepository->getAll();
    }
    public function findById($id)
    {
       return $this->productRepository->findById($id);
    }
    public function add($request, $obj = null)
    {
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->stock = $request->stock;
        $obj->category_id = $request->category;
        $obj->material_id = $request->material;
        $obj->plating_id = $request->plating;
        $this->productRepository->save($obj);
    }
    public function update($request, $obj = null)
    {
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->stock = $request->stock;
        $obj->category_id = $request->category;
        $obj->material_id = $request->material;
        $obj->plating_id = $request->plating;
        $this->productRepository->save($obj);
    }

    public function delete($obj)
    {
        $this->productRepository->delete($obj);
    }
    public function changeStatus($obj)
    {
        if($obj->status == StatusConstant::ACTIVE)
        {
            $obj->status = StatusConstant::DISABLE;
            $this->productRepository->save($obj);
        }else{
            $obj->status = StatusConstant::ACTIVE;
            $this->productRepository->save($obj);
        }
    }
}
