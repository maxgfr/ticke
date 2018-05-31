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
            url: '/entity/store',
            data: {
                '_token': $('input[name=_token]').val(),
                'nom': $('input[name=nom]').val(),
                'adr': $('input[name=adr]').val(),
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
                    if (data.errors.adr) {
                        msg_error += data.errors.adr;
                    }
                    $('.error-max').text(msg_error);
                } else {
                    $('#datatables').append("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    '<td class="text-center">' + data.adr +'</td>'+
                    "<td class='text-center'>"+
                        "<div class='row'>"+
                            "<div class='col-md-6'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-adr='" + data.adr +  "'><span class='glyphicon glyphicon-pencil'></span> Editer</button></div>"+
                            "<div class='col-md-6'><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-adr='" + data.adr +  "'><span class='glyphicon glyphicon-trash'></span> Supprimer</button></div>"+
                        "</div>"+
                    "</td>"+"</tr>");
                    $('#nom').val('');
                    $('#adr').val('');
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
            url: '/entity/destroy',
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
        $('#adr_edit').val($(this).data('adr'));
        $('#myModal').modal('show');
    });

    $('#footer_edit_button').click(function() {
        console.log(val_to_edit);
        $.ajax({
            type: 'POST',
            url: '/entity/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': val_to_edit,
                'nom': $('input[name=nom_edit]').val(),
                'adr': $('input[name=adr_edit]').val(),
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
                    if (data.errors.adr) {
                        msg_error += data.errors.adr;
                    }
                    $('.error-max-edit').text(msg_error);
                } else {
                    $('.post' + data.id).replaceWith("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    '<td class="text-center">' + data.adr +'</td>'+
                    "<td class='text-center'>"+
                        "<div class='row'>"+
                            "<div class='col-md-6'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-adr='" + data.adr + "' data-ville='" + data.ville + "' data-cp='" + data.cp + "' data-mobile='" + data.mobile +  "'><span class='glyphicon glyphicon-pencil'></span> Editer</button></div>"+
                            "<div class='col-md-6'><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-adr='" + data.adr + "' data-ville='" + data.ville + "' data-cp='" + data.cp + "' data-mobile='" + data.mobile +  "'><span class='glyphicon glyphicon-trash'></span> Supprimer</button></div>"+
                        "</div>"+
                    "</td>"+"</tr>");
                    $('#nom_edit').val('');
                    $('#adr_edit').val('');
                    $('#edit').modal('hide');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
