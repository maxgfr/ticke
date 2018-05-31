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
            url: '/repartition/store',
            data: {
                '_token': $('input[name=_token]').val(),
                'nom': $('input[name=nom]').val(),
                'pattern_id': $('input[name=pattern_id]').val(),
                'emplacement': $('input[name=emplacement]').val(),
                'total': $('input[name=total]').val()
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
                    if (data.errors.emplacement) {
                        msg_error += data.errors.emplacement;
                    }
                    if (data.errors.total) {
                        msg_error += data.errors.total;
                    }
                    $('.error-max').text(msg_error);
                } else {
                    $('#datatables').append("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    '<td class="text-center">' + data.total +'</td>'+
                    '<td class="text-center">' + data.emplacement + '</td>'+
                    "<td class='text-center'>"+
                        "<div class='row'>"+
                            "<div class='col-md-6'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-total='" + data.total + "' data-emplacement='" + data.emplacement + "'><span class='glyphicon glyphicon-pencil'></span> Editer</button></div>"+
                            "<div class='col-md-6'><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id +  "'><span class='glyphicon glyphicon-trash'></span> Supprimer</button></div>"+
                        "</div>"+
                    "</td>"+"</tr>");
                    $('#nom').val('');
                    $('#total').val('');
                    $('#emplacement').val('');
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
            url: '/repartition/destroy',
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
        $('#emplacement_edit').val($(this).data('emplacement'));
        $('#total_edit').val($(this).data('total'));
        $('#myModal').modal('show');
    });

    $('#footer_edit_button').click(function() {
        console.log(val_to_edit);
        $.ajax({
            type: 'POST',
            url: '/repartition/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': val_to_edit,
                'nom': $('input[name=nom_edit]').val(),
                'emplacement': $('input[name=emplacement_edit]').val(),
                'total': $('input[name=total_edit]').val()
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
                    if (data.errors.emplacement) {
                        msg_error += data.errors.emplacement;
                    }
                    if (data.errors.total) {
                        msg_error += data.errors.total;
                    }
                    $('.error-max-edit').text(msg_error);
                } else {
                    $('.post' + data.id).replaceWith("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    '<td class="text-center">' + data.total +'</td>'+
                    '<td class="text-center">' + data.emplacement + '</td>'+
                    "<td class='text-center'>"+
                        "<div class='row'>"+
                        "<div class='col-md-6'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-total='" + data.total + "' data-emplacement='" + data.emplacement + "'><span class='glyphicon glyphicon-pencil'></span> Editer</button></div>"+
                        "<div class='col-md-6'><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id +  "'><span class='glyphicon glyphicon-trash'></span> Supprimer</button></div>"+
                        "</div>"+
                    "</td>"+"</tr>");
                    $('#nom_edit').val('');
                    $('#total_edit').val('');
                    $('#emplacement_edit').val('');
                    $('#edit').modal('hide');
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
