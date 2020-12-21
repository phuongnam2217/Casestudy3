<?php


namespace App\Http\Repositories;


use App\Models\Product;

class ProductRepository extends BaseRepository implements RepositoryInterface
{
    protected $productModel;
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function getAll()
    {
        return $this->productModel->latest()->get();
    }
    public function findById($id)
    {
        return $this->productModel->findOrFail($id);
    }
}
