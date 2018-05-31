$(document).ready(function() {

    var val_to_delete;
    var val_to_edit;

    $('#datatables').dataTable();
    $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Rechercher...');

    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
    });

    $("#add").click(function() {
        $.ajax({
            type: 'POST',
            url: '/pattern/store',
            data: {
                '_token': $('input[name=_token]').val(),
                'nom': $('input[name=nom]').val()
            },
            success: function(data){
                console.log('Success:', data);
                if ((data.errors)) {
                    $('.alert-max').removeClass('hidden');
                    console.log(data.errors);
                    var msg_error = "";
                    if (data.errors.nom) {
                        msg_error += data.errors.nom;
                    }
                    $('.error-max').text(msg_error);
                } else {
                    $('#datatables').append("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    "<td class='text-center'>"+
                        "<div class='row'>"+
                            "<div class='col-lg-4'><a class='btn btn-primary btn-sm' href='/pattern/"+data.id+"/repartitions'><span class='glyphicon glyphicon-menu-right'></span> Répartitions</a></div>"+
                            "<div class='col-lg-4'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "'><span class='glyphicon glyphicon-pencil'></span> Editer</button></div>"+
                            "<div class='col-lg-4'><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "'><span class='glyphicon glyphicon-trash'></span> Supprimer</button></div>"+
                        "</div>"+
                    "</td>"+"</tr>");
                    $('#nom').val('');
                    $('#create').modal('hide');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $(document).on('click', '.delete-modal', function() {
        $('#delete').modal('show');
        val_to_delete= $(this).data('id');
    });

    $('#delete-object').click(function() {
        $.ajax({
            type: 'DELETE',
            url: '/pattern/destroy',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': val_to_delete
            },
            success: function(data){
                console.log(data);
                $('.post' + val_to_delete).remove();
                $('#delete').modal('hide');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $(document).on('click', '.edit-modal', function() {
        $('#edit').modal('show');
        val_to_edit= $(this).data('id');
        $('#nom_edit').val($(this).data('nom'));
        $('#myModal').modal('show');
    });

    $('#footer_edit_button').click(function() {
        console.log(val_to_edit);
        $.ajax({
            type: 'POST',
            url: '/pattern/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': val_to_edit,
                'nom': $('input[name=nom_edit]').val(),
            },
            success: function(data) {
                console.log('Success:', data);
                if ((data.errors)) {
                    $('.alert-max-edit').removeClass('hidden');
                    console.log(data.errors);
                    var msg_error = "";
                    if (data.errors.nom) {
                        msg_error += data.errors.nom;
                    }

                    $('.error-max-edit').text(msg_error);
                } else {
                    $('.post' + data.id).replaceWith("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    "<td class='text-center'>"+
                        "<div class='row'>"+
                            "<div class='col-lg-4'><a class='btn btn-primary btn-sm' href='/pattern/"+data.id+"/repartitions'><span class='glyphicon glyphicon-menu-right'></span> Répartitions</a></div>"+
                            "<div class='col-lg-4'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "'><span class='glyphicon glyphicon-pencil'></span> Editer</button></div>"+
                            "<div class='col-lg-4'><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "'><span class='glyphicon glyphicon-trash'></span> Supprimer</button></div>"+
                        "</div>"+
                    "</td>"+"</tr>");
                    $('#nom_edit').val('');
                    $('#edit').modal('hide');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
