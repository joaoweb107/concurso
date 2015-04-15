function fnFormatDetails ( oTable, nTr )
{
    var aData = oTable.fnGetData( nTr );
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
    sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
    sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
    sOut += '</table>';

    return sOut;
}

$(document).ready(function() {
// tabelas que aparecem para liberar acesso a filiais
    jQuery('#dynamic-table_acessos').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": false,
		"sPaginationType" : "full_numbers",			
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
		},
		"aaSorting" : [[1, 'desc']]
	});
	
// tabelas que aparecem para os orientadores
    jQuery('#Orientador_dynamic-table0, #Orientador_dynamic-table1, #Orientador_dynamic-table2').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": false,
		"sPaginationType" : "full_numbers",			
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
		},
		"aaSorting" : [[3, 'desc']]
	});
// tabelas para os admins
	 jQuery('#dynamic-table0').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": false,
		"sPaginationType" : "full_numbers",	
		"sDom": 'T<"clear">lfrtip',
		"aoColumns": [ 
			/* nome */   null,
			/* filial */ { "bSearchable": true,
			                 "bVisible":    true },
			/* unidade */  null,
			/* historia */  null,
			/* selecionar */    null
		], 
		"oTableTools" : {
			"sSwfPath" : "../js/template/assets/advanced-datatable/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons" : [{
				"sExtends" : "xls",
				"sButtonText" : "Exportar para Excel",
				"sTitle" : "Frases - Pre escolar",
				"sFileName": "*.xls",
//				"mColumns" : [0, 1, 2, 3]
			}]
		},
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
		},
		"aaSorting" : [[4, 'desc']]
	});

    jQuery('#dynamic-table1').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": false,
		"sPaginationType" : "full_numbers",	
		"sDom": 'T<"clear">lfrtip',
		"aoColumns": [ 
			/* nome */  null,
			/* filial */ { "bSearchable": true,
			                 "bVisible":    true },
			/* unidade */  null,
			/* historia */  null,
			/* selecionar */    null
		], 
		"oTableTools" : {
			"sSwfPath" : "../js/template/assets/advanced-datatable/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons" : [{
				"sExtends" : "xls",
				"sButtonText" : "Exportar para Excel",
				"sTitle" : "Frases - Fundamental 1",
				"sFileName": "*.xls",
//				"mColumns" : [0, 1, 2]
			}/*, {
				"sExtends" : "pdf",
				"sButtonText" : "Exportar para PDF",
				"sTitle" : "Frases - Fundamental 1",
				"sPdfOrientation" : "landscape",
				"mColumns" : [0, 1, 2, 3]
			}*/]
		},
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
			/*"oPaginate" : {
				"sFirst" : "Inicio",
				"sPrevious" : "Anterior",
				"sNext" : "Proximo",
				"sLast" : "Ultimo"
			}*/
		},
		"aaSorting" : [[4, 'desc']]
	});
	
	jQuery('#dynamic-table2').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": false,
		"sPaginationType" : "full_numbers",	
		"sDom": 'T<"clear">lfrtip',
		"aoColumns": [ 
			/* nome */   null,
			/* filial */ { "bSearchable": true,
			                 "bVisible":    true },
			/* unidade */  null,
			/* historia */  null,
			/* selecionar */    null
		], 
		"oTableTools" : {
			"sSwfPath" : "../js/template/assets/advanced-datatable/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons" : [{
				"sExtends" : "xls",
				"sButtonText" : "Exportar para Excel",
				"sTitle" : "Frases - Fundamental 2",
				"sFileName": "*.xls",
//				"mColumns" : [0, 1, 2]
			}]
		},
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
			/*"oPaginate" : {
				"sFirst" : "Inicio",
				"sPrevious" : "Anterior",
				"sNext" : "Proximo",
				"sLast" : "Ultimo"
			}*/
		},
		"aaSorting" : [[4, 'desc']]
	});

	jQuery('#dynamic-table3').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": true,
		"sPaginationType" : "full_numbers",	
		"sDom": 'T<"clear">lfrtip',
		"aoColumns": [ 
			/* nome */   null,
			/* filial */ { "bSearchable": true,
			                 "bVisible":    true },
			/* unidade */  null,
			/* historia */  null,
			/* selecionar */    null,
			/* selecionar */    null
		], 
		"oTableTools" : {
			"sSwfPath" : "../js/template/assets/advanced-datatable/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons" : [{
				"sExtends" : "xls",
				"sButtonText" : "Exportar para Excel",
				"sTitle" : "Quantidades por Unidade",
				"sFileName": "*.xls",
//				"mColumns" : [0, 1, 2]
			}]
		},
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
			"oPaginate" : {
				"sFirst" : "Inicio",
				"sPrevious" : "Anterior",
				"sNext" : "Proximo",
				"sLast" : "Ultimo"
			}
		},
		/* "aaSorting" : [[4, 'desc']] */
	});

	jQuery('#relatorio_filial').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": true,
		"sPaginationType" : "full_numbers",	
		"sDom": 'T<"clear">lfrtip',
		"aoColumns": [ 
			/* nome */   null,
			/* unidade */  null,
			/* historia */  null,
			/* selecionar */    null,
		], 
		"oTableTools" : {
			"sSwfPath" : "../js/template/assets/advanced-datatable/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons" : [{
				"sExtends" : "xls",
				"sButtonText" : "Exportar para Excel",
				"sTitle" : "Relatório de Filiais",
				"sFileName": "*.xls",
//				"mColumns" : [0, 1, 2]
			}]
		},
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
			"oPaginate" : {
				"sFirst" : "Inicio",
				"sPrevious" : "Anterior",
				"sNext" : "Proximo",
				"sLast" : "Ultimo"
			}
		},
		/* "aaSorting" : [[4, 'desc']] */
	});

	jQuery('#relatorio_coordenadores').dataTable( {
		"bJQueryUI" : true,
		"bPaginate": false,
		"bFilter": true,
		"sPaginationType" : "full_numbers",	
		"sDom": 'T<"clear">lfrtip',
		"aoColumns": [ 
			/* nome */   null,
			/* unidade */  null,
			/* historia */  null,
			/* selecionar */    null,
		], 
		"oTableTools" : {
			"sSwfPath" : "../js/template/assets/advanced-datatable/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
			"aButtons" : [{
				"sExtends" : "xls",
				"sButtonText" : "Exportar para Excel",
				"sTitle" : "Penetração Coordenadores",
				"sFileName": "*.xls",
//				"mColumns" : [0, 1, 2]
			}]
		},
		"oLanguage" : {
			"sLengthMenu" : "Mostrar _MENU_ registros por página",
			"sZeroRecords" : "Nenhum registro encontrado",
			"sInfo" : "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
			"sInfoEmpty" : "Nenhum registro encontrado",
			"sInfoFiltered" : "(filtrado de _MAX_ registros)",
			"sSearch" : "Pesquisar: ",
			"oPaginate" : {
				"sFirst" : "Inicio",
				"sPrevious" : "Anterior",
				"sNext" : "Proximo",
				"sLast" : "Ultimo"
			}
		},
		/* "aaSorting" : [[4, 'desc']] */
	});


	/*
	$('#dynamic-table').dataTable( {
        "aaSorting": [[ 4, "desc" ]]
    } );

    *
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="../css/template/images/details_open.png">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    /*
     * Initialse DataTables, with no sorting on the 'details' column
    
    var oTable = $('#hidden-table-info').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
        ],
        "aaSorting": [[3, 'desc']]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $(document).on('click','#hidden-table-info tbody td img',function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "/css/template/images/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "/css/template/images/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );
} );