$(function(){

    $("#staffform").on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
               // alert(data);
               if(data.status==0){
                   $.each(data.error,function(prefix,val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
               }else if(data.status==1){
                Swal.fire({
                    title: 'info',
                    text: data.msg,
                    icon: 'Info',
                  });
               }else if(data.status==2){
                //    alert(data.msg);
                   Swal.fire({
                    title: 'Not found',
                    text: data.msg,
                    icon: 'danger',
                  });
               }else if(data.status==3){
                // alert(data.msg);
                Swal.fire({
                    title: 'Not found',
                    text: data.msg,
                    icon: 'success',
                  });

               }else if(data.status==4){
                // alert(data.msg);
                Swal.fire({
                    title: 'Not found',
                    text: data.msg,
                    icon: 'Info',
                  });

               }else if(data.status==5){
                // alert(data.msg);
                Swal.fire({
                    title: 'Not found',
                    text: data.msg,
                    icon: 'Info',
                  });

               }else if(data.status==6){
                // alert(data.msg);
                Swal.fire({
                    title: 'Ivalid details',
                    text: data.msg,
                    icon: 'Info',
                  });
               }else if(data.status==7){
                var staffsignin=jQuery("#staffsignin").text("Redirecting to home....");
                setTimeout(function() {
                    window.location.href="/homepage";
                    // staffsignin.text("Landlord signin");
                    }, 2000);

               }else{
                $('#staffform')[0].reset();
                alert(data.msg);
               }
            }
        });
    });






//landlord form
$("#landlordform").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success:function(data){
           if(data.status==8){
               $.each(data.error,function(prefix,val){
                $('span.'+prefix+'_error').text(val[0]);
            });
           }else if(data.status==9){
            //    alert(data.msg);
            Swal.fire({
                title: 'Not found',
                text: data.msg,
                icon: 'Info',
              });
           }else if(data.status==10){
               alert(data.msg);
               Swal.fire({
                title: 'Not found',
                text: data.msg,
                icon: 'Primary',
              });
           }else if(data.status==11){
            // alert(data.msg);
            Swal.fire({
                title: 'User Not found',
                text: data.msg,
                icon: 'Success',
              });

           }else if(data.status==12){
            // alert(data.msg);
            Swal.fire({
                title: 'Code Not found',
                text: data.msg,
                icon: 'Info',
              });

           }else if(data.status==13){
            // alert(data.msg);
            Swal.fire({
                title: 'Invalid',
                text: data.msg,
                icon: 'Danger',
              });

           }else if(data.status==14){
            var landlordloginbtn=jQuery("#landlordloginbtn").text("Please wait....");
            setTimeout(function() {
                window.location.href="/landlordhomepage";
                // landlordloginbtn.text("Landlord signin");
                }, 2000);
           }else{
            $('#landlordform')[0].reset();
            alert(data.msg);
           }

        }
    });
});
//tenant

//landlord form
$("#tenantformlogin").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success:function(data){
           if(data.status==15){
               $.each(data.error,function(prefix,val){
                $('span.'+prefix+'_error').text(val[0]);
            });
           }else if(data.status==16){
            // alert(data.msg);
            Swal.fire({
                title: 'Unknown',
                text: data.msg,
                icon: 'danger',
              });

           }else if(data.status==17){
            // alert(data.msg);
            Swal.fire({
                title: 'Configuration',
                text: data.msg,
                icon: 'info',
              });
             } else if(data.status==18){
                // alert(data.msg);
                Swal.fire({
                    title: 'Invalid',
                    text: data.msg,
                    icon: 'info',
                  });
           }else if(data.status==19){
            Swal.fire({
                title: 'Invalid',
                text: data.msg,
                icon: 'info',
              });
        }else if(data.status==20){
            Swal.fire({
                title: 'Invalid',
                text: data.msg,
                icon: 'success',
              });
        }else if(data.status==21){
            var tenantloginbtn=jQuery("#tenantloginbtn").text("Please wait....");
            setTimeout(function() {
                window.location.href="/loggedtenant/statement";
                // tenantloginbtn.text("Landlord signin");
                }, 2000);
           }else{
            $('#tenantformlogin')[0].reset();
            alert(data.msg);
           }
        }
    });
});

});
