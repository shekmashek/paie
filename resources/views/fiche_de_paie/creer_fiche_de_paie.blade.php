@extends('./layouts/admin')
@section('title')
<p class="text_header m-0 mt-1">Creer un Fiche de paie</p>
@endsection

@section('content')
<style>
#tbody td{
    font-size: 12px
}
#tbody th{
    font-size: 15px
}
.sm_col{
    width:70px;
}
.sm_col_taux{
    width:80px;
}
.md_col{
    width:180px;
}
.md_col_type{
    width:150px;
}
.col_min{
    min-width: 100px;
}
</style>
<div class="d-flex mb-3">
    <div class="col-md-3">
        <div class="row">
            <div class="col">
                <label>Date du fiche:</label>
            </div>
            <div class="col">
                <input class="form-control" type="date">
            </div>
        </div>
    </div>
</div>
<div class="d-flex me-3">
        <div class="col-12">
            <table class="table table-md table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col" class="fw-bold" rowspan="2"></th>
                        <th scope="col" class="md_col_type fw-bold" rowspan="2">Type</th>
                        <th scope="col" class="fw-bold" rowspan="2">Retirer</th>
                        <th scope="col" class="fw-bold sm_col" rowspan="2">N°</th>
                        <th scope="col" class="fw-bold" rowspan="2">Désignation</th>
                        <th scope="col" class="fw-bold sm_col" rowspan="2">Nombre</th>
                        <th scope="col" class="fw-bold sm_col" rowspan="2">Unité</th>
                        <th scope="col" class="fw-bold" rowspan="2">Type(Gain/Retenu)</th>
                        <th scope="col" class="fw-bold" rowspan="2">Base</th>
                        <th scope="col" class="fw-bold" colspan="3">Part salarial</th>
                        <th scope="col" class="fw-bold" colspan="2">Part patronal</th>
                    </tr>
                    <tr>
                        <th scope="col" class="fw-bold sm_col_taux">Taux %</th>
                        <th scope="col" class="fw-bold md_col">Gain</th>
                        <th scope="col" class="fw-bold md_col">Retenue</th>
                        <th scope="col" class="fw-bold sm_col_taux">Taux %</th>
                        <th scope="col" class="fw-bold md_col">Retenue</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr>
                        <td colspan="14">Taux Horaire: <span id="taux_horaire"></span></td>
                    </tr>
                    <th id="title_brut" rowspan="24">SALAIRE</th>
                    <th id="title_num" rowspan="13">Salaire Numeraire</th>
                    @foreach ($numeraires as $num)
                    <tr id="salaire_num" class="brut">
                        @if ($num->code!='1000')
                            <td><button type="button" class="btn btn-secondary btn-retirer-h btn-sm"><i class='bx bx-minus' ></i></button></td>
                        @else
                            <td></td>
                        @endif
                        <td><input class="form-control form-control-sm input-code" value="{{$num->code}}" type="hidden" placeholder="code">{{$num->code}}</td>
                        <td><input class="form-control form-control-sm input-Designation" value="{{$num->designation}}" type="hidden" placeholder="Désignation">{{$num->designation}}</td>
                        @if ($num->code=='1000')
                            <td></td>
                        @elseif ($num->code=='2000'|| $num->code=='3000'|| $num->code=='3001')
                            <td class="td-Nombre"><input class="form-control form-control-sm input-Nombre-num" type="number" step="0.01" min="0" value="0" placeholder="Nombre"></td>
                        @else
                            <td class="td-Nombre-h"><input class="form-control form-control-sm input-Nombre-h" type="number" step="0.01" min="0" value="0" placeholder="Nombre"></td>
                        @endif
                        <td>{{$num->unite}}</td>
                        @if ($num->code=='2000' || $num->code=='3001')
                            <td class="td-choix-num">Retenu</td>
                        @else
                            <td class="td-choix-num">Gain</td>
                        @endif
                        @if ($num->code=='1000'|| $num->code=='2000'|| $num->code=='3000'|| $num->code=='3001')
                            @if ($num->code=='1000')
                                <td class="td-salaire-base"><input class="form-control form-control-sm input-salaire-Base" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>
                            @else 
                                <td class="td-Base-num"><input class="form-control form-control-sm input-Base" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>
                            @endif
                        @else
                            <td class="td-Base-auto"></td>
                        @endif
                        @if ($num->code != '1000')
                            <td class="td-Taux-salar-num"><input class="form-control form-control-sm input-Taux-hidden" type="hidden" min="0" value="0" step="0.01" placeholder="Taux %"> <span class="taux">{{$num->taux}}</span>
                                @if($num->taux!=null)
                                    <span>%</span>
                                @else
                                    <input class="form-control form-control-sm input-Taux-salar" type="text" min="0" value="0" step="0.01" placeholder="Taux %">
                                @endif
                            </td>
                        @else
                            <td></td>
                        @endif
                        @if ($num->code=='1000' || $num->code=='3000')
                            <td class="td-Gain-salar-num text-end">{{-- <input class="form-control form-control-sm input-Gain-salar gain_num" type="number" value="0" min="0" value="0" step="0.01" placeholder="Gain"> --}}</td>
                        @elseif ($num->code!='2000' && $num->code!='3001')
                            <td class="td-Gain-h text-end"></td>
                        @else
                            <td></td>
                        @endif
                        @if ($num->code=='2000'|| $num->code=='3001')
                            <td class="td-Retenue-salar-num text-end">{{-- <input class="form-control form-control-sm input-Retenue-salar retenu_num" type="number" min="0" value="0" step="0.01" placeholder="Retenue"> --}}</td>
                        @else
                            <td></td>
                        @endif
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                    <tr class="table-light">
                        <td colspan="9" class="text-end">Sous total Numeraires</td>
                        <td class="text-end soustotal_gain_num"></td>
                        <td id="soustotal_retenu_num" class="text-end"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <th id="title_pi" rowspan="4">
                        Primes et Indemnités <br>
                        <button type="button" id="btn-ajout-num" class="btn btn-secondary btn-sm"><i class='bx bx-plus' ></i></button>
                    </th>
                    @foreach ($primes as $pr)
                    <tr id="salaire_pi" class="brut">
                        <td><button type="button" class="btn btn-secondary btn-sm btn-retirer-num" style="width:20px,height:20px"><i class='bx bx-minus' ></i></button></td>
                        <td>
                            <input class="form-control form-control-sm input-code" type="hidden" placeholder="code">{{$pr->code}}
                        </td>
                        <td><input class="form-control form-control-sm input-Designation" type="hidden" placeholder="Désignation">{{$pr->designation}}</td>
                        <td class="td-Nombre-pi"><input class="form-control form-control-sm input-Nombre-pi" type="number" min="0" value="0" placeholder="Nombre"></td>
                        <td></td>
                        <td class="td-choix-pi">Gain</td>
                        <td class="td-Base-pi"><input class="form-control form-control-sm input-Base-pi" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>
                        <td class="td-Taux-salar-pi">{{-- <input class="form-control form-control-sm input-Taux-salar" type="hidden" min="0" value="0" step="0.01" placeholder="Taux %"> --}}</td>
                        <td class="td-Gain-salar-pi text-end">{{-- <input class="form-control form-control-sm input-Gain-salar " type="hidden" min="0" value="0" step="0.01" placeholder="Gain"> --}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                    @endforeach
                    <tr id="sous_t_pi" class="table-light">
                        <td colspan="9" class="text-end">Sous total Primes et Indemnités</td>
                        <td class="text-end soustotal_gain_pi"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <th id="title_avn" rowspan="4">
                        Avantage en nature <br>
                        <button type="button" id="btn-ajout-avn" class="btn btn-secondary btn-sm"><i class='bx bx-plus' ></i></button>
                    </th>
                    @foreach ($avantages as $av)
                    <tr id="salaire_avn" class="brut">
                        <td><button type="button" class="btn btn-secondary btn-sm btn-retirer-avn" style="width:20px,height:20px"><i class='bx bx-minus' ></i></button></td>
                        <td><input class="form-control form-control-sm input-code-avn" value="{{$av->code}}" type="hidden" placeholder="code">{{$av->code}}</td>
                        <td><input class="form-control form-control-sm input-Designation-avn" value="{{$av->designation}}" type="hidden" placeholder="Désignation">{{$av->designation}}</td>
                        <td class="td-Nombre-avn"><input class="form-control form-control-sm input-Nombre-avn" type="number" min="0" value="0" placeholder="Nombre"></td>
                        <td></td>
                        <td class="td-choix">Gain</td>
                        <td class="td-Base-avn"><input class="form-control form-control-sm input-Base-avn" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>
                        <td class="td-Taux-salar-avn text-end">{{-- <input class="form-control form-control-sm input-Taux-salar-avn" type="number" min="0" value="0" step="0.01" placeholder="Taux %"> --}}</td>
                        <td class="td-Gain-salar-avn text-end">{{-- <input class="form-control form-control-sm input-Gain-salar-avn gain_avn" type="hidden" min="0" value="0" step="0.01" placeholder="Gain"> --}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                    <tr id="sous_t_avn" class="table-light">
                        <td colspan="9" class="text-end">Sous total Avantage en nature</td>
                        <td class="text-end" id="soustotal_gain_avn"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="total_brut" class="table-secondary">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL BRUT</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="total_gain_brut"></td>
                        <td id="total_retenu_brut"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                    <th id="title_cotisation" rowspan="4">COTISATION ET SOCIAL</th>
                    @foreach ($desigations_sociale as $ds)
                        <tr id="cotisation">
                            <td></td>
                            <td></td>
                            <td>{{$ds->code}}</td>
                            <td>{{$ds->designation}}</td>
                            <td></td>
                            <td></td>
                            <td class="sal_avant_cotisation"></td>
                            <td>@if ($ds->taux_part_salarial>0)
                                <span  class="taux-cot-sal">{{$ds->taux_part_salarial}}</span><span>%</span>
                            @endif</td>
                            <td></td>
                            <td></td>
                            <td class="retenu-cot-sal text-end"></td>
                            <td>@if ($ds->taux_part_patronal>0)
                                <span  class="taux-cot-patr">{{$ds->taux_part_patronal}}</span><span>%</span>
                            @endif</td>
                            <td class="retenu-cot-patr text-end"></td>
                        </tr>
                    @endforeach
                    <tr class="table-secondary">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL COTISATION</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-end" id="total_cotisation"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <th id="title_non_soumis" rowspan="2">
                        NON SOUMIS <br>
                        <button type="button" id="btn-ajout" class="btn btn-secondary btn-sm"><i class='bx bx-plus'></i></button>
                    </th>
                    <tr id="non_soumis">
                        <td></td>
                        <td><button type="button" class="btn btn-secondary btn-sm btn-retirer" style="width:20px,height:20px"><i class='bx bx-minus' ></i></button></td>
                        <td><input class="form-control form-control-sm input-code" type="text" placeholder="code"></td>
                        <td><input class="form-control form-control-sm input-Designation" type="text" placeholder="Désignation"></td>
                        <td class="td-Nombre"><input class="form-control form-control-sm input-Nombre" type="number" min="0" value="0" placeholder="Nombre"></td>
                        <td class="td-unité"><input class="form-control form-control-sm" type="text" placeholder="Unité"></td>
                        <td class="td-choix">
                            <select class="form-select choix">;
                                <option selected>gain/retenu</option>;
                                <option value="Gain">Gain</option>;
                                <option value="Retenu">Retenu</option>;
                            </select>
                        </td>
                        <td class="td-Base"><input class="form-control form-control-sm input-Base" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>
                        <td class="td-Taux-salar"><input class="form-control form-control-sm input-Taux-salar" type="number" min="0" value="0" step="0.01" placeholder="Taux %"></td>
                        <td class="td-Gain-salar text-end"><input class="form-control form-control-sm input-Gain-salar" type="number" value="0" min="0" value="0" step="0.01" placeholder="Gain"></td>
                        <td class="td-Retenue-salar text-end"><input class="form-control form-control-sm input-Retenue-salar" type="number" min="0" value="0" step="0.01" placeholder="Retenue"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="total_non_soumis" class="table-secondary">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL NON SOUMIS</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                        <th rowspan="6">CALCUL IRSA</th>
                        <td rowspan="6"></td>
                        <td rowspan="6"></td>
                        <td rowspan="6">{{$irsa->code}}</td>
                        <td rowspan="6">{{$irsa->designation}}</td>
                        <td rowspan="6"></td>
                        @php $i=1; @endphp
                        @foreach ($taux_irsa as $pti)
                            <tr id="irsa">
                                <td>tranche {{$i++}}</td>
                                <td class="border-end border-top min-irsa">{{$pti->salaire_min}}</td>
                                <td class="border-start border-top max-irsa">@if ($pti->salaire_max!=null){{$pti->salaire_max}}@else Plus @endif</td>
                                <td class="td-taux-irsa"><span>{{$pti->pourcentage}}</span>%</td>
                                <td></td>
                                <td class="retenu-sal-irsa"></td>
                                <td></td>
                                <td class="retenu-patr-irsa"></td>
                            </tr>
                        @endforeach
                    <tr id="total_cotisation" class="table-secondary">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL IRSA</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="total_retenu_sal_irsa"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="total_tout" class="table-info">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<div class="d-flex">
        <div class="col-3">
            <table class="table table-sm table-bordered border-primary">
                <tbody>
                    <tr>
                        <td>Salaire brut avant cotisation</td>
                        <td class="text-end col_min" id="sal_avant_cotisation"></td>
                    </tr>
                    <tr>
                        <td>Avantage en nature</td>
                        <td class="text-end" id="avantage_nature"></td>
                    </tr>
                    <tr>
                        <td>salaire brute imposable</td>
                        <td class="text-end" id="sal_brute_imposable"></td>
                    </tr>
                    <tr>
                        <th class="text-end fw-bold">Net à payer</th>
                        <th class="text-end fw-bold"></th>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<div class="d-flex justify-content-start">
    <button type="submit" class="btn btn-primary mb-3">Créer le fiche de paie</button>
</div>
<script src="{{asset('assets/js/creer_fiche.js')}}"></script>
@endsection