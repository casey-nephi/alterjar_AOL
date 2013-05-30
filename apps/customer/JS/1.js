$(document).ready(function(){
/*window.onload=function(){
        url=window.location.href;
        if(url.indexOf('#')>=0){
            url1=url.split('#');
            url1=url1[1];
            locations= Array();
            locations=['tc','th','tl','ta'];
            for(var x in locations){
                if(url1==locations[x]){
                  $('#'+url1).show();
                }else{
                  $('#'+locations[x]).hide();
                }

            }
        }else{
          window.location.href="http://localhost/casey/library/customer/index.php";

        }

      }*/
  //---------------------------------------------------

    /*$("#hello").dialog({
        autoOpen:true,
        resizable: false,
        modal:true,
        show:"bounce",
        hide:"explode",
        width:600,
        buttons:{

            "OK":function(){
                $(this).dialog("close");
            }
        }

    });*/
    

    $.ajax({
        type:"POST",
        url:"user.php",
        success: function(data){

            var obj= JSON.parse(data);


            $("input[name='fname']").val(obj.fname);
            $("input[name='lname']").val(obj.lname);
            $("input[name='address']").val(obj.address);
            $("input[name='num']").val(obj.num);



        },
        error: function(data){
            alert(JSON.stringify(data));
        }
    });

  //---------------------------------------------------

     $("#order").hide();
     $("#alert").hide();
     $("#decoy").hide();
     $("#preimage").hide();
      $("#image").hide();
  
  //----------------------
     $('#s_a').keyup(function(){
     
        var NameObj = {'Name':$(this).val()};
  
         $.ajax({
            
            type: "POST",
            url:"SearchActionBook.php",
            data:NameObj,
            success: function(data){          
              $('#tab').html(data);       
            },
            error:function(data){
              alert(data);

            }

        });
    });
    
    $('#s_l').keyup(function(){
    
        var NameObj = {'Name':$(this).val()};
      
         $.ajax({
            
            type: "POST",
            url:"SearchLoveBook.php",
            data:NameObj,
            success: function(data){          
              $('#tlb').html(data);       
            },
            error:function(data){
              alert(data);

            }

         });
    });
    
    $('#s_h').keyup(function(){
    
        var NameObj = {'Name':$(this).val()};
  
          $.ajax({
              
              type: "POST",
              url:"SearchHorrorBook.php",
              data:NameObj,
              success: function(data){          
                $('#thb').html(data);       
              },
              error:function(data){
                alert(data);

              }

          });
    });
    
    $('#s_c').keyup(function(){
    
        var NameObj = {'Name':$(this).val()};
  
          $.ajax({
              
              type: "POST",
              url:"SearchComedyBook.php",
              data:NameObj,
              success: function(data){          
                $('#tcb').html(data);       
              },
              error:function(data){
                alert(data);

              }

          });
    });

    //----------------------
    
    $("#tl").hide();
    
    $("#love").click(function(){
      
      $('#ta').hide();
      $('#tc').hide();
      $('#th').hide();
      $("#tl").slideToggle(200);
      $("#preimage").hide();

        $.ajax({
            type: "POST",
            url: "view_Love.php",
            success: function(data){
                $("#tlb").html(data);
            },
            error: function(data){
                alert(data);
            }
        });
    
    });
  

  //-------------------------------------------------

    $("#ta").hide();

    $("#action").click(function(){

    $('#tl').hide();
    $('#tc').hide();
    $('#th').hide();
    $("#ta").slideToggle(200);
    $("#preimage").hide();

        $.ajax({
            type: "POST",
            url: "view_Action.php",
            success: function(data){
                $("#tab").html(data);
            },
            error: function(data){
                alert(data);
            }
        });

    });



  //-----------------------------------------------

    $("#tc").hide();

    $("#comedy").click(function(){

    $('#tl').hide();
    $('#ta').hide();
    $('#th').hide();
    $("#tc").slideToggle(200);
    $("#preimage").hide();

        $.ajax({
            type: "POST",
            url: "view_Comedy.php",
            success: function(data){
                $("#tcb").html(data);
            },
            error: function(data){
                alert(data);
            }
        });

    });



  //-------------------------------------------------------

   $("#th").hide();
  $("#horror").click(function(){
  $('#tl').hide();
  $('#tc').hide();
  $('#ta').hide();
    $("#th").slideToggle(200);
    $("#preimage").hide();

      $.ajax({
          type: "POST",
          url: "view_Horror.php",
          success: function(data){
              $("#thb").html(data);
          },
          error: function(data){
              alert(data);
          }
      });
  });


    //-------------------------------------------------


   

});


function rentbook (id) {


    var idObj={"id":id};


     
                  $.ajax({
                      type:"POST",
                      data:idObj,
                      url:"orderbook.php",
                      success: function(data){
                        
                          var obj= JSON.parse(data);
                          
                          
                          $("input[name='title']").val(obj.title);
                          $("input[name='rent']").val(obj.rent);
                          $("input[name='stock']").val(obj.stock);
                          
                         
                      
                      },
                      error: function(data){
                          alert(JSON.stringify(data));
                      }
                });


      $("#order").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"clip",
            hide:"explode",
            width:400,
            buttons:{
              "order":function(){

                    if($("input[name='stock']").val() == 0){
                          
                           $("#stock_alert").dialog({
                            autoOpen:true,
                            resizable: false,
                            modal:true,
                            show:"bounce",
                            hide:"explode",
                            width:600,
                            buttons:{
                              
                                  "OK":function(){
                                    $(this).dialog("close");
                                  }
                            }
                      });

                    }else{



                                         var date = rentDate();
                                         var date1 = dueDate();   

                                         var orderObj={

                                             "title":$("input[name='title']").val(),
                                             "rent":$("input[name='rent']").val(),
                                             "date":date,
                                             "dueDate":date1,
                                             "No_book":$("select[name='No_books']").val(),
                                             "Deliver":$("select[name='deliver']").val(),
                                             "Fname":$("input[name='fname']").val(),
                                             "Lname":$("input[name='lname']").val(),
                                             "address":$("input[name='address']").val(),
                                             "Num":$("input[name='num']").val()

                                         };

                                                  $.ajax({
                                                    type:"POST",
                                                    url:"orderlist.php",
                                                    data:orderObj,
                                                    success:function(data){
                                                
                                                      $(document.location.reload(true));
                                                    
                                                    },
                                                    error:function(data){
                                                          alert(data);
                                                  }
                                                    
                                                  });




                                        

                                      }

                    

                                 $(this).dialog("close");
                  
                                  },
                                  "Cancel":function(){
                                    $(this).dialog("close");
                                  }
                            }
                      });
                


     

   




}
function preview(id){

  $("#preimage").show();

  var idObj={"id":id};
  
     $.ajax({
       type:"POST",
       url:"preview.php",
       data:idObj,
       success:function(data){
                        
          $("#preimage").html(data);
                            
       },
       error:function(data){
          alert(data);
       }

     });

      $("#image").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"clip",
            hide:"explode",
            width:180,
            buttons:{
              
                                  "OK":function(){
                                    $(this).dialog("close");
                                  }
                            }
                      });


}
//---------------------------------------------------------
function rentDate(){
  var d = new Date();
  var dt = d.getDate();
  var mn = d.getMonth()+1;
  var yr = d.getFullYear();
  var present = yr +"-"+ mn +"-"+ dt;
  return present; 
}
function dueDate(){
  var d = new Date();
  var dt = d.getDate()+3;
  var mn = d.getMonth()+1;
  var yr = d.getFullYear();
  var future = yr +"-"+ mn +"-"+ dt;
  return future; 
}










