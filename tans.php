<!DOCTYPE html>
<html lang="en">
<?php
include("banking_system.php");
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
  crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>transfer</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script></script>

<script>
$(function() {

    $("#edit_payment").on("keydown keyup", sum);
 function sum() {

    var textValue1 = Number.parseFloat(document.getElementById('user_send').value);
    var textValue2 = Number.parseFloat(document.getElementById('user_rec').value);
   if (textValue1>=textValue2) {
    document.getElementById('balance').value = "0"; 
    document.getElementById('balance').value = textValue1 - textValue2; 
   }
    else if(textValue1<textValue2){
      document.getElementById('balance').value = "0"; 
      document.getElementById('balance').value = textValue2 - textValue1; 

    }
 }

});
</script>


    <style>
      
    .form-container{
    position:absolute;
    top:70px;
    margin-left:25%;
  background: #fff;
  padding:20px;
  width:50%;
  border-radius:10px;
  box-shadow:0px  0px 10px 0px #000;
  margin-left: auto;
      margin-top: -390px;
      margin-right: auto;
  }
  .formGroup{
  width:100%;
  position: relative;
}

.formGroup input{
  width:95%;
  padding:10px;
  margin-bottom: 10px;
  
}
.formGroup input[type=text]{
  padding:10px 21px 10px;
   box-shadow:0px  0px 0px 0px #000;
}
.formGroup i{
  position: absolute;
  left:5px;
  top:35px;}
  
    </style>
  </head>
  <body>
  
    
    <section class="container-fluid">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-8  col-md-6">
          <form class="form-container" id="#edit_payment" action="money.php" method="post"  enctype="multipart/form-data">
          <input type="hidden" id="a_balance" name="a_balance" value="">
            <h2>Transfer Money</h2>

            <div class="formGroup">
            <label>From Account no.:</label>
            
            <input type="text" class="form-control" id="ac_no" name="ac_no" >
             <span id="Message3" style="color: red;"></span>
          </div>
            
            <div id="cus_details" style="display: none;">
             <p id="cust_name"></p>
              <p id="cust_bal"></p>
           
            </div>           
            <span id="Message1" style="color: red;"></span>
          </div>
          <div class="">
            <label>To Account no:</label>
            <input type="text" class="form-control" id="to_ac_no" name="to_ac_no" >
           <div id="to_cus_details" style="display: none;">
             <p id="to_cust_name"></p>
           
            </div> 
            
             <span id="Message2" style="color: red;"></span>

          </div>
          
          <div class="formGroup">
            <label>Money:</label>
            <i class="fas fa-rupee-sign"></i>
            <input type="text" class="form-control" id="t_balance" name="t_balance" >
             <span id="Message3" style="color: red;"></span>
          </div>
          
          <button type="Reset" class="btn btn-success btn-block">Reset</button>
          <button type="submit" class="btn btn-primary  btn-block" style = "display: none;"name="upload" id="upload">Submit</button>
          </form>
        </section>
      </section>
    </section>
  

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $("#ac_no").change(function(){
      var values = $("#ac_no").val();
       $.ajax({
              url: "Ajax.php",
              type: "post",
              data: {id:values},
              success: function (response) {
                var fields = response.split('~');
                var name = fields[0];
                var balance = fields[1];
                c_name = 'Customer Name :- '+name;
                bal = 'Balance :- '+balance;
                $("#cus_details").attr("style", "display:block");
                $('#cust_name').text(c_name);
                $('#a_balance').val(balance);
                $('#cust_bal').text(bal);
          
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });
    });

  $("#to_ac_no").change(function(){
      var values = $("#to_ac_no").val();
       $.ajax({
              url: "Ajax.php",
              type: "post",
              data: {id:values},
              success: function (response) {
                var fields = response.split('~');
                var name = fields[0];
                var balance = fields[1];
                c_name = 'Customer Name :- '+name;
                $("#to_cus_details").attr("style", "display:block");
                $('#to_cust_name').text(c_name);
          
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });
    });

  $("#t_balance").change(function(){
    var a_balance = $("#a_balance").val();
    alert(a_balance);
    var t_balance = $("#t_balance").val();
    if(t_balance > a_balance){
      //alert("Your Avaliable Balance is low Please check");
     // $("#upload").attr("style", "display:none");
     $("#upload").attr("style", "display:block");
    }else{
      $("#upload").attr("style", "display:block");
    }

  });
 });

</script>>