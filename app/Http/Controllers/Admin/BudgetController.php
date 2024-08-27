<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEquipment;
use App\Models\Equipment;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
// ----------------------------------------------------------------------
// ##### FUNÇÃO 'INDEX' MOSTRA OS DADOS (INDEX.BLADE.PHP INCLUDE -> CONTENT.BLADE.PHP)
// ----------------------------------------------------------------------
    public function index(Request $request)
    {
        // dd($request);
        $filter = $request->get('filter', '');
        if($filter){
            $budgets = DB::table('budgets')
                ->select('*')
                ->Where(lower('arquivo'), 'like', lower("%{$filter}%"))
                ->orderBy('creat_at','desc');
        }
        else{
            $budgets = DB::table('budgets')
                ->select('budgets.*')
                ->orderBy('creat_at','desc');
            // --------------------------------------------------------------
            // dd($budgets);
            // --------------------------------------------------------------
        }
        $budgets = $budgets->paginate(4);
        // ------------------------------------------------------------------
        // dd($equipments);
        // ------------------------------------------------------------------
        return view('admin/budgets/index', compact('budgets'));
    }
}
