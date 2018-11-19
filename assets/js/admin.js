var base_url = window.location.protocol + "//" + window.location.host + "/";

(function ($) {


    //SERIO 


    $('#signup_formAdmin').on('submit', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();
         
        var form = $(this);
      
        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true)
            { 

                var oTable =   $('.table_users').dataTable(); oTable.fnPageChange( 'last' ); swal(data.response_title, data.response_text, "success");  $(form).trigger("reset"); 

                $('.table_users tbody').append('<tr id="'+data.id_user+'" role="row" class="odd"><td class="sorting_1">'+data.id_user+'</td><td>'+data.post_data.username+'</td><td>Activo</td><td><a href="javascript:void(0)" data-id="'+data.id_user+'" class="btn btn-default btn-xs load_userAdmin"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" data-id="'+data.id_user+'" class="btn btn-danger btn-xs delete_userAdmin"><i class="fa fa-remove"></i></a></td></tr>');
            } 
            else 
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true}); 
            }
        },"json").fail(function(xhr, status, error) {

            console.log(error);
            console.log(xhr.responseText);

        });
    });

    $("*").on("click",".clear_notification",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var button = $(this);
        var td = $(this).parent();

        $.post(base_url+'admin/clear_notification', {id : $(this).attr('data-id')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                td.html('Visto');
            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $("*").on("click",".load_addressPayment",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var td = $(this);

        $.post(base_url+'admin/load_addressinfo', {address : $(this).attr('data-address')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                $('#addressInfo_Modal').modal('show');
                $('.paymentinfo_user').html(data.address_info.user.username);
                $('.paymentinfo_father').html(data.address_info.table_father.username);

                $('.paymentinfo_tableid').html(data.address_info.table_id);
                $('.paymentinfo_tabletype').html(data.address_info.table_type);

                $('.paymentinfo_tableview').attr('data-type',data.address_info.table_type);
                $('.paymentinfo_tableview').attr('data-id',data.address_info.table_id);

            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $("*").on("click",".load_userAdmin",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var td = $(this);

        $.post(base_url+'admin/load_userinfo', {id_user : $(this).attr('data-id')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                $('#userEdit_Modal').modal('show');
                $('.user_username').html(data.user_info.username);
                $('#edit_id').val(data.user_info.id_user);
                $('#edit_name').val(data.user_info.name);
                $('#edit_username').val(data.user_info.username);
                $('#edit_defaultusername').val(data.user_info.username);
                $('#edit_email').val(data.user_info.email);
                $('#edit_password').val(data.user_info.password);
                $('#default_password').val(data.user_info.password);
                $('#edit_bitcoinaddress').val(data.user_info.bitcoin_wallet);
                $('#edit_skype').val(data.user_info.skype);
                $('#edit_ref').val(data.user_info.ref);
                $('#edit_status').val(data.user_info.active);
                $('#edit_donation').val(data.user_info.donation);
                $('#edit_money').val(data.user_info.money);

            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $("*").on("click",".mark_as_paid",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if (confirm('Desea confirmar que ya realizo el pago?')) {
            
          } else {
            return;
          }

        var td = $(this).parent();

        $.post(base_url+'admin/mark_as_paid', {id_paid_cycle : $(this).attr('data-id')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                swal(data.response_title, data.response_text, "success");
                td.html('Pagado');
            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $("*").on("click",".delete_userAdmin",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if (confirm('Desea eliminar este usuario?')) {
            
          } else {
            return;
          }

        var td = $(this);

        $.post(base_url+'admin/delete_user', {id_user : $(this).attr('data-id')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                swal(data.response_title, data.response_text, "success");
                $('tr#'+data.id_user).remove();
            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $('#edituser_formAdmin').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);

        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            $('#userEdit_Modal').modal('hide');
            console.log(data);
            if(data.response == true)
            {  

                swal(data.response_title, data.response_text, "success"); 
                $('tr#'+data.posted_data.id).children(':nth-child(2)').html(data.posted_data.username);
                $('tr#'+data.posted_data.id).children(':nth-child(3)').html(getStatus(data.posted_data.status));
                $('tr#'+data.posted_data.id).children(':nth-child(4)').html(getDonationStatus(data.posted_data.donation));
            } 
            else 
            {   
                swal({title:'Error', type: "error", text: data.errors, html: true});    
            }
        },"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
    })


    $("#imageupload_newuser_admin").uploadFile({
        url:base_url+"profile/uploadimg/",
        dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
        uploadStr:"Subir",
        fileName:"imgPerfil",
        showPreview:true,
        maxFileCount:1,
        previewHeight: "100px",
        previewWidth: "100px",
        acceptFiles:"image/*",
        showDelete: true,
        deleteCallback: function (data, pd) {
            $("#image_input_newuser").val('profile.png');
        },
        onSuccess:function(files,data,xhr,pd)
        {
            var img = JSON.parse(data);

            $("#image_input_newuser").val(img);
        }
    });

    $("#imageupload_edituser_admin").uploadFile({
        url:base_url+"profile/uploadimg/",
        dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
        uploadStr:"Subir",
        fileName:"imgPerfil",
        showPreview:true,
        maxFileCount:1,
        previewHeight: "100px",
        previewWidth: "100px",
        acceptFiles:"image/*",
        showDelete: true,
        deleteCallback: function (data, pd) {
            $("#image_input_edituser").val($("#default_image_input").val());
        },
        onSuccess:function(files,data,xhr,pd)
        {
            var img = JSON.parse(data);

            $("#image_input_edituser").val(img);
        }
    });

    $("*").on("click",".load_tablePreview",function(e){

        if($('#addressInfo_Modal').length > 0)
        {
            $('#addressInfo_Modal').modal('hide');
        }


        e.preventDefault();
        e.stopImmediatePropagation();

        var td = $(this);
        var table_type = $(this).attr('data-type');

        $.post(base_url+'admin/load_tableinfo', {table_id : $(this).attr('data-id'), table_type: $(this).attr('data-type')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                if(table_type == 1)
                {
                    $('#preview_table_one').modal('show');
                    $('#table1_preview_father').html(data.table_father_info.username);
                    $('#table1_preview_father_image').attr('src',base_url+'assets/images/users/'+data.table_father_info.profile_image);

                    if(data.table_users_info[1] != false)
                    {
                        $('#table1_preview_child_1').html(data.table_users_info[1].username);
                        $('#table1_preview_child_1_image').attr('src',base_url+'assets/images/users/'+data.table_users_info[1].profile_image);
                        if(data.table_info.tb1_child_1_active == 0)
                        {
                            $('#table1_preview_child_1').append('<br>(Inactivo)');
                            $('#table1_preview_child_1_image').addClass('un-paid-user');
                        }
                        else
                        {
                            $('#table1_preview_child_1').append('<br>(Activo)');
                            $('#table1_preview_child_1_image').removeClass('un-paid-user');
                        }
                    }
                    else
                    {
                        $('#table1_preview_child_1').html('Buscando');
                        $('#table1_preview_child_1_image').attr('src',base_url+'assets/images/users/profile.png');
                        $('#table1_preview_child_1_image').addClass('un-paid-user');
                    }

                    if(data.table_users_info[2] != false)
                    {
                        $('#table1_preview_child_2').html(data.table_users_info[2].username);
                        $('#table1_preview_child_2_image').attr('src',base_url+'assets/images/users/'+data.table_users_info[2].profile_image);
                        if(data.table_info.tb1_child_2_active == 0)
                        {
                            $('#table1_preview_child_2').append('<br>(Inactivo)');
                            $('#table1_preview_child_2_image').addClass('un-paid-user');
                        }
                        else
                        {
                            $('#table1_preview_child_2').append('<br>(Activo)');
                            $('#table1_preview_child_2_image').removeClass('un-paid-user');
                        }
                    }
                    else
                    {
                        $('#table1_preview_child_2').html('Buscando');
                        $('#table1_preview_child_2_image').attr('src',base_url+'assets/images/users/profile.png');
                        $('#table1_preview_child_2_image').addClass('un-paid-user');
                    }

                    if(data.table_users_info[3] != false)
                    {
                        $('#table1_preview_child_3').html(data.table_users_info[3].username);
                        $('#table1_preview_child_3_image').attr('src',base_url+'assets/images/users/'+data.table_users_info[3].profile_image);
                        if(data.table_info.tb1_child_3_active == 0)
                        {
                            $('#table1_preview_child_3').append('<br>(Inactivo)');
                            $('#table1_preview_child_3_image').addClass('un-paid-user');
                        }
                        else
                        {
                            $('#table1_preview_child_3').append('<br>(Activo)');
                            $('#table1_preview_child_3_image').removeClass('un-paid-user');
                        }
                    }
                    else
                    {
                        $('#table1_preview_child_3').html('Buscando');
                        $('#table1_preview_child_3_image').attr('src',base_url+'assets/images/users/profile.png');
                        $('#table1_preview_child_3_image').addClass('un-paid-user');
                    }

                }
                else
                {
                    $('#preview_table_two').modal('show');
                    $('#table2_preview_father').html(data.table_father_info.username);
                    $('#table2_preview_father_image').attr('src',base_url+'assets/images/users/'+data.table_father_info.profile_image);


                    if(data.table_users_info[1] != false)
                    {
                        $('#table2_preview_child_1').html(data.table_users_info[1].username);
                        $('#table2_preview_child_1_image').attr('src',base_url+'assets/images/users/'+data.table_users_info[1].profile_image);
                        if(data.table_info.tb2_child_1_active == 0)
                        {
                            $('#table2_preview_child_1').append('<br>(Inactivo)');
                            $('#table2_preview_child_1_image').addClass('un-paid-user');
                        }
                        else
                        {
                            $('#table2_preview_child_1').append('<br>(Activo)');
                            $('#table2_preview_child_1_image').removeClass('un-paid-user');
                        }
                    }
                    else
                    {
                        $('#table2_preview_child_1').html('Buscando');
                        $('#table2_preview_child_1_image').attr('src',base_url+'assets/images/users/profile.png');
                        $('#table2_preview_child_1_image').addClass('un-paid-user');
                    }

                    if(data.table_users_info[2] != false)
                    {
                        $('#table2_preview_child_2').html(data.table_users_info[2].username);
                        $('#table2_preview_child_2_image').attr('src',base_url+'assets/images/users/'+data.table_users_info[2].profile_image);
                        if(data.table_info.tb2_child_2_active == 0)
                        {
                            $('#table2_preview_child_2').append('<br>(Inactivo)');
                            $('#table2_preview_child_2_image').addClass('un-paid-user');
                        }
                        else
                        {
                            $('#table2_preview_child_2').append('<br>(Activo)');
                            $('#table2_preview_child_2_image').removeClass('un-paid-user');
                        }
                    }
                    else
                    {
                        $('#table2_preview_child_2').html('Buscando');
                        $('#table2_preview_child_2_image').attr('src',base_url+'assets/images/users/profile.png');
                        $('#table2_preview_child_2_image').addClass('un-paid-user');
                    }


                }
                

            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })



    $("*").on("click",".load_tableEditAdmin",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var td = $(this);
        var table_type = $(this).attr('data-type');
        var table_cycle = $(this).attr('data-var');

        $('.edit_table_id').val($(this).attr('data-id'));
        $('.edit_table_type').val($(this).attr('data-type'));
        $('.edit_table_cycle').val($(this).attr('data-var'));
        $('.edit_cycle_id').val($(this).attr('data-cycle'));


        $.post(base_url+'admin/load_tableinfo', {table_id : $(this).attr('data-id'), table_type: $(this).attr('data-type')}, function(data) {
            console.log(data);
            if(data.response == true)
            {
                if(table_type == 1)
                {
                    $('#edit_table_one').modal('show');
                    $('#tb1_father').val(data.table_father_info.id_user).trigger("change");
                    $('#tb1_father_default').val(data.table_father_info.id_user);
                    $('#tb1_child_1_active').val(data.table_info.tb1_child_1_active).trigger("change");
                    $('#tb1_child_2_active').val(data.table_info.tb1_child_2_active).trigger("change");
                    $('#tb1_child_3_active').val(data.table_info.tb1_child_3_active).trigger("change");

                    $('#tb1_active').val(data.table_info.tb1_active).trigger("change");
                    

                    if(data.table_users_info[1] != false)
                    {
                        $('#tb1_child_1').val(data.table_users_info[1].id_user).trigger("change");
                        $('#tb1_child_1_default').val(data.table_users_info[1].id_user);
                    }
                    else
                    {
                        $('#tb1_child_1').val('').trigger("change");
                    }
                    

                    if(data.table_users_info[2] != false)
                    {
                        $('#tb1_child_2').val(data.table_users_info[2].id_user).trigger("change");
                        $('#tb1_child_2_default').val(data.table_users_info[2].id_user);
                    }
                    else
                    {
                        $('#tb1_child_2').val('').trigger("change");
                    }

                    

                    if(data.table_users_info[3] != false)
                    {
                        $('#tb1_child_3').val(data.table_users_info[3].id_user).trigger("change");
                        $('#tb1_child_3_default').val(data.table_users_info[3].id_user);
                    }
                    else
                    {
                        $('#tb1_child_3').val('').trigger("change");
                    }
                }
                else
                {
                    $('#edit_table_two').modal('show');
                    $('#tb2_father').val(data.table_father_info.id_user).trigger("change");
                    $('#tb2_father_default').val(data.table_father_info.id_user);
                    $('#tb2_child_1_active').val(data.table_info.tb2_child_1_active).trigger("change");
                    $('#tb2_child_2_active').val(data.table_info.tb2_child_2_active).trigger("change");

                    
                    if(data.table_users_info[1] != false)
                    {
                        $('#tb2_child_1').val(data.table_users_info[1].id_user).trigger("change");
                        $('#tb2_child_1_default').val(data.table_users_info[1].id_user);
                    }
                    else
                    {
                        $('#tb2_child_1').val('').trigger("change");
                    }


                    

                    if(data.table_users_info[2] != false)
                    {
                        $('#tb2_child_2').val(data.table_users_info[2].id_user).trigger("change");
                        $('#tb2_child_2_default').val(data.table_users_info[2].id_user);
                    }
                    else
                    {
                        $('#tb2_child_2').val('').trigger("change");
                    }

                }
            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $('.admin_edittable_form').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);

        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            $('#edit_table_one').modal('hide');
            $('#edit_table_two').modal('hide');
            console.log(data);
            if(data.response == true)
            {  

                swal(data.response_title, data.response_text, "success"); 

            } 
            else 
            {   
                swal({title:'Error', type: "error", text: data.errors, html: true});    
            }
        },"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
    })

    $('.table-add-admin').on('click', function(){
        $(this).addClass('hidden');
        $('#'+$(this).attr('sec-show')+'_active').val(1);
        $('.del_mesa').addClass('hidden');
        $('.del_'+$(this).attr('sec-show')).removeClass('hidden');
        $('#sec_'+$(this).attr('sec-show')).removeClass('hidden');
    })

    $('.del_mesa_button').on('click', function(){
        $(this).addClass('hidden');
        $('.del_mesa').addClass('hidden');
        $('.del_'+$(this).attr('sec-show')).removeClass('hidden');
        $('#sec_'+$(this).attr('sec-show')).removeClass('hidden');
    })

    $('#cycle_user').change(function()
    {
        $('.cycle_user').val($("#cycle_user option:selected").text());
    })

    $('#admin_addcycle_form').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);

        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){ swal(data.response_title, data.response_text, "success"); console.log(data); }
            if(data.response == false){ swal({title:'Error', type: "error", text: data.errors, html: true});  }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $('#table_type').change(function(){
        console.log($(this).val());
        if($(this).val() == 1)
        {
          $('#child_3_select').removeClass('hidden');
        }
        else
        {
          $('#child_3_select').addClass('hidden');
        }
    })

    $("*").on("click",".delete_tableAdmin",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if (confirm('Desea eliminar esta mesa?')) {
            
          } else {
            return;
          }

        var td = $(this).parent();

        $.post(base_url+'admin/delete_table', {table_id : $(this).attr('data-id'), table_type: $(this).attr('data-type')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                swal(data.response_title, data.response_text, "success");
                td.html('');
            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

    $("*").on("click",".delete_cycleAdmin",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if (confirm('Desea eliminar este ciclo / cuenta?')) {
            
          } else {
            return;
          }

        var td = $(this).parent();
        var tr = td.parent();

        $.post(base_url+'admin/delete_cycle', {id_cycle : $(this).attr('data-id')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                swal(data.response_title, data.response_text, "success");
               tr.remove();
            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })


})(jQuery);

function getStatus(n)
{
    console.log(n);
    if(n == 1)
    {
        var $msg = 'Activo';
        return $msg;
    }

    if(n == 0)
    {
        var $msg = 'Inactivo';
        return $msg;
    }
}

function getDonationStatus(n)
{
    console.log(n);
    if(n == 1)
    {
        var $msg = 'Debe';
        return $msg;
    }

    if(n == 0)
    {
        var $msg = 'Pagado';
        return $msg;
    }
}