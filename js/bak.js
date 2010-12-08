/*============================ START CREATE CATEGORY 
============================================================================= */

    $('#add_category').submit(function(event){
        //submit xong thì show cái loading lên.
    
        var cat_name = $('#cat_name').val();
        
         // kiểm tra category rỗng
         if (cat_name == '') {
            $('#success_box').hide();
            $('#error_box').html('Vui lòng nhập tên category.').slideDown('fast');
            return false;
         }else{
            //gọi ajax
            $.ajax({
                    type: "POST",
                    url: site_url,
                    data: "model=category&action=add_category&"+$('#add_category').serialize(),
                    dataType: "json",
                    success: function(msg){                    
                        if(msg.response == 'error'){
                            $('#success_box').hide();
                            $('#error_box').html(msg.message).slideDown('fast');
                        } else {
                            $('#error_box').hide();
                            $('#success_box').html(msg.message).slideDown('fast', function(){
                                $(this).fadeOut(10000);
                            });
                            $('#cat_name, #cat_info').val('');$('#parent_id').val(0);
                            $('#parent_id').html(msg.category_select);
                            $('#category').html('');
                            $('#category').html(msg.category_list);
                            $('.root').accordion({
                    			collapsible: true,
                                active: false
                    		});
                        } 
                    },
                    error: function(msg){
                        alert(msg);
                    }
            });   
         }
        return false;
        })
//============================ END CREATE CATEGORY ===================================