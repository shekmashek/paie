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
        /* echo $request->api_token; */
        $response = $request->request('GET', '/api/user?api_token='.$request->api_token);
        echo $response;
        /* $fonct = new FonctionGenerique();
        $user_id = Auth::user()->id;
         if (Gate::allows('isReferent') or Gate::allows('isReferentSimple')) {
                $id = responsable::where('user_id', Auth::user()->id)->value('id');
                $entreprise = responsable::where('user_id',$user_id)->value('id');
                $refs = DB::select('select *,case when genre_id = 1 then "Femme" when genre_id = 2 then "Homme" end sexe_resp from responsables where id = ?',[$id])[0];
                $entreprise = $this->fonct->findWhereMulitOne("entreprises",["id"],[$refs->entreprise_id]);
                $projets_counts = $fonct->findWhere("groupe_entreprises",["entreprise_id"],[$refs->entreprise_id]);
                $cfp_counts = $fonct->findWhere("demmande_etp_cfp",["demmandeur_etp_id","activiter"],[$refs->entreprise_id,1]);
                $modulesInternes_counts = $fonct->findWhere("modules_interne",["etp_id"],[$refs->entreprise_id]);
                $projetIntra_counts = DB::select('select grp.id from groupes as grp join groupe_entreprises as grp_etp on grp.id = grp_etp.groupe_id join projets as prj on prj.id = grp.projet_id where grp_etp.entreprise_id = ? and prj.type_formation_id = ?',[$refs->entreprise_id, 1]);
                $projetInter_counts = DB::select('select grp.id from groupes as grp join groupe_entreprises as grp_etp on grp.id = grp_etp.groupe_id join projets as prj on prj.id = grp.projet_id where grp_etp.entreprise_id = ? and prj.type_formation_id = ?',[$refs->entreprise_id, 2]);
                $stagiaires_counts = $fonct->findWhere("stagiaires",["entreprise_id"],[$refs->entreprise_id]);
                $chef_departements_counts = $fonct->findWhere("chef_departements",["entreprise_id"],[$refs->entreprise_id]);
            return view('admin.profilResponsables', compact('refs','entreprise','projets_counts','cfp_counts','modulesInternes_counts','projetInter_counts','projetIntra_counts','stagiaires_counts','chef_departements_counts'));
        }
        if (Gate::allows('isSuperAdmin') || Gate::allows('isAdmin')) {
            $refs = DB::select('select *,case when genre_id = 1 then "Femme" when genre_id = 2 then "Homme" end sexe_resp from responsables where id = ?',[$id])[0];
            return view('admin.profilResponsable', compact('refs'));
        } */
    }
    /* public function index($paginations = null)
    {
        $entreprise_id = 0;
        $nb_limit = 10;
        $user_id = Auth::user()->id;
        $piasa = null;
        $employers = [];
        $responsables = [];
        $chefs = [];
        $entreprise_id = $this->fonct->findWhereMulitOne("employers", ["user_id"], [$user_id])->entreprise_id;
        $totale_pag = $this->fonct->getNbrePagination("employers", "id", ["entreprise_id"], ["="], [$entreprise_id], "AND");
        $service = $this->fonct->findWhere("v_departement_service_entreprise", ["entreprise_id"], [$entreprise_id]);
        if ($paginations != null) {
            if ($paginations <= 0) {
                $paginations = 1;
            }
            $piasa = DB::select("SELECT *, SUBSTRING(nom_stagiaire,1,1) AS nom_stg,SUBSTRING(prenom_stagiaire,1,1) AS prenom_stg FROM stagiaires WHERE entreprise_id=? ORDER BY created_at DESC LIMIT " . $nb_limit . " OFFSET " . ($paginations - 1), [$entreprise_id]);
            $resp = DB::select("SELECT *, SUBSTRING(nom_resp,1,1) AS nom_rsp,SUBSTRING(prenom_resp,1,1) AS prenom_rsp,role_users.prioriter FROM responsables,role_users WHERE responsables.user_id = role_users.user_id AND entreprise_id=?  ORDER BY created_at DESC LIMIT " . $nb_limit . " OFFSET " . ($paginations - 1), [$entreprise_id]);
            $sefo = DB::select("SELECT *, SUBSTRING(nom_chef,1,1) AS nom_cf,SUBSTRING(prenom_chef,1,1) AS prenom_cf FROM chef_departements WHERE entreprise_id=? LIMIT " . $nb_limit . " OFFSET " . ($paginations - 1), [$entreprise_id]);

            $pagination = $this->fonct->nb_liste_pagination($totale_pag, $paginations, $nb_limit);
        } else {
            if ($paginations <= 0) {
                $paginations = 1;
            }
            if(Gate::allows('isManager')) {
                $dep =  $this->fonct->findWhereMulitOne("employers", ["user_id"], [$user_id])->departement_entreprises_id;
                $totale_pag = $this->fonct->getNbrePagination("employers", "id", ["entreprise_id","departement_entreprises_id"], ["=","="], [$entreprise_id,$dep], "AND");
                $piasa = DB::select("SELECT *, SUBSTRING(nom_stagiaire,1,1) AS nom_stg,SUBSTRING(prenom_stagiaire,1,1) AS prenom_stg FROM stagiaires WHERE entreprise_id=? and departement_entreprises_id = ?  ORDER BY created_at DESC LIMIT " . $nb_limit . " OFFSET 0", [$entreprise_id,$dep]);
            }
            else  $piasa = DB::select("SELECT *, SUBSTRING(nom_stagiaire,1,1) AS nom_stg,SUBSTRING(prenom_stagiaire,1,1) AS prenom_stg FROM stagiaires WHERE entreprise_id=?  ORDER BY created_at DESC LIMIT " . $nb_limit . " OFFSET 0", [$entreprise_id]);


            $resp = DB::select("SELECT *, SUBSTRING(nom_resp,1,1) AS nom_rsp,SUBSTRING(prenom_resp,1,1) AS prenom_rsp,role_users.prioriter FROM responsables,role_users WHERE responsables.user_id = role_users.user_id AND entreprise_id=?  ORDER BY created_at DESC LIMIT " . $nb_limit . " OFFSET 0", [$entreprise_id]);
            $sefo = DB::select("SELECT *, SUBSTRING(nom_chef,1,1) AS nom_cf,SUBSTRING(prenom_chef,1,1) AS prenom_cf FROM chef_departements WHERE entreprise_id=?  ORDER BY created_at DESC LIMIT " . $nb_limit . " OFFSET 0", [$entreprise_id]);

            $pagination = $this->fonct->nb_liste_pagination($totale_pag, 0, $nb_limit);
        }
        for ($i = 0; $i < count($piasa); $i += 1) {
            if (count($service) > 0) {
                for ($j = 0; $j < count($service); $j += 1) {
                    if ($piasa[$i]->service_id != null && $piasa[$i]->service_id == $service[$j]->service_id) {
                        $piasa[$i]->departement_entreprise_id = $service[$j]->departement_entreprise_id;
                        $piasa[$i]->nom_service = $service[$j]->nom_service;
                        $piasa[$i]->nom_departement = $service[$j]->nom_departement;
                    }
                }
            } else {
                $piasa[$i]->departement_entreprise_id = null;
                $piasa[$i]->nom_service = null;
                $piasa[$i]->nom_departement = null;
            }
            $employers[] = $piasa[$i];
        }
        for ($i = 0; $i < count($resp); $i += 1) {
            if (count($service) > 0) {
                for ($j = 0; $j < count($service); $j += 1) {
                    if ($resp[$i]->service_id != null && $resp[$i]->service_id == $service[$j]->service_id) {
                        $resp[$i]->departement_entreprise_id = $service[$j]->departement_entreprise_id;
                        $resp[$i]->nom_service = $service[$j]->nom_service;
                        $resp[$i]->nom_departement = $service[$j]->nom_departement;
                    }
                }
            } else {
                $resp[$i]->departement_entreprise_id = null;
                $resp[$i]->nom_service = null;
                $resp[$i]->nom_departement = null;
            }
            $responsables[] = $resp[$i];
        }
        $ref = [];
        foreach($employers as $emp){
            $test = $this->fonct->findWhereMulitOne("responsables",["user_id"],[$emp->user_id]);
            if($test!=null) array_push($ref,1);
            if($test==null) array_push($ref,0);
        }
        return view("admin.liste_employer", compact('ref','responsables', 'employers', 'pagination'));
    } */
}
