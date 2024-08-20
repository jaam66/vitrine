<?php
// ----------------------------------------------------------------------------------------------------------
// USUÁRIO
// ----------------------------------------------------------------------------------------------------------
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $filter = $request->get('filter', '');
        if($filter){
            $users = DB::table('laravel.users')
                            ->select('u.name', 'users.*')
                            ->where('name', 'like', "%{$filter}%")
                            ->orderBy('name','asc');
            // --------------------------------------------------------------
            // dd($users);
            // --------------------------------------------------------------
        }
        else{
            $users = DB::table('laravel.users')
                            ->select('users.*')
                            ->orderBy('name','asc');
            
            // --------------------------------------------------------------
            // dd($users);
            // --------------------------------------------------------------
        }
        $users = $users->paginate(3);
        // ------------------------------------------------------------------
        // dd($users);
        // ------------------------------------------------------------------
        return view('admin/users/index', compact('users'));
    }

    // função 'SHOW' mostra os dados
    public function show(string|int $id)
    {
        $user = user::find($id);
        if(!$user = User::find($id)){
            return back();
        }

        return view('admin/users/show', compact('user'));
    }
    // função 'CREATE' redireciona para a página 'create'
    public function create()
    {
         return view('admin/users/create');
    }
    // função 'STORE' salva os dados no BD
    public function store(StoreUpdateUser $request, User $user)
    {
        $data = $request->validated();
        $user_name = getUserName($data['name']);
        
        $senha = $data['password'];
        // ----------------------------------------------------
        // dd($data);
        // dd($user_name);
        // dd($request);
        // dd($user);
        // ----------------------------------------------------
        $data['user_name'] = $user_name;
        $data['password'] = Hash::make($senha);
        // dd($data);
  
        $user->create($data);
        
        return redirect()->route('usuario.index');

    }
    public function edit(User $user, string|int $id)
    {
        if(!$user = $user->where('id', $id)->first()){
            return back();
        }
        return view('admin/users/edit', compact('user'));
    }

    public function update(StoreUpdateUser $request, User $user, string|int $id)
    {
        // ------------------------------------------------------------------------
        // dd($request);
        if(!$user = $user->where('id', $id)->first()){
            return back();
        }
        // ------------------------------------------------------------------------
        $data = $request->validated();
        // dd($data);
        $page = $request->page;
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }
        else{
            unset($data['password']);
        }
        // dd($data);
        $user->update($data);
        return redirect()->route('usuario.index', ['page' => $request->input('page', 1)]);
    }

    // função 'DESTROY' deleta os dados no BD
    public function destroy(string|int $id){
        if(!$user = User::find($id)){
            return back();
        }
        // dd($user);
        $user->delete();
        return redirect()->route('usuario.index');
    }
}
