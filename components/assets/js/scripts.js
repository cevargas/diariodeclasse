require(['jquery'], function($) {
        
    $('#confirm-dialog').on('shown.bs.modal', function(e) {
        e.preventDefault();
        var codigo = $(e.relatedTarget).data('id');
        $('#delete').attr('data-id', codigo);
    });
    
    $('#delete').on('click', function(e) {
        var id = $(this).attr('data-id');        
        
        $.ajax({
            type: "POST",
            data: {
                codigo: id
            },
            url: "disciplinas/excluir",
            dataType: "json",
            success: function(json) {
                $("#tr_"+id).remove();
                toastr.success('Have fun storming the castle!', 'Miracle Max Says')
            }
        });
    });

});