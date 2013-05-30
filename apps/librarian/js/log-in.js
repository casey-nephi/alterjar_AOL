$(document).ready(function(){

   $("#update_form").hide();
   $("#alert").hide();
   $("#answer").hide();
   //------------------------------------------------------------------

   $("#hint").click(function(){



       $.ajax({
                      type:"POST",
                      url:"hint.php",
                      success: function(data){
                        
                          var obj= JSON.parse(data);
                          
                          
                          $("#question_hint").html(obj.question_hint);
                          

                      },
                      error: function(data){
                          alert(JSON.stringify(data));
                      }
                });
       $("#answer").dialog({
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
   });

   $("#change").click(function(){

       $('#change').hide();
       $('#war').hide();

            var passObj={

                "id":$("input[name='id']").val()
            };
            

                $.ajax({
                      type:"POST",
                      data:passObj,
                      url:"gettest.php",
                      success: function(data){
                        
                          var obj= JSON.parse(data);
                          
                          
                          $("input[name='test_user']").val(obj.test_user);
                          $("input[name='test_pass']").val(obj.test_pass);

                      },
                      error: function(data){
                          alert(JSON.stringify(data));
                      }
                });
          
            $("#update_form").dialog({
            autoOpen:true,
            resizable: false,
            modal:true,
            show:"clip",
            hide:"explode",
            width:600,
            buttons:{
              "Change Librarian":function(){

                
                if($("input[name='Username2']").val() !== "" || $("input[name='Password2']").val() !== ""){

                  if($("input[name='Password2']").val() !== $("input[name='Password3']").val()){
                   $("#pass").dialog({
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
                    if($("input[name='test_user']").val() !== $("input[name='Username1']").val() && $("input[name='test_pass']").val() !== $("input[name='Password1']").val()){
                          $("#librarian").dialog({
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
                    var changeObj={
                       "User2":$("input[name='Username2']").val(),
                       "Pass2":$("input[name='Password2']").val(),
                       "hint":$("input[name='hint']").val()  
                    };
                     $.ajax({
                            type:"POST",
                            url:"Change.php",
                            data:changeObj,
                            success:function(data){
                        
                              alert("success");
                            
                            },
                            error:function(data){
                                  alert(data);
                          }
                            
                          });
                     $(this).dialog("close");
                        $('#change').show();
                        $('#war').show();
                   }
               }
             }else{
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
             }
    
                 
  
                  },
                  "Cancel":function(){
                    $(this).dialog("close");
                      $('#change').show();
                      $('#war').show();
                  }
            }
      });

   });

 });
                


     

   















