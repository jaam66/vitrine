<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

//  -> chama os métodos"
class SupportController extends Controller
{
    public function list(Request $request)
    {
        $filter = $request->get('filter', '');
        if($filter){
            // --------------------------------------------------------------
            // dd($filter);
            // $supports = Support::where('subject', 'like', "%{$filter}%")
            //                 ->orWhere('body', 'like', "%{$filter}%");
            // --------------------------------------------------------------
            $supports = DB::table('laravel.supports')
                            ->select('u.name', 'supports.*')
                            ->join('laravel.users AS u', 'supports.user_id', '=', 'u.id')
                            ->where('subject', 'like', "%{$filter}%")
                            ->orWhere('body', 'like', "%{$filter}%")
                            ->orWhere('u.name', 'like', "%{$filter}%")
                            ->orderBy('id','desc');
        }
        else{
            $supports = DB::table('laravel.supports')
                            ->select('u.name', 'supports.*')
                            ->join('laravel.users AS u', 'supports.user_id', '=', 'u.id')
                            ->orderBy('id','desc');
            // --------------------------------------------------------------
            // dd($supports);
            // --------------------------------------------------------------
        }
        $supports = $supports->paginate(4);
        // ------------------------------------------------------------------
        // dd($supports);
        // ------------------------------------------------------------------
        return view('admin/supports/list', compact('supports'));
    }

    // função 'SHOW' mostra os dados
    public function show(string|int $id)
    {
        // Support::find($id);
        // Support::where('id', $id)->first();
        // Support::where('id', '=', $id)->first(); 
        // Support::where('id', '!=', $id)->first(); 
        $support = Support::find($id);
        if(!$support = Support::find($id)){
            return back();
        }

        // return view('admin/supports/show', compact('support', 'teste'));
        return view('admin/supports/show', compact('support'));
    }

    // função 'CREATE' redireciona para a página 'create'
    public function create()
    {
         return view('admin/supports/create');
    }   
    // função 'STORE' salva os dados no BD
    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';
  
        $support->create($data);
        
        return redirect()->route('suporte.list');

    }
    // função 'EDIT' redireciona para a página 'edit'
    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        return view('admin/supports/edit', compact('support'));
    }

    // função 'UPDATE' atualiza os dados no BD
    public function update(StoreUpdateSupport $request, Support $support, string|int $id)
    {
        // dd($id, $request->subject);
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();
        $support->update($request->validated());
        
        return redirect()->route('suporte.list');
    }

    // função 'DESTROY' deleta os dados no BD
    public function destroy(string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }
        // dd($support->id, "deletando ...");
        $support->delete();
        return redirect()->route('suporte.list');
    }
}
