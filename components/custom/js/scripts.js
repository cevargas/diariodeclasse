$(function () {
    
    $('#confirm-dialog').on('shown.bs.modal', function (e) {
        e.preventDefault();
        var codigo = $(e.relatedTarget).data('id');
        var url    = $(e.relatedTarget).data('url');
        
        $('#delete').attr('data-id', codigo);
        $('#delete').attr('data-url', url);

    });

    $('#delete').on('click', function (e) {
        var id  = $(this).attr('data-id');
        var url = $(this).attr('data-url');

        $.ajax({
            type: "POST",
            data: {
                codigo: id
            },
            url: url+"/excluir",
            dataType: "json",
            success: function (json) {
                $("#tr_" + id).remove();
                toastr.success('Dados excluidos com sucesso!', 'Sucesso');
            }
        });
    });   
    
    $('.datetimepicker').datetimepicker({ 
        locale: 'pt-br',
        format: 'DD/MM/YYYY'        
    });
    
    //TESTA AQUI AS DATAS DO CADASTRO DAS TURMAS *****************
    $("body").on("change", "#datainicio", function (e) {        
        console.log('aaaa');
        //$('#datafim').data("DateTimePicker").minDate(e.date);
    });
    $("#datafim").on("change.dp", function (e) {        
        console.log('vvvv');
        //$('#datainicio').data("DateTimePicker").maxDate(e.date);
    });
   
});