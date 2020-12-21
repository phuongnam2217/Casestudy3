<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\RoleConstant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if(!$this->userCan('create-user')){
            abort(403,__('You do not have permission'));
        }
        $roles = Role::all();
        $users = $this->userService->getAll();
        if($request->ajax()){
            $data = $this->userService->getAll();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if($row->status == 1)
                    {
                        $row->status = "ACTIVE";
                        return '<button class="btn btn-success editStatus" value="'.$row->id.'">'.$row->status.'</button>';
                    }else{
                        $row->status = "DISABLE";
                        return '<button class="btn btn-secondary editStatus" value="'.$row->id.'">'.$row->status.'</button>';
                    }
                })
                ->addColumn('role', function ($row) {
                    if($row->role_id == RoleConstant::ROLE_ADMIN)
                    {
                        return '<span class="badge badge-success">'.$row->role->name.'</span>';
                    }else{
                        return '<span class="badge badge-info">'.$row->role->name.'</span>';
                    }
                })
                ->addColumn('action',function ($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="modal-user" data-target="modal-user" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary editUser"><i style="font-size: 20px" class="metismenu-icon pe-7s-edit"></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="" data-toggle="modal"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger deleteUser"><i style="font-size: 20px" class="metismenu-icon pe-7s-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['status','role','action'])
                ->make(true);
        }
        return view('admin.users.index',compact('users','roles'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if(!$this->userCan('create-user')){
            abort(403,__('You do not have permission'));
        }
        $validator = Validator::make($request->all(),UserRequest::rules());

        if($validator->passes()){
            $this->userService->add($request);
            return response()->json(['success'=>'User saved successfully.']);
        }
      return response()->json(['error'=>$validator->errors()->messages()]);
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        if(!$this->userCan('create-user')){
            abort(403,__('You do not have permission'));
        }
        $user = User::find($id);
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        if(!$this->userCan('create-user')){
            abort(403,__('You do not have permission'));
        }
        $user = $this->userService->findById($id);
        $this->userService->update($request,$user);
        return response()->json(['success'=>'User Edited successfully.']);
    }

    public function uploadImage($obj,$request)
    {
        if($request->hasFile('image'))
        {
            $pathImage = $request->file('image')->store('public');
            $obj->image = $pathImage;
        }
    }
    public function destroy($id)
    {
        if(!$this->userCan('create-user')){
            abort(403,__('You do not have permission'));
        }
        User::find($id)->delete();
        return response()->json(['success'=>"User deleted successfully."]);
    }
    public function changeStatus($id)
    {
        if(!$this->userCan('create-user')){
            abort(403,__('You do not have permission'));
        }
        $user = User::find($id);
        if($user->status == 1)
        {
            $user->status = 2;
            $user->save();
        }else{
            $user->status = 1;
            $user->save();
        }
        return response()->json(['success'=>"User change status successfully."]);
    }
}
