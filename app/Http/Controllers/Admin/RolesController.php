<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleFormRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function create()
    {
        return view('manager.roles.create');
    }

    public function store(RoleFormRequest $request)
    {
        Role::create(['name' => $request->get('name')]);

        return redirect(route('manager.new_role'))->with('status', 'A new role has been created!');
    }

    public function index()
    {
        $roles = Role::all();
        return view('manager.roles.index', compact('roles'));
    }
}