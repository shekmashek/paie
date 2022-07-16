$( function() {
    /* ajout ligne brut num*/
    $('#tbody').delegate(".btn-retirer-h","click", function(e) {
        $(this).parent().parent().remove();
        var nombre_brut = $('#title_brut').attr('rowspan');
        var nombre_snum = $('#title_num').attr('rowspan');
        var nb_brut = parseInt(nombre_brut)-1;
        var nb_sum = parseInt(nombre_snum)-1;
        if(nb_brut<11){
            nb_brut = 11;
            nb_sum = 10;
        }
        $('#title_brut').attr('rowspan',nb_brut);
        $('#title_num').attr('rowspan',nb_sum);
    });
    $("#btn-ajout-num").on("click", function(e) {
        e.preventDefault();
        var content ='<tr class="brut s_num">';
        content +='<td><button type="button" class="btn btn-secondary btn-sm btn-retirer-num" style="width:20px,height:20px"><i class="bx bx-minus" ></i></button></td>';
        content +='<td><input class="form-control form-control-sm input-code" type="text" placeholder="code"></td>';
        content +='<td><input class="form-control form-control-sm input-Designation" type="text" placeholder="Désignation"></td>';
        content +='<td class="td-Nombre-pi"><input class="form-control form-control-sm input-Nombre-pi" type="number" min="0" value="0" placeholder="Nombre"></td>';
        content +='<td class="td-unité-pi"><input class="form-control form-control-sm" type="text" placeholder="Unité"></td>';
        content +='<td class="td-choix">Gain</td>';
        content +='<td class="td-Base-pi"><input class="form-control form-control-sm input-Base-pi" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>';
        content +='<td class="td-Taux-salar-pi"></td>';
        content +='<td class="td-Gain-salar-pi text-end"><input class="form-control form-control-sm input-th-hidden" type="hidden" min="0" value="0" step="0.01"><span class="Gain-salar-pi"></span></td>';
        content +='<td></td>';
        content +='<td></td><td></td></tr>';
        $(content).insertBefore( "#sous_t_pi" );
        var nombre_brut = $('#title_brut').attr('rowspan');
        var nombre_snum = $('#title_pi').attr('rowspan');
        $('#title_brut').attr('rowspan',parseInt(nombre_brut)+1);
        $('#title_pi').attr('rowspan',parseInt(nombre_snum)+1);
    });
    /* retirer ligne brut num*/
    $('#tbody').delegate(".btn-retirer-num","click", function(e) {
       /*  $('#tbody .s_num:last').remove(); */
        /* var nombre_brut = $('.brut').length;
        var nombre_snum = $('.s_num').length;
        $('#title_brut').attr('rowspan',nombre_brut);
        $('#title_num').attr('rowspan',nombre_snum+1); */
        $(this).parent().parent().remove();
        var nombre_brut = $('#title_brut').attr('rowspan');
        var nombre_snum = $('#title_pi').attr('rowspan');
        var nb_brut = parseInt(nombre_brut)-1;
        var nb_sum = parseInt(nombre_snum)-1;
        if(nb_brut<11){
            nb_brut = 11;
            nb_sum = 10;
        }
        $('#title_brut').attr('rowspan',nb_brut);
        $('#title_pi').attr('rowspan',nb_sum);
    });

    /* ajout ligne brut avn */
    $("#btn-ajout-avn").on("click", function(e) {
        e.preventDefault();
        var content ='<tr class="brut s_avn">';
        content +='<td><button type="button" class="btn btn-secondary btn-sm btn-retirer-avn" style="width:20px,height:20px"><i class="bx bx-minus" ></i></button></td>';
        content +='<td><input class="form-control form-control-sm input-code-avn" type="text" placeholder="code"></td>';
        content +='<td><input class="form-control form-control-sm input-Designation-avn" type="text" placeholder="Désignation"></td>';
        content +='<td class="td-Nombre-avn"><input class="form-control form-control-sm input-Nombre-avn" type="number" min="0" value="0" placeholder="Nombre"></td>';
        content +='<td class="td-unité-avn"><input class="form-control form-control-sm" type="text" placeholder="Unité"></td>';
        content +='<td class="td-choix">Gain</option></td>';
        content +='<td class="td-Base-avn"><input class="form-control form-control-sm input-Base-avn" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>';
        content +='<td class="td-Taux-salar-avn"><input class="form-control form-control-sm input-hidden" type="hidden" min="0" value="0" step="0.01"><span class="Taux-salar-avn"></span></td>';
        content +='<td class="td-Gain-salar-avn text-end"><input class="form-control form-control-sm input-hidden" type="hidden" min="0" value="0" step="0.01"><span class="Gain-salar-avn"></span></td>';
        content +='<td></td>';
        content +='<td></td>';
        content +='<td></td>';
        content +='</tr>';
        $(content).insertBefore( "#sous_t_avn" );
        /* var nombre_brut = $('.brut').length; */
        var nombre_savn = $('#title_avn').attr('rowspan');
        /* $('#title_brut').attr('rowspan',nombre_brut); */
        var nombre_brut = $('#title_brut').attr('rowspan');
        $('#title_brut').attr('rowspan',parseInt(nombre_brut)+1);
        $('#title_avn').attr('rowspan',parseInt(nombre_savn)+1);
    });
    /* retirer ligne brut avn*/
    $('#tbody').delegate(".btn-retirer-avn","click", function(e) {
        $(this).parent().parent().remove();
        /* $('#tbody .s_avn:last').remove(); */
        /* var nombre_brut = $('.brut').length; */
        var nombre_savn = $('#title_avn').attr('rowspan');
        /* $('#title_brut').attr('rowspan',nombre_brut); */
        var nombre_brut = $('#title_brut').attr('rowspan');

        var nb_brut = parseInt(nombre_brut)-1;
        if(nb_brut<11){
            nb_brut = 11;
        }
        $('#title_avn').attr('rowspan',parseInt(nombre_savn)-1);
        $('#title_brut').attr('rowspan', nb_brut);
    });

    /* ajouter ligne non soumis */
    $("#btn-ajout").on("click", function(e) {
        e.preventDefault();
        var content ='<tr class="non-soumis">';
        content+='<td></td><td><button type="button" class="btn btn-secondary btn-sm btn-retirer" style="width:20px,height:20px"><i class="bx bx-minus" ></i></button></td>';
        content +='<td><input class="form-control form-control-sm input-code" type="text" placeholder="code"></td>';
        content +='<td><input class="form-control form-control-sm input-Designation" type="text" placeholder="Désignation"></td>';
        content +='<td class="td-Nombre"><input class="form-control form-control-sm input-Nombre" type="number" min="0" value="0" placeholder="Nombre"></td>';
        content +='<td class="td-unité"><input class="form-control form-control-sm" type="text" placeholder="Unité"></td>';
        content +='<td class="td-choix"><select class="form-select choix">';
            content +='<option selected>gain/retenu</option>';
            content +='<option value="Gain">Gain</option>';
            content +='<option value="Retenu">Retenu</option>';
        content +='</select></td>';
        content +='<td class="td-Base"><input class="form-control form-control-sm input-Base" type="number" min="0" value="0" step="0.01" placeholder="Base"></td>';
        content +='<td class="td-Taux-salar"><input class="form-control form-control-sm input-Taux-salar" type="number" min="0" value="0" step="0.01" placeholder="Taux %"></td>';
        content +='<td class="td-Gain-salar text-end"><input class="form-control form-control-sm input-Gain-salar" type="number" value="0" min="0" value="0" step="0.01" placeholder="Gain"><span class="Gain-salar"></span></td>';
        content +='<td class="td-Retenue-salar text-end"><input class="form-control form-control-sm input-Retenue-salar" type="number" min="0" value="0" step="0.01" placeholder="Retenue"><span class="Retenue-salar"></span></td>';
        content +='<td></td>';
        content +='<td></td>';
        content +='</tr>';
        $(content).insertBefore( "#total_non_soumis");
        var nombre_non_soumis = $('#title_non_soumis').attr('rowspan');
        $('#title_non_soumis').attr('rowspan',parseInt(nombre_non_soumis)+1);
    });

    /* retirer ligne brut non soumis */
    $('#tbody').delegate(".btn-retirer","click", function(e) {
        $(this).parent().parent().remove();
        /* $('#tbody .non-soumis:last').remove(); */
        var nombre_non_soumis = $('#title_non_soumis').attr('rowspan');
        $('#title_non_soumis').attr('rowspan',parseInt(nombre_non_soumis)-1);
    });
});


