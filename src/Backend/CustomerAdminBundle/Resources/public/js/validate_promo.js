$(document).ready(function() {
   
    $('#unidad_group').hide()
    
    $("#backend_customeradminbundle_promociontype_type").change(function () {
        
        var option = $('#backend_customeradminbundle_promociontype_type').val();

        if(option == 1){

            $("#unidad_group").hide();
            $('#porcentaje_group').show();
        
        }else{
            
            $('#porcentaje_group').hide();
            $("#unidad_group").show();
           
        }

    });
    
	var validator = $("#tab").validate({
		
			rules: {
				"backend_customeradminbundle_promocion[name]": {
					required:true,
					minlength:2,
					maxlength:100,
				},
				"backend_customeradminbundle_promocion[detail]": {
					required:false,
					minlength:2,
					maxlength:100,
				},
				"backend_customeradminbundle_promocion[terms]": {
					required:true,
					minlength:2,
					maxlength:200,
				}
				
			},
			
	    messages: {
            "backend_customeradminbundle_promocion[name]": {
            required: "Ingrese el nombre de la promocion",
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
            "backend_customerbundle_promocion[terms]": {
            required: "Ingrese los terminos y condiciones",
            maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            }
            
      },
      
      errorPlacement: function(error, element) {
            	error.appendTo( element.next() );
        }
			
    });

    $('#crear').click(function(){
        
        var path = $(this).data("url");
        
        alert(path);
    
        var nombre = $('#backend_customeradminbundle_promociontype_name').val();
        var tipo = $('#backend_customeradminbundle_promociontype_type').val();
        var valor, u1,u2;
        
        if(tipo == 1){
            
           valor = $('#backend_customeradminbundle_promocion_porcentaje').val();
        
        }else{
            
           u1 = $('#backend_customeradminbundle_promocion_unidad1').val();
           u2 = $('#backend_customeradminbundle_promocion_unidad2').val();
        }
        
        var terms = $('#backend_customeradminbundle_promociontype_terms').val();
        var sucursales = $('#backend_customeradminbundle_promociontype_sucursales').val();
        var medios = $('#backend_customeradminbundle_promociontype_mediosPago').val();
        
        var productos = $('#backend_customeradminbundle_promociontype_productos').val();
        
        var stop = $('#backend_customeradminbundle_promociontype_stop').val();
        var stock = $('#backend_customeradminbundle_promociontype_stock').val(); 
        
        var categorias = $('#backend_customeradminbundle_promociontype_categorias').val();
        var excluidos = $('#backend_customeradminbundle_promociontype_productosExcluidos').val();
      
        alert("aca");
       
        var params = {'nombre':nombre,'tipo':tipo,'valor':valor,'u1':u1,'u2':u2,'sucursales':sucursales,
                      'medios':medios,'productos':productos,'stop':stop,'stock':stock,'categorias':categorias,
                      'excluidos':excluidos};

        $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: params,
        })
            .done(function(data){

                if(data.ok){
                    
                    alert("La promocion se ha creado correctamente");
                    console.log(data.dato);

                }else{

                    alert("Se ha producido un error");

                }
            });
         
    });
    
});




