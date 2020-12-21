<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Models\Category;
use App\Models\RoleConstant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getAll();
        if($request->ajax()){
            $data = $this->categoryService->getAll();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action',function ($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="modal-user" data-target="modal-user" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary editUser"><i style="font-size: 20px" class="metismenu-icon pe-7s-edit"></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger deleteUser"><i style="font-size: 20px" class="metismenu-icon pe-7s-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['status','role','action'])
                ->make(true);
        }
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'name'=>'required'
        ]);
        if($validator->passes()){
            $category = new Category();
            $this->categoryService->add($request,$category);
            return response()->json(['success'=>'Create New Category Successfully']);
        }
        return response()->json(['error'=>$validator->errors()->messages()]);
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->update($request,$category);
        return response()->json(['success'=>'Edit Category Successfully']);
    }


    public function destroy($id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->delete($category);
        return response()->json(['success'=>"Category deleted successfully."]);
    }
}
