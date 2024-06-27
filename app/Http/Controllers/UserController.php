<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        return inertia('Users/Index',[
            'users' => User::when(
                $search,
                function ($query) use ($search) {
                    return $query->where('name', 'LIKE', "%$search%");
                }
            )->paginate(5),
            'searched' => $search ?? ''
        ]);
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    public function store(StoreRequest $request)
    {

    }

    public function destroy()
    {
        return redirect()
            ->back()
            ->with('success', "Usuario deletado");
    }
}
