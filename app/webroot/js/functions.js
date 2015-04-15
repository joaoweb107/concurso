window.onload = function () {
    var txts = document.getElementsByTagName('TEXTAREA')

    for (var i = 0, l = txts.length; i < l; i++) {
	if (/^[0-9]+$/.test(txts[i].getAttribute("maxlength"))) {
	    var func = function () {
		var len = parseInt(this.getAttribute("maxlength"), 10);

		if (this.value.length > len) {
		    /*alert('Maximum length exceeded: ' + len);*/
		    this.value = this.value.substr(0, len);
		    return false;
		}
	    }

	    txts[i].onkeyup = func;
	    txts[i].onblur = func;
	}
    }
}
function getEndereco(cep) {
    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep=" + cep, function () {
	if (resultadoCEP["resultado"] != 0) {
	    jQuery("#endereco").val(unescape(resultadoCEP["logradouro"]));
	    jQuery("#bairro").val(unescape(resultadoCEP["bairro"]));
	    jQuery("#cidade").val(unescape(resultadoCEP["cidade"]));
	    jQuery("#estado").val(unescape(resultadoCEP["uf"]));
	} else {
	    alert("CEP inválido!")
	}
    });
}
jQuery(document).ready(function () {

	jQuery(".menu-mobile").click(function(){
		jQuery("#header .menu").slideToggle( "slow", function() {
    		// Animation complete.
  		});
	});

	jQuery(".folhas")				.css({backgroundSize: "contain" });
	jQuery(".concurso_cultural")	.css({backgroundSize: "contain" });
	jQuery(".caderno")				.css({backgroundSize: "contain" });
	jQuery(".lapis")				.css({backgroundSize: "contain" });
	jQuery(".concurso_cultural_2")	.css({backgroundSize: "contain" });
	jQuery(".livros")				.css({backgroundSize: "contain" });
	jQuery(".balao")				.css({backgroundSize: "contain" });
	jQuery(".premios")				.css({backgroundSize: "contain" });
	jQuery(".premio1")				.css({backgroundSize: "contain" });
	jQuery(".premio2")				.css({backgroundSize: "contain" });
	jQuery(".premio3")				.css({backgroundSize: "contain" });
	jQuery(".globo")				.css({backgroundSize: "contain" });
	jQuery(".regulamento")			.css({backgroundSize: "contain" });
	jQuery(".menina")				.css({backgroundSize: "contain" });
	jQuery(".concurso_cultural_3")	.css({backgroundSize: "contain" });
	jQuery(".frase")				.css({backgroundSize: "contain" });
	jQuery(".concurso_cultural_4")	.css({backgroundSize: "contain" });

	


	jQuery("#nav a").click(function(){
		var id = jQuery(this).attr("page");
		if(jQuery("#nav a.active").length > 0) {
			var id_active = jQuery("#nav a.active").attr("page");
			jQuery(".content"+id_active).fadeOut(100);
			jQuery("#nav a.active").removeClass("active");
		} else {
			var id_active = 1;
			jQuery(".content"+id_active).fadeOut(100);
		}
		jQuery(".content"+id).fadeIn(100);
		jQuery(this).addClass("active");
	});
    jQuery("#cep").focusout(function () {
		if (jQuery(this).val() != "") {
		    getEndereco(jQuery(this).val());
		}
    });
    jQuery('input[type="text"]').setMask();

    /* -------------------------------------------------------------------------
     * Verifica qual o tipo de usuario que fara login para desabilitar campos que ele nao usara´
     /**/
    jQuery(':radio[name="tipo_usuario"]').click(function () {
	if (jQuery(this).val() == 'orientador') {
	    jQuery("#UsuarioUsername")
		    .css('display', 'none')
		    .val("null")
		    .prev().css('display', 'none');
	}
	if (jQuery(this).val() == 'administrador') {
	    jQuery("#UsuarioUsername")
		    .css('display', 'block')
		    .val("")
		    .prev().css('display', 'block');
	}
    });

    /* -------------------------------------------------------------------------
     /* Personalização para celulares de SP*/
    jQuery('#ConcursoTelefoneResponsavel').keydown(function (event) {
	// Act on the event
	if (jQuery(this).val().substring(3, 6) == ') 9') {
	    jQuery(this).attr('alt', 'phone-sp');
	} else {
	    jQuery(this).attr('alt', 'phone');
	}
	jQuery(this).setMask();
    });

    /* -------------------------------------------------------------------------
     /* Validaçao do formulario
     adiciona a Plugin Validate o metodo que verifica a idade limite do candidato*/
    jQuery.validator.addMethod(
	    "dateLimite", function (value, element) {
		//contando chars
		if (value.length != 10)
		    return false;
		// verificando data
		var data = value;
		var dia = data.substr(0, 2);
		var mes = data.substr(3, 2);
		var ano = data.substr(6, 4);

		var d = new Date();
		var month = d.getMonth() + 1;
		var day = d.getDate();

		var data_nasc = (ano + "-" + mes + "-" + dia);
		var data_start = (d.getFullYear() - 15) + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
		var data_end = (d.getFullYear() - 3) + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;

		if (data_nasc > data_end || data_nasc <= data_start)
		    return false;
		return true;
	    }, "Candidatos devem ter de 3 a 14 anos");  // Mensagem padrão

    /* adiciona a Plugin Validate o metodo que verifica a se a data é valida no padrao Brazil*/
    jQuery.validator.addMethod(
	    "dateBR", function (value, element) {
		//contando chars
		if (value.length != 10)
		    return false;
		// verificando data
		var data = value;
		var dia = data.substr(0, 2);
		var barra1 = data.substr(2, 1);
		var mes = data.substr(3, 2);
		var barra2 = data.substr(5, 1);
		var ano = data.substr(6, 4);
		if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12)
		    return false;
		if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31)
		    return false;
		if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0)))
		    return false;
		if (ano < 1900)
		    return false;
		return true;
	    }, "Informe uma data válida");  // Mensagem padrão

