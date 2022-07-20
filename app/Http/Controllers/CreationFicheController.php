<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FonctionGenerique;
class CreationFicheController extends Controller
{
    public function __construct()
    {
        $this->fonct = new FonctionGenerique();
    }

    public function get_types(Request $request){
        $type_desigation = DB::table('paie_v_type_designation')
                            ->where('type_designation', 'like', '%'.$request->input_type.'%')
                            ->limit(5)
                            ->get();
        return response()->json($type_desigation);
    }

    public function designations_code(Request $request){
        $desigations = DB::table('paie_v_type_designation')
                            ->where('code', 'like', '%'.$request->input_designation.'%')
                            ->limit(5)
                            ->get();
        return response()->json($desigations);
    }
    public function designations(Request $request){
        $desigations = DB::table('paie_v_type_designation')
                            ->where('designation', 'like', '%'.$request->input_designation.'%')
                            ->limit(5)
                            ->get();
        return response()->json($desigations);
    }
}
