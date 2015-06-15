$(function () {
    
    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            
        },
        error: function(xhr, textStatus, errorThrown){
            toastr.error(errorThrown, 'Opss..Ocorreu algum problema.');
        }
    });
    
    
    $('#confirm-dialog').on('shown.bs.modal', function (e) {
        e.preventDefault();
        var codigo = $(e.relatedTarget).data('id');
        $('#delete').attr('data-id', codigo);
    });

    $('#delete').on('click', function (e) {
        var id = $(this).attr('data-id');

        $.ajax({
            type: "POST",
            data: {
                codigo: id
            },
            url: "disciplinas/excluir",
            dataType: "json",
            success: function (json) {
                $("#tr_" + id).remove();
                toastr.success('Dados excluidos com sucesso!', 'Sucesso');
            }
        });
    });
});