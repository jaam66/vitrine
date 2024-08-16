<?php
// ----------------------------------------------------------------------------------------------------------
// DÚVIDAS
// ----------------------------------------------------------------------------------------------------------
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Equipment;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;


//  -> chama os métodos"
class SupportController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $filter = $request->get('filter', '');
        if($filter){
            // --------------------------------------------------------------
            // dd($filter);
            // $supports = Support::where('subject', 'like', "%{$filter}%")
            //                 ->orWhere('body', 'like', "%{$filter}%");
            // --------------------------------------------------------------
            $supports = DB::table('laravel.supports')
                            ->select('u.name', 'e.description', 'supports.*')
                            ->join('laravel.users AS u', 'supports.user_id', '=', 'u.id')
                            ->join('laravel.equipments AS e', 'supports.equipment_id', '=', 'e.id')
                            ->where('subject', 'like', "%{$filter}%")
                            ->orWhere('body', 'like', "%{$filter}%")
                            ->orWhere('u.name', 'like', "%{$filter}%")
                            ->orWhere('e.description', 'like', "%{$filter}%")
                            ->orderBy('id','desc');
        }
        else{
            $supports = DB::table('laravel.supports')
                            ->select('u.name', 'e.description', 'supports.*')
                            ->join('laravel.users AS u', 'supports.equipment_id', '=', 'u.id')
                            ->join('laravel.equipments AS e', 'supports.equipment_id', '=', 'e.id')
                            ->orderBy('created_at','desc');
            // --------------------------------------------------------------
            // dd($supports);
            // --------------------------------------------------------------
        }
        $supports = $supports->paginate(4);
        // ------------------------------------------------------------------
        // dd($supports);
        // ------------------------------------------------------------------
        return view('admin/supports/index', compact('supports'));
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
        // dd($data);
        $support->create($data);
        return redirect()->route('suporte.index');

    }
    // função 'EDIT' redireciona para a página 'edit'
    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        $equipments = Equipment::all();
        return view('admin/supports/edit', compact('support','equipments'));
    }

    // função 'UPDATE' atualiza os dados no BD
    public function update(StoreUpdateSupport $request, Support $support, string|int $id)
    {
        // $support->id = $request->id;
        // $support->sender = $request->sender;
        // $support->equipment_id = $request->equipment_id;
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // dd($support->equipment_id);
        
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        $page = $request->page;
        // $support->save();
        // dd($support);
        $support->update($request->validated());
        // dd($support);
        // return redirect()->route('suporte.index');
        return redirect()->route('suporte.index', ['page' => $request->input('page', 1)]);
    }

    // função 'DESTROY' deleta os dados no BD
    public function destroy(string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }
        // dd($support->id, "deletando ...");
        $support->delete();
        return redirect()->route('suporte.index');
    }
}
