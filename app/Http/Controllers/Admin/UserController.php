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
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'INDEX' MOSTRA OS DADOS (INDEX.BLADE.PHP INCLUDE -> CONTENT.BLADE.PHP)
// ----------------------------------------------------------------------
    public function index(Request $request)
    {
        // dd($request);
        $filter = $request->get('filter', '');
        if($filter){
            $users = DB::table('laravel.users')
                            ->select('users.*')
                            ->where('name', 'like', "%{$filter}%")
                            ->orwhere('email', 'like', "%{$filter}%")
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
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'SHOW' MOSTRA OS DADOS (SHOW.BLADE.PHP)
// ----------------------------------------------------------------------
    public function show(string|int $id)
    {
        $user = user::find($id);
        if(!$user = User::find($id)){
            return back();
        }

        return view('admin/users/show', compact('user'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'CREATE' REDIRECIONA PARA A PÁGINA 'CREATE.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function create()
    {
         return view('admin/users/create');
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'STORE' SALVA (CADASTRA) OS DADOS NO DB
// ----------------------------------------------------------------------
    public function store(StoreUpdateUser $request, User $user)
    {
        // ----------------------------------------------------
        // ----------------------------------------------------
        $data = $request->validated();
        // dd($data);
        // ----------------------------------------------------
        // ----------------------------------------------------
        unset($data['password_confirm']);
        // ----------------------------------------------------
        // ----------------------------------------------------
        $user_name = getUserName($data['name']);
        $data['user_name'] = $user_name;
        // ----------------------------------------------------
        // ----------------------------------------------------
        $senha = $data['password'];
        $data['password'] = Hash::make($senha);
        // ----------------------------------------------------
        // dd($user_name);
        // dd($request);
        // dd($user);
        // dd($data);
        // ----------------------------------------------------
        $user->create($data);
        // ----------------------------------------------------
        return redirect()->route('usuario.index');
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'EDIT' REDIRECIONA PARA A PÁGINA 'EDIT.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function edit(User $user, string|int $id)
    {
        if(!$user = $user->where('id', $id)->first()){
            return back();
        }
        return view('admin/users/edit', compact('user'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'UPDATE' SALVA (ALTERA) OS DADOS NO DB
// ----------------------------------------------------------------------
    public function update(StoreUpdateUser $request, User $user, string|int $id)
    {
        // ------------------------------------------------------------------------
        // dd($request);
        if(!$user = $user->where('id', $id)->first()){
            return back();
        }
        // ------------------------------------------------------------------------
        $data = $request->validated();
        // ------------------------------------------------------------------------
        // dd($data);
        // ------------------------------------------------------------------------
        $page = $request->page;
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }
        else{
            unset($data['password']);
        }
        // ------------------------------------------------------------------------
        // dd($data);
        // ------------------------------------------------------------------------
        $user->update($data);
        return redirect()->route('usuario.index', ['page' => $request->input('page', 1)]);
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'DESTROY' DELETA OS DADOS NO DB
// ----------------------------------------------------------------------
    public function destroy(string|int $id){
        if(!$user = User::find($id)){
            return back();
        }
        // dd($user);
        $user->delete();
        return redirect()->route('usuario.index');
    }
}
