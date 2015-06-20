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
    
    $('#datepesquturma').datetimepicker({ 
        locale: 'pt-br',
        format: 'DD/MM/YYYY'        
    });
    
    $('#datetimestart').datetimepicker({ 
        locale: 'pt-br',
        format: 'DD/MM/YYYY'
    });
    
    $('#datetimeend').datetimepicker({ 
        locale: 'pt-br',
        format: 'DD/MM/YYYY'        
    });
    
    $("#datetimestart").on("dp.change", function (e) {
        $('#datetimeend').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimeend").on("dp.change", function (e) {        
        $('#datetimestart').data("DateTimePicker").maxDate(e.date);
    });
   
});