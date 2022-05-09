$(document).on('click', "[name='btn-action']", function(e){
    e.preventDefault();
    var id = $(this).data('item-id');
    
    var text = '';

    if(id.includes('soft')) {
        text = 'Tem certeza que deseja excluir?';
    } else if(id.includes('hard')) {
        text = 'Todas as informações relacionadas a este usuário serão excluídas permanentemente. Tem certeza?';
    } else if(id.includes('restore')) {
        text = 'Deseja restaurar?';
    }

    Swal.fire({
        title: text,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Sim',
        denyButtonText: 'Não',
    }).then((result) => {
        if (result.isConfirmed) {
            $("#"+id).submit();
        }
    })

  


});




