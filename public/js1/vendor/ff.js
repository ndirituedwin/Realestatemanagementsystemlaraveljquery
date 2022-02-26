// $(function(){
    jQuery(document).ready(function(){
        $.ajaxSetup({
          headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          }
        });
    

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
                    }, 0);

               }else{
                $('#staffform')[0].reset();
                alert(data.msg);
               }
            }
        });
    });

/**sales agent */
$("#salesagentform").on('submit', function(e){
    e.preventDefault();
  var salesagent=jQuery("#selecttype").val();
//   alert(salesagent);
 var data= new FormData(this)
  data.append('salesagent',salesagent);
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:data,
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
            var salesagentsignin=jQuery("#salesagentsignin").text("Redirecting to home....");
            setTimeout(function() {
                window.location.href="/homepage";
                // salesagentsignin.text("Landlord signin");
                }, 0);

           }else{
            $('#salesagentform')[0].reset();
            alert(data.msg);
           }
        }
    });
});

/** end */
/**sales client */
$("#salesclientform").on('submit', function(e){
    e.preventDefault();
//   var salesclient=jQuery("#selecttype").val();
//   alert(salesclient);
 var data= new FormData(this)
//   data.append('salesclient',salesclient);
    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:data,
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
            var salesclientsignin=jQuery("#salesclientsignin").text("Redirecting to home....");
            setTimeout(function() {
                window.location.href="/salesclient";
                // salesclientsignin.text("Landlord signin");
                }, 0);

           }else{
            $('#salesclientform')[0].reset();
            alert(data.msg);
           }
        }
    });
});
/** end */






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
                }, 0);
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
                }, 0);
           }else{
            $('#tenantformlogin')[0].reset();
            alert(data.msg);
           }
        }
    });
});
            // setInterval(showTime, 1000);
            // function showTime() {
            // let time = new Date();
            // let hour = time.getHours();
            // let min = time.getMinutes();
            // let sec = time.getSeconds();
            // am_pm = "AM";

            // if (hour > 12) {
            //     hour -= 12;
            //     am_pm = "PM";
            // }
            // if (hour == 0) {
            //     hr = 12;
            //     am_pm = "AM";
            // }

            // hour = hour < 10 ? "0" + hour : hour;
            // min = min < 10 ? "0" + min : min;
            // sec = sec < 10 ? "0" + sec : sec;

            // let currentTime = hour + ":"
            //     + min + ":" + sec +am_pm;

            // document.getElementById("ccclock")
            //     .innerHTML = currentTime;
            // // jQuery("#clock").innerHtml().val(currentTime);
            // }
            // showTime();

});
