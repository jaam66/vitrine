<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEquipment;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'INDEX' MOSTRA OS DADOS (INDEX.BLADE.PHP INCLUDE -> CONTENT.BLADE.PHP)
// ----------------------------------------------------------------------
    public function index(Request $request)
    {
        // dd($request);
        $filter = $request->get('filter', '');
        if($filter){
            $equipments = DB::table('laravel.Equipments')
                ->select('equipments.*')
                ->orWhere(lower('description'), 'like', lower("%{$filter}%"))
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
        $equipments = $equipments->paginate(4);
        // ------------------------------------------------------------------
        // dd($equipments);
        // ------------------------------------------------------------------
        return view('admin/equipments/index', compact('equipments'));
    }

    // ----------------------------------------------------------------------
// ##### FUNÇÃO 'CREATE' REDIRECIONA PARA A PÁGINA 'CREATE.BLADE.PHP INCLUDE -> FORM.BLADE.PHP'
// ----------------------------------------------------------------------
    public function create()
    {
        return view('admin/supports/create');
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
        return redirect()->route('suporte.index');
    }

}
