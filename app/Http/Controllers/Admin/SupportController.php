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
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'INDEX' MOSTRA OS DADOS (INDEX.BLADE.PHP INCLUDE -> CONTENT.BLADE.PHP)
// ----------------------------------------------------------------------
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
            // $filter = normalize($filter);
            // $filter = lower($filter);
            // dd($filter);
            $supports = DB::table('laravel.supports')
                ->select('e.description', 'supports.*')
                ->join('laravel.equipments AS e', 'supports.equipment_id', '=', 'e.id')
                ->orWhere(lower('sender'), 'like', lower("%{$filter}%"))
                ->orwhere(lower('subject'), 'like', lower("%{$filter}%"))
                ->orWhere(lower('body'), 'like', lower("%{$filter}%"))
                ->orWhere(lower('e.description'), 'like', lower("%{$filter}%"))
                ->orderBy('created_at','desc');
        }
        else{
            $supports = DB::table('laravel.supports')
                ->select('e.description', 'supports.*')
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
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'SHOW' MOSTRA OS DADOS (SHOW.BLADE.PHP)
// ----------------------------------------------------------------------
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
        $equipment = Equipment::find($support->equipment_id);
        // dd($support->equipment_id);
        // dd($support->os);
        // dd($support);
        // dd($equipment);
        return view('admin/supports/show', compact('support','equipment'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'CREATE' REDIRECIONA PARA A PÁGINA 'CREATE.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function create()
    {
        $equipments = Equipment::all();
        // dd($equipments);
        return view('admin/supports/create', compact('equipments'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'STORE' SALVA (CADASTRA) OS DADOS NO DB
// ----------------------------------------------------------------------
    public function store(StoreUpdateSupport $request, Support $support)
    {
        // $os = geraOs();
        $data = $request->validated();
        $data['os'] = geraOs();
        // dd($data);
        $support->create($data);
        return redirect()->route('suporte.index');
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'EDIT' REDIRECIONA PARA A PÁGINA 'EDIT.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function edit(Support $support, string|int $id)
    {
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        $equipments = Equipment::all();
        return view('admin/supports/edit', compact('support','equipments'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'UPDATE' SALVA (ALTERA) OS DADOS NO DB
// ----------------------------------------------------------------------
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
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'DESTROY' DELETA OS DADOS NO DB
// ----------------------------------------------------------------------
    public function destroy(string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }
        // dd($support->id, "deletando ...");
        $support->delete();
        return redirect()->route('suporte.index');
    }
}
