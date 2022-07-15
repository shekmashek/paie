<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FonctionGenerique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth:api');
        $this->middleware(function ($request, $next) {

            dd($request->user());
            /* if (Auth::user()->exists == false) return redirect()->route('sign-in'); */
            /* return $next($request); */
        /* }); */
        $this->fonct = new FonctionGenerique();
    }
    public function index(Request $request)
    {
        $desigations_sociale = DB::table('paie_cotisations')->get();
        $numeraires = DB::table('paie_salaire_numeraires')->get();
        $avantages = DB::table('paie_avantage_en_natures')->get();
        $primes = DB::table('paie_prime_indemnites')->get();
        $irsa = DB::table('paie_irsa')->get()->first();
        $taux_irsa = DB::table('paie_taux_irsa')->get();
        return view('fiche_de_paie.creer_fiche_de_paie', compact('desigations_sociale','numeraires','avantages','primes','irsa','taux_irsa'));
        
    }
    
}
