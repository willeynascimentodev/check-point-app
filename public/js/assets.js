$(document).on('click', "[name='btn-action']", function(e){
    e.preventDefault();
    var id = $(this).data('item-id');

    if(id.includes('soft') && window.confirm('Tem certeza que deseja excluir?')) {
        $("#"+id).submit();
    } else if(id.includes('hard') && window.confirm('Se você excluir, não poderá recuperar. Tem certeza?')) {
        $("#"+id).submit();
    } else if (!id.includes('delete')) {
        $("#"+id).submit();
    }
});