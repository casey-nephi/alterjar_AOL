$(document).ready(function(){


/*window.onload=function(){
        url=window.location.href;
        if(url.indexOf('#')>=0){
            url1=url.split('#');
            url1=url1[1];
            locations= Array();
            locations=['d_orders','p_orders','add_form','v_menu'];
            for(var x in locations){
                if(url1==locations[x]){
                  $('#'+url1).show();
                }else{
                  $('#'+locations[x]).hide();
                }

            }
        }else{
          window.location.href="http://localhost/casey/library/librarian/index.php#pic";

        }

      }*/
  //=---------------------------------------------------------------------------------------------------------

$("#p_orders").hide();
$("#d_orders").hide();
$("#orders").hide();
$("#v_menu").hide();
$("#add_form").hide();
$("#alert").hide();
$("#info_d").hide();
$(".show_name").hide();
$("#search_name_div").hide();



/////////////////////////////////////////////////
   
  
$("#add").click(function(){
       $("#v_menu").hide();
       $("#add_form").show();
       $("#pic").hide();
       $("#orders").hide();
});

$("#list").click(function(){
       $("#v_menu").show();
       $("#add_form").hide();
       $("#pic").hide();
       $("#orders").hide();
});
	   
$("#d_books").click(function(){
       $("#p_books").show();
       $("#d_orders").show();
       $("#d_books").hide();
       $("#p_orders").hide();
       $("#orders").show();
       $("#pic").hide();
       $("#add_form").hide();
       $("#v_menu").hide();
       $(".show_name").hide();
       $("#h_d").hide();
       $("#H_dd").hide();

       
       $("#name_change").html("DELIVERIES");
       $("#date_change").html("Date ordered :");
       $("#name_stat_d").val("Not Paid");

  $.ajax({
      type: "POST",
      url: "view_d_orders.php",
      success: function(data){
        $("#t_d").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

});

$("#p_books").click(function(){
       
      $("#d_books").show();
      $("#p_orders").show();
      $("#p_books").hide();
      $("#d_orders").hide();
      $("#orders").show();
      $("#pic").hide();
      $("#add_form").hide();
      $("#v_menu").hide();
      $(".show_name").hide();
      $("#search_name_div").hide();
      $("#h_d").hide();
      $("#H_dd").hide();


      $("#name_change1").html("PICK-UPS");
      $("#date_change").html("Date ordered :");
      $("#name_stat_p").val("Not Paid");
      $("#stat").html("STATUS");

  $.ajax({
      type: "POST",
      url: "view_p_orders.php",
      success: function(data){
        $("#t_p").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

});

$("#borrower").click(function(){

      $("#p_books").show();
      $("#d_orders").show();
      $("#d_books").hide();
      $("#p_orders").hide();
      $("#orders").show();
      $("#pic").hide();
      $("#add_form").hide();
      $("#v_menu").hide();
      $(".show_name").hide();
      $("#h_d").show();
      $("#H_dd").show();
      

      $("#name_change").html("BORROWERS");
      $("#date_change").html("Date Get :");
      $("#name_stat_d").val("Borrowed");

      var date = NowDate();
      var dateObj={"date":date};



  $.ajax({
      type: "POST",
      data:dateObj,
      url: "borrower.php",
      success: function(data){
        $("#t_d").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });
});

$("#dueDate").click(function(){

      $("#p_books").show();
      $("#d_orders").show();
      $("#d_books").hide();
      $("#p_orders").hide();
      $("#orders").show();
      $("#pic").hide();
      $("#add_form").hide();
      $("#v_menu").hide();
      $(".show_name").hide();
      $("#h_d").show();
      $("#H_dd").show();
      
                       
      $("#name_change").html("PENALTIES");
      $("#date_change").html("Date Get :");
                          
                           
    

      var date = NowDate();
      var dateObj={"date":date};



    $.ajax({
      type: "POST",
      data:dateObj,
      url: "penalty.php",
      success: function(data){
        $("#t_d").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

});

$("#returns").click(function(){
       

      $("#p_orders").show();

      $("#d_orders").hide();
      $("#orders").show();
      $("#pic").hide();
      $("#add_form").hide();
      $("#v_menu").hide();
      $(".show_name").hide();
      $("#search_name_div").show();
      $("#h_d").show();
      $("#H_dd").show();

      $("#name_change1").html("RETURNS");
      $("#date_change").html("Date Get :");
      $("#name_stat_p").val("RETURNED");
      $("#stat").html("DELETE");

  $.ajax({
      type: "POST",
      
      url: "returns.php",
      success: function(data){
        $("#t_p").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

});

$('#name_search').keyup(function(){
        
       
        var NameObj = {'Name':$(this).val()};
  
         $.ajax({
            
            type: "POST",
            url:"SearchName.php",
            data:NameObj,
            success: function(data){          
              $('#t_p').html(data);       
            },
            error:function(data){
              alert(data);

            }

        });
    });

//--------------------------------------------------------------

$("#add_btn").click(function(){

    if($("input[name='Stock']").val() === "" || $("input[name='Title']").val() === "" || $("input[name='Rent']").val() === ""){

              $("#input").dialog({
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
   
                 var bookObj={

                          "Stock":$("input[name='Stock']").val(),
                          "Title":$("input[name='Title']").val(),
                          "Rent":$("input[name='Rent']").val(),
                          "Type":$("select[name='type']").val()
                    
                        };



                        $.ajax({
                          type:"POST",
                          url:"add_book.php",
                          data:bookObj,
                          success:function(data){
                      
                            alert($("select[name='type']").val());
                          
                          }/*,
                          error:function(data){
                                alert(data);
                        }*/
                          
                        });

        }
});

//-------------------------------------------------------------------

$("#tl").hide();

$("#love").click(function(){
    $('#ta').hide();
    $('#tc').hide();
    $('#th').hide();
    $("#tl").slideToggle(200);
});
  
    $.ajax({
      type: "POST",
      url: "view_love.php",
      success: function(data){
        $("#tlb").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });
     
  //-------------------------------------------------
  
$("#ta").hide();

$("#action").click(function(){
    $('#tl').hide();
    $('#tc').hide();
    $('#th').hide();
    $("#ta").slideToggle(200);
});
  
    $.ajax({
      type: "POST",
      url: "view_action.php",
      success: function(data){
        $("#tab").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

//-----------------------------------------------
   
$("#tc").hide();

$("#comedy").click(function(){
    $('#tl').hide();
    $('#ta').hide();
    $('#th').hide();
    $("#tc").slideToggle(200);
});
  
    $.ajax({
      type: "POST",
      url: "view_comedy.php",
      success: function(data){
        $("#tcb").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

//-------------------------------------------------------
     
$("#th").hide();

$("#horror").click(function(){
    $('#tl').hide();
    $('#tc').hide();
    $('#ta').hide();
    $("#th").slideToggle(200);
});
  
    $.ajax({
      type: "POST",
      url: "view_horror.php",
      success: function(data){
        $("#thb").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });


});
//-------------------------------------------------


function DELETE(id) {

   $("#delete").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"bounce",
            hide:"explode",
            width:600,
            buttons:{

                   "OK":function(){

                    var idObj={"id":id};


                        $.ajax ({
                
                       type:"POST",
                       url:"Delete.php",
                       data:idObj,
                       
                       success: function(data){
                             
                             $(document.getElementById(idObj.id)).remove();
                             $(document.location.reload(true));
                         
                           
                       },
                       error: function(data){
                         
                       }
                  }); 
                    
                  },
              
                  "cancel":function(){
                    $(this).dialog("close");
                  }
            }
    });

}

function rentsd(fname, lname, brgy, number){
   
   var orderObj={

         "Fname":fname,
         "Lname":lname,
         "Brgy":brgy,
         "Num":number,
         "book_stat":$("input[id='name_stat_d']").val()
   };

   $(".sname").html(fname+" "+lname);
   $(".show_name").show();

   

   $.ajax({
      type: "POST",
      data:orderObj,
      url: "show_rents.php",
      success: function(data){
        $("#t_d1").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });

}

function rentsp(fname, lname, brgy, number){
   
   var orderObj={

         "Fname":fname,
         "Lname":lname,
         "Brgy":brgy,
         "Num":number,
         "book_stat":$("input[id='name_stat_p']").val()
   };

   $(".sname").html(fname+" "+lname);
   $(".show_name").show();

   $.ajax({
      type: "POST",
      data:orderObj,
      url: "show_rents.php",
      success: function(data){
        $("#t_p1").html(data);   
      },
      error: function(data){
        alert(data);  
      }
    });




}
function Delete_Customer(fname, lname, brgy, number){

   $("#delete").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"bounce",
            hide:"explode",
            width:600,
            buttons:{

                   "OK":function(){

                    var delObj={

                       "Fname":fname,
                       "Lname":lname,
                       "Brgy":brgy,
                       "Num":number
                      };

                    


                       $.ajax ({
                
                       type:"POST",
                       url:"delete_customer.php",
                       data:delObj,
                       
                       success: function(data){
                             
                             
                             $(document.location.reload(true));
                         
                           
                       },
                       error: function(data){
                         
                       }
                  }); 
                    
                  },
              
                  "cancel":function(){
                    $(this).dialog("close");
                  }
            }
      });

}

function info(fname, lname, brgy, number){
   
   var orderObj={

         "Fname":fname,
         "Lname":lname,
         "Brgy":brgy,
         "Num":number
   };

   

   $.ajax({
      type: "POST",
      data:orderObj,
      url: "info.php",
      success: function(data){
       
                          var obj= JSON.parse(data);
                          
                          
                          $("#H_a").html(obj.H_a);
                          $("#H_n").html(obj.H_n);
                          $("#H_p").html(obj.H_p);
                          $("#H_d").html(obj.H_d);
                          $("#H_dd").html(obj.H_dd);
                          
                           
      },
      error: function(data){
        alert(JSON.stringify(data));
      }
    });

    $("#info_d").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"bounce",
            hide:"explode",
            width:600,
            buttons:{

                   
              
                  "ok":function(){
                    $(this).dialog("close");
                  }
            }
      });





}

function paid(fname, lname, brgy, number){

  $("#pay").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"bounce",
            hide:"explode",
            width:600,
            buttons:{

                   "OK":function(){

                       var date = NowDate();
                       var duedate = DueDate();

                       var payObj={

                             "Fname":fname,
                             "Lname":lname,
                             "Brgy":brgy,
                             "Num":number,
                             "date":date,
                             "dueDate":duedate
                       };

                       

                       $.ajax({
                          type: "POST",
                          data:payObj,
                          url: "pay.php",
                          success: function(data){

                           $(document.location.reload(true));
                               
                          },
                          error: function(data){
                            alert(data);  
                          }
                        });
                    
                  },
              
                  "cancel":function(){
                    $(this).dialog("close");
                  }
            }
      });

}

function returned(fname, lname, brgy, number){

  $("#pay").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"bounce",
            hide:"explode",
            width:600,
            buttons:{

                   "OK":function(){

  var returnObj={

         "Fname":fname,
         "Lname":lname,
         "Brgy":brgy,
         "Num":number
   };

   

   $.ajax({
      type: "POST",
      data:returnObj,
      url: "return.php",
      success: function(data){

       $(document.location.reload(true));
           
      },
      error: function(data){
        alert(data);  
      }
    });
                    
                  },
              
                  "cancel":function(){
                    $(this).dialog("close");
                  }
            }
      });

}

function pay_returned(fname, lname, brgy, number){

  var date = NowDate();

  var penaltyObj={


         "date":date,
         "Fname":fname,
         "Lname":lname,
         "Brgy":brgy,
         "Num":number
   };

   

   $.ajax({
      type: "POST",
      data:penaltyObj,
      url: "penalty_pay.php",
      success: function(data){
       
                          var obj= JSON.parse(data);
                          
                          
                          $("#penalty_pay").html(obj.penalty_pay);
                          
                           
      },
      error: function(data){
        alert(JSON.stringify(data));
      }
    });




  $("#pay1").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"bounce",
            hide:"explode",
            width:600,
            buttons:{

                   "PAID":function(){

                                    var returnObj={

                                           "Fname":fname,
                                           "Lname":lname,
                                           "Brgy":brgy,
                                           "Num":number
                                     };

                                     

                                     $.ajax({
                                        type: "POST",
                                        data:returnObj,
                                        url: "return.php",
                                        success: function(data){

                                         $(document.location.reload(true));
                                             
                                        },
                                        error: function(data){
                                          alert(data);  
                                        }
                                      });
                    
                  },
              
                  "cancel":function(){
                    $(this).dialog("close");
                  }
            }
      });
   
   




}
//---------------------------------------------------------------------------
function NowDate(){
  var d = new Date();
  var dt = d.getDate();
  var mn = d.getMonth()+1;
  var yr = d.getFullYear();
  var present = yr +"-"+ mn +"-"+ dt;
  return present; 
}
function DueDate(){
  var d = new Date();
  var dt = d.getDate()+2;
  var mn = d.getMonth()+1;
  var yr = d.getFullYear();
  var future = yr +"-"+ mn +"-"+ dt;
  return future; 
}
