$(document).ready(function() {

    $('#datatables').dataTable();
    $('#datatables_wrapper .table-caption').text('La liste de mes restaurants');
    $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Rechercher...');

    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Post');
    });

    $("#add").click(function() {
        $.ajax({
            type: 'POST',
            url: '/restaurant/store',
            data: {
                '_token': $('input[name=_token]').val(),
                'nom': $('input[name=nom]').val(),
                'adr': $('input[name=adr]').val(),
                'ville': $('input[name=ville]').val(),
                'cp': $('input[name=cp]').val(),
                'mobile': $('input[name=mobile]').val(),
            },
            success: function(data){
                console.log('Success:', data);
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.title);
                    $('.error').text(data.errors.body);
                } else {
                    $('.error').remove();
                    $('#datatables').append("<tr class='post" + data.id + "'>"+
                    '<td class="text-center">' + data.nom + '</td>'+
                    '<td class="text-center">' + data.adr + '</td>'+
                    '<td class="text-center">' + data.ville + '</td>'+
                    '<td class="text-center">' + data.mobile + '</td>'+
                    "<td class='text-center'>"+
                        "<button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-adr='" + data.adr + "' data-ville='" + data.ville + "' data-cp='" + data.cp + "' data-mobile='" + data.mobile +  "'><span class='glyphicon glyphicon-pencil'></span></button> "+
                        "<button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-nom='" + data.nom + "' data-adr='" + data.adr + "' data-ville='" + data.ville + "' data-cp='" + data.cp + "' data-mobile='" + data.mobile +  "'><span class='glyphicon glyphicon-trash'></span></button>"+
                    "</td>"+"</tr>");
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
            ,
        });
        $('#nom').val('');
        $('#adr').val('');
        $('#ville').val('');
        $('#cp').val('');
        $('#mobile').val('');
    });

    // function Edit POST
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update Post");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Post Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#t').val($(this).data('title'));
        $('#b').val($(this).data('body'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'POST',
            url: 'editPost',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'title': $('#t').val(),
                'body': $('#b').val()
            },
            success: function(data) {
                $('.post' + data.id).replaceWith(" "+
                "<tr class='post" + data.id + "'>"+
                "<td>" + data.id + "</td>"+
                "<td>" + data.title + "</td>"+
                "<td>" + data.body + "</td>"+
                "<td>" + data.created_at + "</td>"+
                "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                "</tr>");
            }
        });
    });


    // form Delete function
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete Post');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.title').html($(this).data('title'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function(){
        $.ajax({
            type: 'POST',
            url: 'deletePost',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.id').text()
            },
            success: function(data){
                $('.post' + $('.id').text()).remove();
            }
        });
    });

    // Show function
    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#ti').text($(this).data('title'));
        $('#by').text($(this).data('body'));
        $('.modal-title').text('Show Post');
    });
});
