
    $('body').on('click','#religion_other',function(){
       
      if( $('#religion_other').prop("checked") === true)
      {
        $('.specify_religion').show();
      }
      else
      {
        $('.specify_religion').hide();
      }
    });
     $('body').on('click','#christian,#muslim,#hindu',function(){
         $('.specify_religion').hide();
     });
         
    
    
    $('body').on('click','.add_another',function(){
        
        var id = $(this).data('id');
    
      
        if(id=='add_tel_business')
        {
            $('#additional_tel_business').show();
        }
        if(id=='add_email_private')
        {
            $('#additional_email_private').show();
      
        }
        if(id=='add_email_business')
        {
            $('#additional_email_business').show();
    
        }
         if(id=='add_company_website')
        {
           $('#additional_company_website').show();
    
        }
         if(id=='add_child_name')
        {
           $('#additional_child_name').show();
        }
        
    });
    
    $('body').on('click','.remove_additional_field',function(){
        
        var div_id = '#'+ $(this).data('id');
        console.log(div_id);
        $(this).closest(div_id).hide();
        
    });
    
    $('body').on('click','#hear_about_us',function(){
        
        var id= $(this).val();
        if($.inArray($(this).val(), ['1', '2', '3','9']) >= 0) {
            
            $('#specify_name_hear_about_us').show();
            console.log(id);
        }
        else
        {
             $('#specify_name_hear_about_us').hide();
        }
        
        if(id==='8')
        {
             $('#internet_socialmedia').show();
             $('#specify_name_hear_about_us').hide();
        }
        else
        {
             $('#internet_socialmedia').hide();
        }
        
    });
    
    $('body').on('click','#internet_social_md',function(){
        
        var id= $(this).val();
        
        if(id==='9')
        {
             $('#specify_other_media').show();
        }
        else
        {
             $('#specify_other_media').hide();
        }
        
    });
    
    
    $('body').on('click','#categories_nature',function(){
        
        var id= $(this).val();
        
        if(id==='1')
        {
             $('#active_client').show();
        }
         else
        {
             $('#active_client').hide();
        }
        if($.inArray(id, ['2', '3','5']) >= 0)
        {
            $('#category_other_sub').show();
            $('#active_client').hide();
        }
        else
        {
             $('#category_other_sub').hide();
        }
        
    });
    
    $('body').on('click','#active_client_val',function(){
        
        var id= $(this).val();
        
        if($.inArray(id, ['5', '6']) >= 0)
        {
             $('#speech_theraphy').show();
        }
        else
        {
             $('#speech_theraphy').hide();
        }
        if($.inArray(id, ['8', '9','10','11','12']) >= 0)
        {
            $('#specify_other_active').show();
           
        }
        else
        {
            
             $('#specify_other_active').hide();
        }
        
    });
    
    $('body').on('click','#speech_theraphy',function(){
        
      if( $('#speech_outreach').prop("checked") === true)
      {
        $('#specify_other_active').show();
      }
      if( $('#speech_centre').prop("checked") === true)
      {
        $('#specify_other_active').hide();
      }
    });
    
    $.validator.addMethod("email", function (value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
    }, "Please enter a valid email address.");
    
    $("#marketing_form").validate({
        rules: {
             fname:{ required:true,
             },
             mobile_no:{ 
                required:true,
                number: true
             },
             email:{
                 required:true,
                 email:true
             },
             hear_about_us:"required",
             categories_nature:"required"
        },
         messages: {
              email: "Please enter a valid email address.",
        },
        errorElement : 'span',
        errorPlacement: function(error, element) {
        if (element.attr("name") == "email" )
            error.appendTo('#error_element_email');
    },  
    submitHandler: function(form) {
        
        var data ={};
        $('.insert').each(function(){
           
           if($(this).val())
           {
             data[$(this).data('id')]=$(this).val();
           }
        });
         if( $('input[name=religion]:checked').val() =='Other')
         {
           data['religion'] =$('#specify_religion').val();
         } 
         else
         {
             data['religion'] =$('input[name=religion]:checked').val();
         }
          if( $('input[name=speech_lang]:checked').val() =='Outreach')
         {
            data['therapy_specify'] ='Outreach';
            data['specify_other_active'] =$('#specify_other_active').val();
         } 
         else
         {
             data['therapy_specify'] ='Centre';
         }
         data['news_letter']=$('input[name=newsletter]:checked').val();

          var json = JSON.stringify(data);
          console.log(json);
              $.ajax({
                url: "insert_marketing", 
                type: "POST",             
                data:"json="+json,
                cache: false,             
                processData: false,      
                success: function(data) {
                        console.log(data);
                        $('#success-message').html('Form Added Successfully');
                        $('.alert-success').show();
                        $('.alert-success').slideDown(500);
                        setTimeout(function () {
                        $('.alert-danger').slideUp(500);
                         window.location = base_url + 'Home/marketing';
                        }, 2000);
                }
            });
        return false;
    }
    });
    
   $(function(){
        var table = $('#marketing_view');

        var oTable = table.dataTable({
            "language": 
            {
                "aria": 
                {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            dom: 'Bfrtip',
            buttons: [
                /*{ extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline',orientation: 'landscape',pageSize: 'LEGAL',
                exportOptions: {columns: [0, 1, 5, 6, 8, 9, 10, 11, 12,13,14,15,16,17,18,]},
                 },*/
                { extend: 'csv', className: 'btn purple btn-outline ',exportOptions: {columns: [1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]}},
            ],

            "order": [[0, 'asc']],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "columnDefs": [
                { "targets": [ 0 ],"visible": false},
                { "targets": [ 2 ],"visible": false},
                { "targets": [ 3 ],"visible": false},
                { "targets": [ 6 ],"visible": false},
                { "targets": [ 8 ],"visible": false },
                 { "targets": [ 11 ],"visible": false},
                { "targets": [ 12 ],"visible": false},
                { "targets": [ 13 ],"visible": false},
                { "targets": [ 14 ],"visible": false},
                { "targets":[ 15 ],"visible": false},
                { "targets":[ 16 ],"visible": false},
                { "targets":[ 17 ],"visible": false},
                { "targets":[ 18 ],"visible": false},
                { "targets":[ 19 ],"visible": false},
                { "targets":[ 20 ],"visible": false},
                { "targets":[ 21 ],"visible": false},
                { "targets":[ 22 ],"visible": false},
                { "targets":[ 23 ],"visible": false},
                { "targets":[ 24 ],"visible": false},
                { "targets":[ 25 ],"visible": false},
                 { "targets":[ 26 ],"visible": false},
            ],
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", 
         
            
        });
      
        
        $('#startdate').on('change', function(e){
            e.preventDefault();
           
            $.fn.dataTableExt.afnFiltering.length = 0;
            table.dataTable().fnDraw();
            
            $('#enddate').val('');
            
            var startDate = new Date($('#startdate').val()).getTime();
            startDate     = Math.floor(startDate/1000);
            
            if(($('#enddate').val()===''&& $('#startdate').val()==='')||($('#enddate').val()!=='')&&($('#startdate').val()===''))
            {
                $.fn.dataTableExt.afnFiltering.length = 0;
                table.dataTable().fnDraw();
            
            }
               
            filterByDate(0, startDate, endDate); 
            table.dataTable().fnDraw(); 
            
          
        });
        $('#enddate').on('change', function(e){
            e.preventDefault();
           
            $.fn.dataTableExt.afnFiltering.length = 0;
            table.dataTable().fnDraw();
            
           
            var startDate = new Date($('#startdate').val()).getTime();
            startDate = Math.floor(startDate/1000);
            
    
            var endDate = new Date($('#enddate').val()).getTime();
                endDate = Math.floor(endDate/1000);
                
            
            
            filterByDate(0, startDate, endDate); 
            table.dataTable().fnDraw(); 
        });
        
  
        var filterByDate = function(column, startDate, endDate) 
        {
            
    		$.fn.dataTableExt.afnFiltering.push(
    		   	function(oSettings, aData, iDataIndex ) 
    		   	{
    		   	    var rowDate = aData[column];
    		   	    console.log(rowDate);
    		   	    
                if (startDate <= rowDate && rowDate <= endDate) 
                {
                return true;
                } else if (rowDate >= startDate && endDate === '' && startDate !== ''){
                return true;
                } else if (rowDate <= endDate && startDate === '' && endDate !== ''){
                return true;
                }  else if (startDate>=rowDate && rowDate>=endDate){
                return true;
                } 
                else if (startDate==='' && endDate===''){
                $.fn.dataTableExt.afnFiltering.length = 0;
                table.dataTable().fnDraw();
            
                } 
                else {
                return false;
                }
                }
    		);
        	
        };
    
    });
    $('body').on('click', '.delete_marketing', function () {
        
    var marketing_id = $(this).attr('marketing_id');
    console.log(marketing_id);
    Lobibox.confirm({
        msg: 'Are You Sure Do Want Delete ? ',
        callback: function ($this, type) {
            console.log(type);
            if (type === 'yes') {
                var data = {id: marketing_id};
                $.ajax({
                    url: base_url + "Home/delete_marketing",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        
                       
                     window.location = base_url + "Home/view_marketing";
                        
                    }
                });
            }
        }
        });
    });
 
    $('body').on('click','#update_marketing',function()
    {
       
       var id =$(this).data('id');

        $("#edit_marketing_form").validate({
            rules: {
                 fname:{ required:true,
                 },
                 mobile_no:{ 
                    required:true,
                    number: true
                 },
                 email:{
                     required:true,
                     email:true
                 },
                 hear_about_us:"required",
                 categories_nature:"required"
            },
             messages: {
                  email: "Please enter a valid email address.",
            },
            errorElement : 'span',
            errorPlacement: function(error, element) {
            if (element.attr("name") == "email" )
                error.appendTo('#error_element_email');
        },  
        submitHandler: function(form) {
            
            var data ={};
            $('.insert').each(function(){
               
               if($(this).val())
               {
                 data[$(this).data('id')]=$(this).val();
               }
            });
             if( $('input[name=religion]:checked').val() =='Other')
             {
               data['religion'] =$('#specify_religion').val();
             } 
             else
             {
                 data['religion'] =$('input[name=religion]:checked').val();
             }
              if( $('input[name=speech_lang]:checked').val() =='Outreach')
             {
                data['therapy_specify'] ='Outreach';
                data['specify_other_active'] =$('#specify_other_active').val();
             } 
             else
             {
                 data['therapy_specify'] ='Centre';
             }
             data['news_letter']=$('input[name=newsletter]:checked').val();
             data['id']=id;
    
              var json = JSON.stringify(data);
              console.log(json);
                  $.ajax({
                    url: base_url + "home/update_marketing", 
                    type: "POST",             
                    data:"json="+json,
                    cache: false,             
                    processData: false,      
                    success: function(data) {
                            console.log(data);
                            if(data)
                            {
                            $('#success-message').html('Form Updated Successfully');
                            $('.alert-success').show();
                            $('.alert-success').slideDown(500);
                            setTimeout(function () {
                            $('.alert-danger').slideUp(500);
                             window.location = base_url + 'Home/view_marketing/';
                            }, 2000);
                            }
                            else
                            {
                               $('.alert-danger').show();
                                $('#success-error').html('Try Again')
                                $('.alert-danger').slideDown(500);
                                setTimeout(function () {
                                    $('.alert-danger').slideUp(500);
                                }, 2000);  
                            }
                            
                    }
                });
            return false;
        }
        });
  
});
    
    
    
    
    
    

 