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

class UserController extends Controller
{
    public function index(Request $request)
    {
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
    // função 'CREATE' redireciona para a página 'create'
    public function create()
    {
         return view('admin/users/create');
    }
    // função 'STORE' salva os dados no BD
    public function store(StoreUpdateUser $request, User $user)
    {
        $data = $request->validated();

        // dd($user);
        $data['status'] = 'a';
  
        $user->create($data);
        
        return redirect()->route('usuario.index');

    }
}
