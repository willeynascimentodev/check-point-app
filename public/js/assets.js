$(document).on('click', "[name='btn-action']", function(e){
    e.preventDefault();
    var id = $(this).data('item-id');
    $("#"+id).submit();
});