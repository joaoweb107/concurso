jQuery(document).ready(function () {
    // funçao que recupera as variaveis passadas pela url  
    // jQuery.getUrlVars(); -> recupera todas as variaveis
    // jQuery.getUrlVars('campo'); ou jQuery.getUrlVars()['campo']-> recupera o valor da variavel campo.
    jQuery.extend({
	getUrlVars: function () {
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for (var i = 0; i < hashes.length; i++)
	    {
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	    }
	    return vars;
	},
	getUrlVar: function (name) {
	    return jQuery.getUrlVars()[name];
	}
    });


//------------------------------------------------------------------------------			
// atribuindo as funçoes aos eventos de alterar os combos estados, cidade , unidade
    jQuery("#ConcursoEstado").change(function () {
	getCidade();
	jQuery("#ConcursoCidade").attr('disabled', false).html('<option value="">Selecione</option>');
	jQuery("#ConcursoUnidade").html('<option value="">Selecione</option>').attr('disabled', true);
	jQuery("#ConcursoOrientadorId").html('<option value="">Selecione</option>').attr('disabled', true);
    });

    jQuery("#ConcursoCidade").change(function () {
	getUnidade();
	jQuery("#ConcursoOrientadorId").html('<option value="">Selecione</option>').attr('disabled', true);
	jQuery("#ConcursoUnidade").html('<option value="">Selecione</option>').attr('disabled', false);
    });

    jQuery("#ConcursoUnidade").change(function () {
	getOrientador();
	jQuery("#ConcursoOrientadorId").attr('disabled', false).html('<option value="">Selecione</option>');
    });

// atribuindo evento ao alterar o combo	do user admin
    jQuery("#filial_admin").change(function () {
	getUnidade('admin');
	jQuery("#unidade_admin").attr('disabled', false);
	var $dados = '&filial=' + jQuery('#filial_admin option:selected').text() +
		'&unidade=';

	carregaTableAdmin($dados);
	//verificaChecadosAdmin();
    });

    jQuery("#unidade_admin").change(function () {
	var $dados =
		'&filial=' + jQuery('#filial_admin option:selected').text() +
		'&unidade=' + jQuery('#unidade_admin option:selected').val();

	carregaTableAdmin($dados);
	//verificaChecadosAdmin();
    });


//------------------------------------------------------------------------------
// carrega o select cidade apartir de um estado selecionado
    function getCidade(id) {
	if (id == 'admin')
	    url = '';
	else
	    url = 'concursos/';
	jQuery.get(
		url + "getCidades?estado=" + jQuery("#ConcursoEstado").val(),
		null,
		function (data) {
		    var retorno = jQuery.parseJSON(data);
		    if (retorno.success) {
			jQuery("#ConcursoCidade").html(retorno.html);
		    }
		}
	);
    }

//------------------------------------------------------------------------------
// carrega o select unidade apartir de um estado e uma cidade selecionados
    function getUnidade(id) {
	var url;
	if (id == 'admin')
	    url = "getUnidades?filial=" + jQuery("#filial_admin option:selected").text();
	else
	    url = "concursos/getUnidades?estado=" + jQuery("#ConcursoEstado").val() + "&cidade=" + jQuery("#ConcursoCidade").val();
	jQuery.get(
	    url,
	    null,
	    function (data) {
		var retorno = jQuery.parseJSON(data);
		if (retorno.success) {
		    jQuery("#ConcursoUnidade, #unidade_admin").html(retorno.html);
		}
	    }
	);
    }

//------------------------------------------------------------------------------	
// funçao que carrega o campo orientador apartir de um estado ,uma cidade e unidade selecionados
    function getOrientador(id) {
	if (id == 'admin')
	    url = '';
	else
	    url = 'concursos/';
	jQuery.get(
		url + "getOrientador?estado=" + jQuery("#ConcursoEstado").val() + "&cidade=" + jQuery("#ConcursoCidade").val() + "&unidade=" + jQuery("#ConcursoUnidade").val(),
		null,
		function (data) {
		    var retorno = jQuery.parseJSON(data);
		    if (retorno.success) {
				jQuery("#ConcursoOrientadorId").html(retorno.html);
		    }
		}
	);
    }

//------------------------------------------------------------------------------	
// Funçao que filtra os dados da tabela da administraçao com user admin
    function carregaTableAdmin($dados) {
		$dados = jQuery.getUrlVar('classe') + $dados;
		jQuery.ajax({
		    url: "getDadosAdmin?classe=" + $dados,
		    async: false,
		    success: function (data) {
				var retorno0 = jQuery.parseJSON(data);
				if (retorno0.success) {
				    jQuery("#datatable_tbody0").html(retorno0.html);
				    jQuery("#dynamic-table0_info").html(retorno0.quant);

				  	//coloca a quantidade de estrelas q a frase possui
					jQuery(".classificacao_estrela").jRating({
					    step: true,
					    length: 5,
					    rateMax: 5,
					    decimalLength: 0,
					    canRateAgain: true,
					    nbRates: 50
					});

					jQuery('input[class="hidden_nota"]').each(function () {
					    if (jQuery(this).val() !== 0) {
						var px = jQuery(this).val() * 23;
						jQuery(this).siblings('.jRatingAverage').css('width', px + 'px');
					    }
					});

				}
		    }
		});
    }


    /*------------------------------------------------------------------------------
     * Funçao 1 verifica quantos checados e funçao 2 salva no banco o checkbox da melhor frase
     */

    function verificaChecados() {
		for (var i = 0; i <= 2; i++) {
		    var seletor = '.seleciona_melhor:checkbox'; //monta o seletor para as dynamic tables
		    //var seletor = '#dynamic-table0 .seleciona_melhor:checkbox'; //monta o seletor para as dynamic tables
		    var checados = jQuery(seletor + ':checked').length;//verifica quantos estao checados
		    if (checados >= 2) {
			jQuery(seletor).not(':checked').attr('disabled', 'true');
		    } else {
			jQuery(seletor).removeAttr('disabled');
		    }
		}
    }

    function verificaChecadosCoordenador() {
		for (var i = 0; i <= 3; i++) {
		    var seletor = '.seleciona_melhor_coordenador:checkbox'; //monta o seletor para as dynamic tables
		    //var seletor = '#dynamic-table0 .seleciona_melhor:checkbox'; //monta o seletor para as dynamic tables
		    var checados = jQuery(seletor + ':checked').length;//verifica quantos estao checados
		    if (checados >= 3) {
				jQuery(seletor).not(':checked').attr('disabled', 'true');
		    } else {
				jQuery(seletor).removeAttr('disabled');
		    }
		}
    }
    function verificaChecadosLider() {
		for (var i = 0; i <= 3; i++) {
		    var seletor = '.seleciona_melhor_lider:checkbox'; //monta o seletor para as dynamic tables
		    //var seletor = '#dynamic-table0 .seleciona_melhor:checkbox'; //monta o seletor para as dynamic tables
		    var checados = jQuery(seletor + ':checked').length;//verifica quantos estao checados
		    if (checados >= 5) {
				jQuery(seletor).not(':checked').attr('disabled', 'true');
		    } else {
				jQuery(seletor).removeAttr('disabled');
		    }
		}
    }

    verificaChecados();
    verificaChecadosCoordenador();
    verificaChecadosLider();

    jQuery("#dialog-confirm3").css('display', 'none');
    jQuery(".seleciona_melhor").live("click", function () {
		var $this = jQuery(this).val(); //recupera o id
		var $melhor = 0;
		if (jQuery(this).is(':checked')) {
		    var $checks = jQuery(":checkbox:checked").length;	    
		    $melhor = 1;
		    if($checks == 2 ){
				jQuery("#dialog-confirm3").dialog({
				    resizable: false,
				    height: 190,
				    width: 400,
				    modal: true,
				    buttons: {
						"OK": function () {
						    $(location).attr('href', 'home?time=' + jQuery.now());
						    $(this).dialog("close");
						}
				    }
				});
		    }
		}
		jQuery.get(
			"setMelhorFrase?id=" + $this + "&melhor=" + $melhor + '&time=' + jQuery.now(),
			null
		);
		verificaChecados();
    });

//-----------------------------------------------------------------------------------------------
//funçao salva no banco o checkbox da melhor frase do admin	
    jQuery(".seleciona_melhor_admin").live("click", function () {
		var $this = jQuery(this).val(); //recupera o id
		var $melhor = 0;
		if (jQuery(this).is(':checked')) {
		    $melhor = 1;
		}
		jQuery.ajax({
		    url: "setMelhorFrase?id=" + $this + "&melhor_admin=" + $melhor + '&time=' + jQuery.now(),
	    	async: false
		});
		//verificaChecadosAdmin();
    });

    jQuery(".seleciona_melhor_coordenador").live("click", function () {
		var $this = jQuery(this).val(); //recupera o id
		var $melhor = 0;
		if (jQuery(this).is(':checked')) {
		    $melhor = 1;
		}
		jQuery.ajax({
		    url: "setMelhorFrase?id=" + $this + "&melhor_coordenador=" + $melhor + '&time=' + jQuery.now(),
	    	async: false
		});
		verificaChecadosCoordenador();
    });
    jQuery(".seleciona_melhor_lider").live("click", function () {
		var $this = jQuery(this).val(); //recupera o id
		var $melhor = 0;
		if (jQuery(this).is(':checked')) {
		    $melhor = 1;
		}
		jQuery.ajax({
		    url: "setMelhorFrase?id=" + $this + "&melhor_lider=" + $melhor + '&time=' + jQuery.now(),
	    	async: false
		});
		verificaChecadosLider();
    });


    /*
     * Funçao verifica quantos checks estao checked na pagina e no banco 
     *
     
     function verificaChecadosAdmin(){
     var seletor0 = '#dynamic-table0 .seleciona_melhor_admin:checkbox'; //monta o seletor para as dynamic tables
     var $checados0 = jQuery(seletor0+':checked').length;//verifica quantos estao checados
     var classe =  jQuery.getUrlVars()['classe'];
     
     jQuery.ajax({ 
     url: "getQtdeMelhoresAdmin?classe="+classe,
     async: false,
     success: function(data) {
     var $checados_banco0 = jQuery.parseJSON(data); 
     if($checados0 >= 10 || $checados_banco0.html >= 10){	
     jQuery(seletor0).not(':checked').attr('disabled','true'); 
     }else{
     jQuery(seletor0).removeAttr('disabled'); 
     }			 
     }
     });
     
     }
     */
    //verificaChecadosAdmin();

//-------------------------------------------------------------------------------------------
 // funçao que salva a nota atribuida a frase pelo admin
    jQuery.fn.exists = function(){return jQuery(this).length;};

    if (jQuery(".classificacao_estrela").exists()){
	jQuery(".classificacao_estrela").jRating({
	    step: true,
	    length: 5,
	    rateMax: 5,
	    decimalLength: 0,
	    canRateAgain: true,
	    nbRates: 50
	});

	jQuery('input[class="hidden_nota"]').each(function () {
	    if (jQuery(this).val() !== 0) {
		var px = jQuery(this).val() * 23;
		jQuery(this).siblings('.jRatingAverage').css('width', px + 'px');
	    }
	});
    }
    
    
//---------------------------------------------------------------------------------	


});