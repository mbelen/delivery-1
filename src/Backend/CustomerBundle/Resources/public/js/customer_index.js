$(document).ready(function() {
	
$("#search-button").on('click',function(){
  
  var path=$(this).data("url");
  var query=$("#search-query").val();
  if (query != '')
    path = path +'/'+query;
  
  $("#custom-search-form").attr('action',path);
  $("#custom-search-form").submit();
  

});

$("#search-query").keyup(function(event){
    if(event.keyCode == 13){
        $("#search-button").click();
    }
});

$(".extra").on("click",function(){

     var id = $(this).data('id');
 
     $('#extraCustomer').find('.btn-danger').data('id', id);
    
    $('#extraCustomer').modal('show');
});

$("#extraCustomer .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "customer="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#noextra"+id).hide();
                $("#extra"+id).show();
                $("#extraCustomer").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled", false);
        });
        
   }
 
 
 });


$(".noextra").on("click",function(){
    var id = $(this).data('id');
 
     $('#noextraCustomer').find('.btn-danger').data('id', id);
    $('#noextraCustomer').modal('show');
});

$("#noextraCustomer .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "customer="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#noextra"+id).show();
                $("#extra"+id).hide();
                $("#noextraCustomer").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled",false);
        });
        
   }
 
 
 });



$(".habilitar").on("click",function(){

     var id = $(this).data('id');
 
     $('#validarCustomer').find('.btn-danger').data('id', id);
    
    $('#validarCustomer').modal('show');
});




$("#validarCustomer .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "customer="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#pendiente"+id).hide();
                $("#habilitado"+id).show();
                $("#validarCustomer").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled", false);
        });
        
   }
 
 
 });


$(".nohabilitar").on("click",function(){
    var id = $(this).data('id');
 
     $('#novalidarCustomer').find('.btn-danger').data('id', id);
    $('#novalidarCustomer').modal('show');
});

$("#novalidarCustomer .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "customer="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#pendiente"+id).show();
                $("#habilitado"+id).hide();
                $("#novalidarCustomer").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled",false);
        });
        
   }
 
 
 });


$(".activar").on("click",function(){
     var id = $(this).data('id');
 
     $('#habilitarCustomer').find('.btn-danger').data('id', id);
    $('#habilitarCustomer').modal('show');
});

$("#habilitarCustomer .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
       var dataString = "customer="+id;
       var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#activar"+id).show();
                $("#noActivar"+id).hide();
                $("#habilitarCustomer").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled",false);
        });
        
   }
 
 
 });
$(".noActivar").on("click",function(){
     var id = $(this).data('id');
 
     $('#nohabilitarCustomer').find('.btn-danger').data('id', id);
    $('#nohabilitarCustomer').modal('show');
});

$("#nohabilitarCustomer .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "customer="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#noActivar"+id).show();
                $("#activar"+id).hide();
                $("#nohabilitarCustomer").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled",false);
        });
        
   }
 
 
 });
$(".convert_premium").on("click",function(){
     var id = $(this).data('id');
 
     $('#PremiumSucursal').find('.btn-danger').data('id', id);
    $('#PremiumSucursal').modal('show');
});

$("#PremiumSucursal .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "sucursal="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#premium"+id).show();
                $("#noPremium"+id).hide();
                $("#PremiumSucursal").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled",false);
        });
        
   }
 
 
 });
$(".noPremium").on("click",function(){
     var id = $(this).data('id');
 
     $('#NoPremiumSucursal').find('.btn-danger').data('id', id);
    $('#NoPremiumSucursal').modal('show');
});

$("#NoPremiumSucursal .btn-danger").on('click',function(){
 
   if ( $(this).data('id') != 0 ) {
       $(this).prop("disabled",true); //disabled button to prevent more than one deleted
       var id=$(this).data('id');
       var path=$(this).data('url');
        var dataString = "sucursal="+id;
         var self = $(this);
       $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString
        }).done(function(data){
        
             if (data.status == 0){
                $("#premium"+id).hide();
                $("#noPremium"+id).show();
                $("#NoPremiumSucursal").modal('hide');
             }else{
              alert(data.message);
             }
        }).always(function() {
            self.prop("disabled",false);
        });
        
   }
 
 
 });

});
