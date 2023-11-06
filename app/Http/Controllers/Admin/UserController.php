<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Administration\ListenerRequest;
use App\Models\User;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Uploads;

    public function index($type='all')
    {
        $type = ucfirst($type);
        return view('admin.user.index',compact('type'));
    }

    public function listProcess(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'users.enabled',
            4 => 'users.created_at',
            5 => 'users.id',
        );

        $type = $request->input('type');
        $results = User::role('User');

        if($type == 'Active') {
            $results = $results->where('enabled',1);
        } elseif ($type == 'Inactive') {
            $results=$results->where('enabled',0);
        }

        $totalData = $results->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {
            $results = $results->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir);
        } else {
            $search = $request->input('search.value');
            $results = $results->where(function ($query) use($search){
                $query->where('users.id','LIKE',"%{$search}%")
                    ->orWhere('users.email', 'LIKE',"%{$search}%")
                    ->orWhere('users.name', 'LIKE',"%{$search}%");
            });

            $totalFiltered = $results;
            $totalFiltered = $totalFiltered->count();
            $results = $results->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir);
        }
        $results = $results->get();

        $data = array();
        if(!empty($results)) {
            foreach ($results as $key => $row) {
                $edit = url('admin/user/edit/' . $row->id);

                $nestedData = array();
                $nestedData['id'] = $key + 1;
                $nestedData['name'] = $row->name;
                $nestedData['email'] = $row->email;
                $nestedData['created_date'] = format_date($row->created_at);

                if($row->enabled == 1) {
                    $nestedData['status'] ='<div class="badge badge-success mr-1 mb-1">
                        <i class="feather icon-check"></i>
                        <span>Active</span>
                    </div>';
                } else {
                    $nestedData['status'] ='<div class="badge badge-danger mr-1 mb-1">
                        <i class="feather icon-x"></i>
                        <span>Inactive</span>
                    </div>';
                }

                $nestedData['options'] = '';
                $nestedData['options'] .= '<a  href="'.$edit.'"><i class="feather icon-edit-1"></i></a>';
                $nestedData['options'] .= ' <a href="javascript:delete_record('.$row->id.')"><i class="feather icon-trash-2"></i></a>';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => (int)$request->input('draw'),
            "recordsTotal"    => (int)$totalData,
            "recordsFiltered" => (int)$totalFiltered,
            "data"            => $data
        );
        return response()->json($json_data);
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $errors = [];

        try {
            $input['password'] = Hash::make($input['password']);
            $input['role'] = 'User';

            User::create($input);

            return success_response([],trans('notification.record_add',['parameter' => 'User']));
        } catch (\Exception $e) {
            $errors[] = $e -> getMessage();
            return failure_response($errors,[],trans('notification.exception'));
        }
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request,User $user)
    {
        $input = $request->all();
        $errors = [];

        try {
            if(!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                unset($input['password']);
            }

            $user->update($input);
            return success_response([],trans('notification.record_update',['parameter' => 'User']));
        } catch (\Exception $e) {
            $errors[] = $e -> getMessage();
            return failure_response($errors,[],trans('notification.exception'));
        }
    }

    public function delete(User $user)
    {
        $user->delete();
        return success_response([],trans('notification.record_delete',['parameter' => 'User']));
    }
}