// validaçao do form
    jQuery('#ConcursoParticipeForm').validate({
		rules: {
		    'data[Concurso][email]': {
			required: true,
			email: true
		    },
		    'data[Concurso][data_nascimento]': {
			required: true,
			minlength: 10,
			dateBR: true,
			dateLimite: true
		    },
		    'data[Concurso][estado]': {
			required: true
		    },
		    'data[Concurso][cidade]': {
			required: true
		    },
		    'data[Concurso][unidade]': {
			required: true
		    },
		    'data[Concurso][orientador]': {
			required: true
		    },
		    'data[Concurso][termos]': {
			required: true
		    },
		    'data[Concurso][frase]': {
			required: true,
			minlength: 10,
			maxlength: 340
		    }
		},
		messages: {
		    'data[Concurso][email]': {
			required: "O campo email é obrigatório.",
			email: "Preencha com um email válido."
		    },
		    'data[Concurso][data_nascimento]': {
			required: "O campo data é obrigatório.",
			minlength: "O campo data deve ser no formato XX/XX/XXXX.",
			dateBR: "Por favor, digite uma data válida"
		    },
		    'data[Concurso][estado]': {
			required: "O estado é obrigatório."
		    },
		    'data[Concurso][cidade]': {
			required: "A cidade é obrigatória.",
		    },
		    'data[Concurso][unidade]': {
			required: "A unidade é obrigatória.",
		    },
		    'data[Concurso][orientador]': {
			required: "O orientador é obrigatório.",
		    },
		    'data[Concurso][termos]': {
			required: "Você deve aceitar o regulamento",
		    },
		    'data[Concurso][frase]': {
			required: "A frase é obrigatória",
			minlength: "A frase deve ter no mínimo 10 caracteres.",
			maxlength: "A frase pode ter no maximo 340 caracteres."
		    }
		}
    });
//------------------------------------------------------------------------------------------------
//exibe caixa de dialogo ao clicar no botao salvar, na lista de frases do orientador e do admin
    jQuery("#dialog-confirm").css('display', 'none');
    jQuery("#dialog-confirm2").css('display', 'none');
    jQuery("#dialog-confirm3").css('display', 'none');

    jQuery("#btn_salvar_frase").live("click", function () {
	// se não existe checkbox na pagina ele redireciona
	var $existe_check = jQuery(":checkbox").length;
	if ($existe_check == 0) {
	    //jQuery(location).attr('href', 'home?time=' + jQuery.now());
	} else {
	    //monta os seletores para orientador e admin
	    var seletor = '.seleciona_melhor:checkbox';
	    var seletor_admin = '.seleciona_melhor_admin:checkbox';
	    var seletor_coordernador = '.seleciona_melhor_coordenador:checkbox';
	    var seletor_lider = '.seleciona_melhor_lider:checkbox';
	    var checados = jQuery(seletor + ':checked').length;
	    var checados_admin = jQuery(seletor_admin + ':checked').length;
	    var checados_coordernador = jQuery(seletor_coordernador + ':checked').length;
	    var checados_lider = jQuery(seletor_lider + ':checked').length;

	    if (checados >= 1 || checados_admin >= 1 || checados_coordernador >= 1 || checados_lider >= 1) {
			if (checados_admin == 1) var dialogo = "#dialog-confirm3";
			else var dialogo = "#dialog-confirm2";
			jQuery(dialogo).dialog({
			    resizable: false,
			    height: 190,
			    width: 400,
			    modal: true,		    
			    buttons: {
					"OK": function () {
					    //$(location).attr('href', 'home?time=' + jQuery.now());
					    $(this).dialog("close");
					}
			    }
			});
	    } else {
			jQuery("#dialog-confirm").dialog({
			    resizable: false,
			    height: 190,
			    width: 400,
			    modal: true,
			    buttons: {
					"Sim": function () {
					    //$(location).attr('href', 'home?time=' + jQuery.now());
					    $(this).dialog("close");
					},
					'Não': function () {
					    $(this).dialog("close");
					}
			    }
			});
	    }
	}
    });