$( function() {
    /* input type */
    $('#tbody').delegate('.input-type','input', function(e){
        var input = $(this);
        $(this).autocomplete({
            source: function(request, response) {
                var inputval = input.val();
                $.ajax({
                    type: "get",
                    url: "get_types",
                    data: {
                        input_type: inputval,
                    },
                    dataType: 'json',
                    success: function(data) {
                        response($.map( data, function(item) {
                            return {
                                label: item.type_designation,
                                value: item.type_designation,
                            };
                        }));
                    },
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.value);
            }
        });
    });

    /* input code */
    $('#tbody').delegate('.input-code','input', function(e){
        var input = $(this);
        $(this).autocomplete({
            source: function(request, response) {
                var inputval = input.val();
                $.ajax({
                    type: "get",
                    url: "get_designations_code",
                    data: {
                        input_designation: inputval,
                    },
                    dataType: 'json',
                    success: function(data) {
                        response($.map( data, function(item) {
                            return {
                                label: item.code,
                                code: item.code,
                                designation:item.designation,
                                type: item.type_designation,
                            };
                        }));
                    },
                });
            },
            select: function(event, ui) {
                $(this).val(ui.item.code);
                var designation = $(this).parent().next().children();
                var type = $(this).parent().prev().children();
                designation.val(ui.item.designation);
                type.val(ui.item.type);
            }
        });
    });
    /* input designation */
    $('#tbody').delegate('.input-Designation','input', function(e){
        var input = $(this);
        $(this).autocomplete({
            source: function(request, response) {
                var inputval = input.val();
                $.ajax({
                    type: "get",
                    url: "get_designations",
                    data: {
                        input_designation: inputval,
                    },
                    dataType: 'json',
                    success: function(data) {
                        response($.map( data, function(item) {
                            return {
                                label: item.designation,
                                code: item.code,
                                designation:item.designation,
                                type: item.type_designation,
                            };
                        }));
                    },
                });
            },
            select: function(event, ui) {
                $(this).val( ui.item.designation);
                var code = $(this).parent().prev().children();
                var type = $(this).parent().prev().prev().children();
                code.val(ui.item.code);
                type.val(ui.item.type);
            }
        });
    });
    
});
$( function() {
    /* Calcule taux horaire */
    $('.input-salaire-Base').on("input", function(e) {
        var base = $(this).val();
        $(this).parent().parent().children('.td-Gain-salar-num').children('.Gain-salar-num').html(base);
        $(this).parent().parent().children('.td-Gain-salar-num').children('.Gain-salar-num').prev().val(base);
        var taux_horaire = calul_taux_horaire(base);
        $('#taux_horaire').html(taux_horaire);
        $('.td-Base-auto').html(taux_horaire);
        $(".input-Nombre-h").each(function( index ) {
            var nombre= $(this).val();
            var choix = $(this).parent().parent().children('.td-choix-num').html();
            var taux = $(this).parent().parent().children('.td-Taux-salar-num').children('.taux').html();
            var gain_ou_retenu = calcul_heure(nombre,taux);
            if(isNaN(gain_ou_retenu)){
                gain_ou_retenu=0.00;
            }
            if(choix == 'Gain'){
                $(this).parent().parent().children('.td-Gain-h').children('.Gain-h').html(gain_ou_retenu);
                $(this).parent().parent().children('.td-Gain-h').children('.Gain-h').prev().val(gain_ou_retenu);
                calcul_salaire_avant_cotisation();
                calcul_retenu_cotisation();
                calcul_retenu_cotisation_patr();
                calcul_total_cotisation();
                calcul_brute_avant_cotisation();
                calcul_tranche_irsa();
                calcul_total_irsa();
            }
            var total_gain_numeraire = calcul_total_gain_numeraire();
            $('.soustotal_gain_num').html(total_gain_numeraire);
        });
        
    });
/* calcule gain et retenu numeraire */
    $('#tbody').delegate('.input-Nombre-h','input', function(e){
        var nombre= $(this).val();
        var choix = $(this).parent().parent().children('.td-choix-num').html();
        var taux = $(this).parent().parent().children('.td-Taux-salar-num').children('.taux').html();
        var gain_ou_retenu = calcul_heure(nombre,taux);
        if(isNaN(gain_ou_retenu)){
            gain_ou_retenu=0.00;
        }
        if(choix == 'Gain'){
            $(this).parent().parent().children('.td-Gain-h').children('.Gain-h').html(gain_ou_retenu);
            var total_gain_numeraire = calcul_total_gain_numeraire();
            $('.soustotal_gain_num').html(total_gain_numeraire);
            calcul_salaire_avant_cotisation();
            calcul_retenu_cotisation();
            calcul_retenu_cotisation_patr();
            calcul_total_cotisation();
            calcul_brute_avant_cotisation();
            calcul_tranche_irsa();
            calcul_total_irsa();
        }
    });
/* calcule gain et retenu autre */
    /* nombre */
    $('#tbody').delegate('.input-Nombre-num','input', function(e){
        var nombre= $(this).val();
        var choix = $(this).parent().parent().children('.td-choix-num').html();
        var base = $(this).parent().parent().children('.td-Base-num').children().val();
        var input_taux = $(this).parent().parent().children('.td-Taux-salar-num').children('.input-Taux-salar').val();
        if(input_taux==0){
            input_taux = 100;
        }
        var gain_ou_retenu = calcul_autre_num(nombre,base,input_taux);
        if(choix == 'Gain'){
            $(this).parent().parent().children('.td-Gain-salar-num').children('.Gain-salar-num').html(gain_ou_retenu);
            var total_gain_numeraire = calcul_total_gain_numeraire();
            $('.soustotal_gain_num').html(total_gain_numeraire);
            calcul_salaire_avant_cotisation();
            calcul_retenu_cotisation();
            calcul_retenu_cotisation_patr();
            calcul_total_cotisation();
            calcul_brute_avant_cotisation();
            calcul_tranche_irsa();
            calcul_total_irsa();
        }else if(choix == 'Retenu'){
            $(this).parent().parent().children('.td-Retenue-salar-num').children('.Retenue-salar-num').html(gain_ou_retenu);
            var calcul_retenu_numeraire = calcul_total_retenu_numeraire();
            $('#soustotal_retenu_num').html(calcul_retenu_numeraire);
        }
    });
    /* base */
    $('#tbody').delegate('.input-Base','input', function(e){
        var base= $(this).val();
        var choix = $(this).parent().parent().children('.td-choix-num').html();
        var nombre = $(this).parent().parent().children('.td-Nombre').children().val();
        var input_taux = $(this).parent().parent().children('.td-Taux-salar-num').children('.input-Taux-salar').val();
        if(input_taux==0){
            input_taux = 100;
        }
        var gain_ou_retenu = calcul_autre_num(nombre,base,input_taux);
        if(choix == 'Gain'){
            $(this).parent().parent().children('.td-Gain-salar-num').children('.Gain-salar-num').html(gain_ou_retenu);
            var total_gain_numeraire = calcul_total_gain_numeraire();
            $('.soustotal_gain_num').html(total_gain_numeraire);
            calcul_salaire_avant_cotisation();
            calcul_retenu_cotisation();
            calcul_retenu_cotisation_patr();
            calcul_total_cotisation();
            calcul_brute_avant_cotisation();
            calcul_tranche_irsa();
            calcul_total_irsa();
        }else if(choix == 'Retenu'){
            $(this).parent().parent().children('.td-Retenue-salar-num').children('.Retenue-salar-num').html(gain_ou_retenu);
            var calcul_retenu_numeraire = calcul_total_retenu_numeraire();
            $('#soustotal_retenu_num').html(calcul_retenu_numeraire);
        }
    });

    /* taux */
    $('#tbody').delegate('.input-Taux-salar','input', function(e){
        var input_taux= $(this).val();
        var base= $(this).val();
        var choix = $(this).parent().parent().children('.td-choix-num').html();
        var nombre = $(this).parent().parent().children('.td-Nombre').children().val();
        var base = $(this).parent().parent().children('.td-Base-num').children().val();
        if(input_taux==0){
            input_taux = 100;
        }
        var gain_ou_retenu = calcul_autre_num(nombre,base,input_taux);
        if(choix == 'Gain'){
            $(this).parent().parent().children('.td-Gain-salar-num').children('.Gain-salar-num').html(gain_ou_retenu);
            var total_gain_numeraire = calcul_total_gain_numeraire();
            $('.soustotal_gain_num').html(total_gain_numeraire);
            calcul_salaire_avant_cotisation();
            calcul_retenu_cotisation();
            calcul_retenu_cotisation_patr();
            calcul_total_cotisation();
            calcul_brute_avant_cotisation();
            calcul_tranche_irsa();
            calcul_total_irsa();
        }else if(choix == 'Retenu'){
            $(this).parent().parent().children('.td-Retenue-salar-num').children('.Retenue-salar-num').html(gain_ou_retenu);
            var calcul_retenu_numeraire = calcul_total_retenu_numeraire();
            $('#soustotal_retenu_num').html(calcul_retenu_numeraire);
        }
    });
/* /calcule gain et retenu autre */

/* calcule gain prime et indemnite */
    /* nombre */
    $('#tbody').delegate('.input-Nombre-pi','input', function(e){
        var nombre= $(this).val();
        var base = $(this).parent().parent().children('.td-Base-pi').children().val();
        var gain_ou_retenu = calcul_autre_pi(nombre,base);
        $(this).parent().parent().children('.td-Gain-salar-pi').children('.Gain-salar-pi').html(gain_ou_retenu);
        var total_gain_pi = calcul_total_gain_pi();
        calcul_salaire_avant_cotisation();
        $('.soustotal_gain_pi').html(total_gain_pi);
        calcul_retenu_cotisation();
        calcul_retenu_cotisation_patr();
        calcul_total_cotisation();
        calcul_brute_avant_cotisation();
        calcul_tranche_irsa();
        calcul_total_irsa();
    });
    /* base */
    $('#tbody').delegate('.input-Base-pi','input', function(e){
        var base= $(this).val();
        var nombre = $(this).parent().parent().children('.td-Nombre-pi').children().val();
        var gain_ou_retenu = calcul_autre_pi(nombre,base);
        $(this).parent().parent().children('.td-Gain-salar-pi').children('.Gain-salar-pi').html(gain_ou_retenu);
        var total_gain_pi = calcul_total_gain_pi();
        $('.soustotal_gain_pi').html(total_gain_pi);
        calcul_salaire_avant_cotisation();
        calcul_retenu_cotisation();
        calcul_retenu_cotisation_patr();
        calcul_total_cotisation();
        calcul_brute_avant_cotisation();
        calcul_tranche_irsa();
        calcul_total_irsa();
    });
/* /calcule gain avantage en nature*/
    /* nombre */
    $('#tbody').delegate('.input-Nombre-avn','input', function(e){
        var nombre= $(this).val();
        var base = $(this).parent().parent().children('.td-Base-avn').children().val();
        var gain_ou_retenu = calcul_autre_pi(nombre,base);
        $(this).parent().parent().children('.td-Gain-salar-avn').children('.Gain-salar-avn').html(gain_ou_retenu);
        var total_gain_avn = calcul_total_gain_avn();
        $('#soustotal_gain_avn').html(total_gain_avn);
        calcul_salaire_avant_cotisation();
        calcul_retenu_cotisation();
        calcul_retenu_cotisation_patr();
        calcul_total_cotisation();
        calcul_tranche_irsa();
        calcul_total_irsa();
    });
    /* base */
    $('#tbody').delegate('.input-Base-avn','input', function(e){
        var base= $(this).val();
        var nombre = $(this).parent().parent().children('.td-Nombre-avn').children().val();
        var gain_ou_retenu = calcul_autre_pi(nombre,base);
        $(this).parent().parent().children('.td-Gain-salar-avn').children('.Gain-salar-avn').html(gain_ou_retenu);
        var total_gain_avn = calcul_total_gain_avn();
        $('#soustotal_gain_avn').html(total_gain_avn);
        calcul_salaire_avant_cotisation();
        calcul_retenu_cotisation();
        calcul_retenu_cotisation_patr();
        calcul_total_cotisation();
        calcul_tranche_irsa();
        calcul_total_irsa();
    });
/* calcule gain avantage en nature */

/* /calcule gain et retenu prime et indemnite */
    /* calcul taux horaire */
    function calul_taux_horaire(base){
        if(base==null){
            base=0;
        }
        var taux_horaire = base/173.33;
        return taux_horaire.toFixed(2);
    }
    /* calcul horaire */
    function calcul_heure(nombre,taux){
        var taux_horaire = $('#taux_horaire').html();
        var gain_retenu_salarial = 0;
        if(nombre!=null && nombre!=0){
            gain_retenu_salarial = (taux/100)*nombre*(parseFloat(taux_horaire));
        }
        return gain_retenu_salarial.toFixed(2);
    }
    /* calcul autre numeraire */
    function calcul_autre_num(nombre,base,taux){
        if(nombre=="") nombre=0;
        if(base=="") base=0;
        if(taux=="") taux=0;
        var gain_ou_retenu = parseFloat((taux*nombre*base)/100);
        return gain_ou_retenu.toFixed(2);
    }
    /* calcul sous total gain numeraire */
    function calcul_total_gain_numeraire(){
        var t_gain_h_sup = 0;
        var t_salaire_num = 0;
        $(".Gain-h").each(function( index ) {
            var gain_h_sup = $(this).html();
            if(gain_h_sup==""){
                gain_h_sup=0;
            }
            t_gain_h_sup = t_gain_h_sup + (parseFloat(gain_h_sup));
        });
        $(".Gain-salar-num").each(function( index ) {
            var salaire_num = $(this).html();
            if(salaire_num==""){
                salaire_num=0;
            }
            t_salaire_num = t_salaire_num + (parseFloat(salaire_num));
        });
        var total_gain_numeraire = t_gain_h_sup+t_salaire_num;
        return total_gain_numeraire.toFixed(2);
    }
    /* calcul sous total retenu numeraire */
    function calcul_total_retenu_numeraire(){
        var t_retenu_num = 0;
        $(".Retenue-salar-num").each(function( index ) {
            var retenu_num = $(this).html();
            if(retenu_num==""){
                retenu_num = 0;
            }
            t_retenu_num = t_retenu_num+(parseFloat(retenu_num));
        });
        return t_retenu_num.toFixed(2);
    }
    /* calcul autre numeraire */
    function calcul_autre_pi(nombre,base){
        var gain = parseFloat(nombre*base);
        return gain.toFixed(2);
    }
    /* calcul sous total gain prime et indenmnite */
    function calcul_total_gain_pi(){
        var total = 0;
        $(".Gain-salar-pi").each(function( index ) {
            var gain = $(this).html();
            if(gain==""){
                gain=0;
            }
            total = total+(parseFloat(gain));
        });
        return total.toFixed(2);
    }
    /* calcul sous total avantage en nature gain_avn */
    function calcul_total_gain_avn(){
        var total = 0;
        $(".Gain-salar-avn").each(function( index ) {
            var gain = $(this).html();
            if(gain==""){
                gain=0;
            }
            total = total+(parseFloat(gain));
        });
        return total.toFixed(2);
    }
    /* function total retenu brut */
    function calcul_gain_total_brut(total_num,total_avn,total_pi){
        var total = parseFloat(total_num)+parseFloat(total_avn)+parseFloat(total_pi);
        return total.toFixed(2);
    }
    /* calcul salaire brute avant cotisation et  */
    function calcul_salaire_avant_cotisation(){
        var total_num = $('.soustotal_gain_num').html();
        if(total_num=="") total_num=0;
        var total_pi =$('.soustotal_gain_pi').html();
        if(total_pi=="") total_pi=0;
        var total_avn = $('#soustotal_gain_avn').html();
        if(total_avn=="") total_avn=0;
        var brute_avant_cotisation = parseFloat(total_num) + parseFloat(total_pi);
        /* var brute_imposable = (brute_avant_cotisation*20)/100;
        if(brute_imposable>200000) brute_imposable=200000; */
        $('.sal_avant_cotisation').html(brute_avant_cotisation);
        $('#sal_avant_cotisation').html(brute_avant_cotisation);
        $('#avantage_nature').html(total_avn);
    }
    /* function total gain brut */
    function calcul_gain_total_brut(){
        
        var total = parseFloat(total_num)+parseFloat(total_avn)+parseFloat(total_pi);
        return total.toFixed(2);
    }
    /* calcul retenu cotisation salarial */
    function calcul_retenu_cotisation(){
        var sal_avant_cotisation = $('#sal_avant_cotisation').html();
        $('.taux-cot-sal').each(function(index){
            var taux = $(this).html();
            var retenu_cot = $(this).parent().parent().children('.td-retenu-cot-sal').children('.retenu-cot-sal');
            if(taux=="") taux=0;
            var retenu_cotisation = (sal_avant_cotisation*taux)/100;
            retenu_cot.html(retenu_cotisation.toFixed(2));
        })
    }
    /* calcul retenu cotisation patronal */
    function calcul_retenu_cotisation_patr(){
        var sal_avant_cotisation = $('#sal_avant_cotisation').html();
        $('.taux-cot-patr').each(function(index){
            var taux = $(this).html();
            var retenu_cot = $(this).parent().parent().children('.retenu-cot-patr').children('.retenu-cot-patr');
            if(taux=="") taux=0;
            var retenu_cotisation = (sal_avant_cotisation*taux)/100;
            retenu_cot.html(retenu_cotisation.toFixed(2));
        })
    }
    /* calcul total cotisation */
    function calcul_total_cotisation(){
        var total = 0;
        $('.retenu-cot-sal').each(function(index){
            var cotisation = $(this).html();
            if(cotisation=="") cotisation=0;
            total = total+ parseFloat(cotisation);
        });
        $('#total_cotisation').html(total.toFixed(2));
    }
    /* calcul salaire brute imposable */
    function calcul_brute_avant_cotisation(){
        var avant_cotisation = $('#sal_avant_cotisation').html();
        var total_cotisation = $('#total_cotisation').html();
        var total = avant_cotisation - total_cotisation;
        $('#sal_brute_imposable').html(total.toFixed(2));
    }
    /* calucl tranche irsa */
    function calcul_tranche_irsa(){
        var avant_cotisation = parseFloat($('#sal_avant_cotisation').html());
        $('.min-irsa').each(function(index){
            var min_irsa = $(this).html();
            var max_irsa = $(this).parent().children('.max-irsa').html();
            var taux_irsa = $(this).parent().children('.td-taux-irsa').children().html();
            if(avant_cotisation>=parseFloat(min_irsa) && avant_cotisation<=parseFloat(max_irsa) || avant_cotisation>parseFloat(max_irsa)){
                var moins_taux = (parseFloat(max_irsa)-parseFloat(min_irsa)) * parseFloat(taux_irsa) / 100;
                retenu_sal_irsa = $(this).parent().children('.td-retenu-sal-irsa').children('.retenu-sal-irsa');
                retenu_sal_irsa.html(Math.ceil(moins_taux));
            }
            if(avant_cotisation>=parseFloat(min_irsa) && max_irsa==' Plus '){
                var moins_taux = (parseFloat(avant_cotisation)-parseFloat(min_irsa)) * parseFloat(taux_irsa) / 100;
                retenu_sal_irsa = $(this).parent().children('.td-retenu-sal-irsa').children('.retenu-sal-irsa');
                retenu_sal_irsa.html(Math.ceil(moins_taux));
            }
        });
    }
    function calcul_total_irsa(){
        var total = 0;
        $('.retenu-sal-irsa').each(function(){
            var retenu_irsa = $(this).html();
            if(retenu_irsa=='') retenu_irsa=0;
            total = total+parseFloat(retenu_irsa);
        });
        $('#total_retenu_sal_irsa').html(total.toFixed(2));
    }
});