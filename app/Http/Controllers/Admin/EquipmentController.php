<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEquipment;
use App\Models\Equipment;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
    public static function buscaSuporte($id_equipamento){
        // dd($id_equipamento);
        $support = DB::table('supports')->where('equipment_id', $id_equipamento)->value('equipment_id');
        if($support > 0){
            return true;
        }
        return false;
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'INDEX' MOSTRA OS DADOS (INDEX.BLADE.PHP INCLUDE -> CONTENT.BLADE.PHP)
// ----------------------------------------------------------------------
    public function index(Request $request)
    {
        // dd($request);
        $pega = $this->buscaSuporte(3);
        // if($pega === true){
        //     dd($pega);
        // }
        $filter = $request->get('filter', '');
        if($filter){
            $equipments = DB::table('equipments')
                ->select('*')
                ->Where(lower('description'), 'like', lower("%{$filter}%"))
                ->orderBy('description','desc');
        }
        else{
            $equipments = DB::table('laravel.equipments')
                ->select('equipments.*')
                ->orderBy('description','desc');
            // --------------------------------------------------------------
            // dd($equipments);
            // --------------------------------------------------------------
        }
        $supports = Support::all();
        // dd($suport);
        // $equipments['suport']
        $equipments = $equipments->paginate(4);
        // ------------------------------------------------------------------
        // dd($equipments);
        // ------------------------------------------------------------------
        return view('admin/equipments/index', compact('equipments','supports'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'SHOW' MOSTRA OS DADOS (SHOW.BLADE.PHP)
// ----------------------------------------------------------------------
public function show(string|int $id)
{
    // Equipment::find($id);
    // Equipment::where('id', $id)->first();
    // Equipment::where('id', '=', $id)->first(); 
    // Equipment::where('id', '!=', $id)->first(); 
    $equipment = Equipment::find($id);
    if(!$equipment = Equipment::find($id)){
        return back();
    }
    // dd($equipment->equipment_id);
    // dd($equipment->os);
    // dd($equipment);
    return view('admin/equipments/show', compact('equipment'));
}
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'CREATE' REDIRECIONA PARA A PÁGINA 'CREATE.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function create()
    {
        return view('admin/equipments/create');
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'STORE' SALVA (CADASTRA) OS DADOS NO DB
// ----------------------------------------------------------------------
    public function store(StoreUpdateEquipment $request, Equipment $equipment)
    {
        // $os = geraOs();
        $data = $request->validated();
        $data['os'] = geraOs();
        // dd($data);
        $equipment->create($data);
        return redirect()->route('equipamento.index');
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'EDIT' REDIRECIONA PARA A PÁGINA 'EDIT.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function edit(Equipment $equipment, string|int $id)
    {
        if(!$equipment = $equipment->where('id', $id)->first()){
            return back();
        }
        return view('admin/equipments/edit', compact('equipment'));
    }
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'UPDATE' SALVA (ALTERA) OS DADOS NO DB
// ----------------------------------------------------------------------
    public function update(StoreUpdateEquipment $request, Equipment $equipment, string|int $id)
    {
        if(!$equipment = $equipment->where('id', $id)->first()){
            return back();
        }
        $page = $request->page;
        $equipment->update($request->validated());
        return redirect()->route('equipamento.index', ['page' => $request->input('page', 1)]);
    }
    // ----------------------------------------------------------------------
    // ##### FUNÇÃO 'DESTROY' DELETA OS DADOS NO DB
    // ----------------------------------------------------------------------
    public function destroy(string|int $id){
        if(!$equipment = Equipment::find($id)){
            return back();
        }
        // dd($support->id, "deletando ...");
        $equipment->delete();
        return redirect()->route('equipamento.index');
    }
}