//-----------------------------------------------------------------------------------------
//funçao que add evento de ligthbox aos links que contem rel=facebox
    jQuery('a[rel*=facebox]').facebox({
		loadingImage: '/concursoculturalkumon/img/loading.gif',
		closeImage: '/concursoculturalkumon/img/closelabel.png'
    });

//-----------------------------------------------------------------------------------------
// funçao que força a exibiçao do regulamento até que o orientar click em "Li e Concordo"
    jQuery('.termos_zero').click(function () {

		var url = jQuery(this).attr('href');

		jQuery('#link_banner_concurso').click();

		jQuery('#btn_termos').live("click", function () {
		    var url2 = jQuery(this).attr('href') + '&' + url.split('/')[4].substr(7, 14);
		    jQuery(this).attr('href', url2);
		});
		return false;
    });

//-------------------------------------------------------------------------------------------
// funçao que verifica se o email ou cpf digitado ja existe no banco de dados
//criado por Sergio A. Oliveira
    function ajaxValidaEmailCadastrado(valor) {
	jQuery.get(
		'concursos/ajaxValidaEmailCpfCadastrado?email=' + valor,
		null,
		function (data) {
		    var retorno = jQuery.parseJSON(data);
		    if (retorno.success) {
			jQuery("#aviso").html("Esse e-mail já está cadastrado no concurso.<br />Lembre-se que só é permitido enviar uma história por aluno.")
			jQuery("#aviso").dialog({
			    resizable: false,
			    height: 210,
			    width: 400,
			    modal: true,
			    buttons: {	
					"Continuar": function () {					    
				    	$(this).dialog("close");
					},
			    }
			});			
		    }
		}
	);
    }

    function ajaxValidaEmailCpfResponsavelCadastrado(valor, fraseAlerta) {
	jQuery.get(
		'concursos/ajaxValidaEmailCpfCadastrado?' + valor,
		null,
		function (data) {
		    var retorno = jQuery.parseJSON(data);
		    if (retorno.success) {
			jQuery("#aviso").html(fraseAlerta);
			jQuery("#aviso").dialog({
			    resizable: false,
			    height: 210,
			    width: 400,
			    modal: true,
			    buttons: {
					"Continuar": function () {					    
					    $(this).dialog("close");
					},
			    }
			});
		    }
		}
	);
    }
    //atribui o evento ao campo de email
    jQuery("#ConcursoEmail").blur(function () {
		ajaxValidaEmailCadastrado(jQuery(this).val());
    });

    // atribui o evento ao campo de email do responsavel
    jQuery("#ConcursoEmailResponsavel").blur(function () {
		ajaxValidaEmailCpfResponsavelCadastrado("email_responsavel=" + jQuery(this).val(), "Esse e-mail já está cadastrado no concurso. \n\nLembre-se que só é permitido enviar uma história por aluno.");
    });

    jQuery("#ConcursoCpfResponsavel").blur(function () {
		ajaxValidaEmailCpfResponsavelCadastrado("cpf_responsavel=" + jQuery(this).val(), "Esse cpf já está cadastrado no concurso. \n\nLembre-se que só é permitido enviar uma história por aluno.");
    });

    jQuery("#ConcursoFrase").blur(function () {
		ajaxValidaEmailCpfResponsavelCadastrado("frase=" + jQuery(this).val(), "Essa história já está cadastrada no concurso. \n\nSó é permitido enviar uma história por aluno.");
    });

    jQuery("#ConcursoIndexForm").submit(function () {
		ajaxValidaEmailCadastrado(jQuery("#ConcursoEmail").val());
    });
});
