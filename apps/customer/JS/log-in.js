$(document).ready(function(){

   /*$("#update_form").hide();
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
                  }
            }
      });

   });*/
   $('#Username').val("");
   $('#Username1').val("");
   $("#Password").val("");
   $("#pass").val("");
   //-----------------------------------------

   $('#passto').hide();
   $('#Username1').keyup(function(){

       var NameObj = $(this).val();
       var nameleng = NameObj.length;

        $('#Username2').val(nameleng);

       var validnameObj ={ 'Name':NameObj,'leng':nameleng};

           $.ajax({

               type: "POST",
               url:"SearchName.php",
               data:validnameObj,
               success: function(data){
                   $('#alert1').html(data);
               },
               error:function(data){
                   alert(data);
               }

           });



   });
    $('#pass').keyup(function(){

        var passObj = $(this).val();
        var passleng = passObj.length;
        var validpassObj ={'leng':passleng};
        $('#pass3').val(passleng);
        var PassObj = $("input[name=Password2]").val();
        var Passleng = PassObj.length;

        if( Passleng != 0){

              var nameObj  = $(this).val();

              var nameleng = nameObj.length;

              var NameObj  = $("input[name='Password1']").val();

              var Nameleng = NameObj.length;

              var wordObj={'pass1':NameObj,'leng1':Nameleng,'pass2':nameObj,'leng2':nameleng}

               $.ajax({

                  type: "POST",
                  url:"passmatch.php",
                  data:wordObj,
                  success: function(data){

                      $('#alert2').html(data);
                  },
                  error:function(data){

                      alert(data);
                  }

              });

        }


             $.ajax({

                type: "POST",
                url:"validpass.php",
                data:validpassObj,
                success: function(data){

                    $('#alert3').html(data);
                },
                error:function(data){

                    alert(data);
                }

              });

        if(passleng > 4){

           $('#passto').show();
        }else{
          $('#passto').hide();
        }

       





    });
    $('#pass1').keyup(function(){

        var NameObj  = $(this).val();

        var Nameleng = NameObj.length;

        var nameObj  = $("input[name='Password1']").val();

        var nameleng = nameObj.length;

        var wordObj={'pass1':NameObj,'leng1':Nameleng,'pass2':nameObj,'leng2':nameleng}

         $.ajax({

            type: "POST",
            url:"passmatch.php",
            data:wordObj,
            success: function(data){

                $('#alert2').html(data);
            },
            error:function(data){

                alert(data);
            }

        });

        



    });
    $('#fname').keyup(function(){
      if($(this).val() != ""){
        $('#alert4').html("<span class='label label-success'>OK!</span>")
      }else{

        $('#alert4').html("<span class='label label-info'>ENTER</span>")

      }
    });
    $('#Lname').keyup(function(){
      if($(this).val() != ""){
        $('#alert5').html("<span class='label label-success'>OK!</span>")
      }else{

        $('#alert5').html("<span class='label label-info'>ENTER</span>")

      }
    });
    $('#num').keyup(function(){
      if($(this).val() != ""){
        $('#alert6').html("<span class='label label-success'>OK!</span>")
      }else{

        $('#alert6').html("<span class='label label-info'>ENTER</span>")

      }
    })

 });
                


     

   















