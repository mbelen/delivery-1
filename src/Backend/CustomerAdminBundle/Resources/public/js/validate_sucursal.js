$(document).ready(function() {
		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_customeradminbundle_sucursaltype[name]": {
					required:true,
					minlength:2,
					maxlength:100,
				},
				"backend_customeradminbundle_sucursaltype[cuit]": {
					required:true,
					digits:true,
					minlength:11,
					maxlength:20,
				},
				"backend_customeradminbundle_sucursaltype[phone]": {
					required:true,
					minlength:4,
					maxlength:20,
					digits: true
				},
        "backend_customeradminbundle_sucursaltype[email]": {
					required:true,
					email: true,
					minlength:6,
					maxlength:100,
				},
        "backend_customeradminbundle_sucursaltype[website]": {
					required:false,
					maxlength:100,
				},
        
        "backend_customeradminbundle_sucursaltype[paymethods]": {
					required:true,
					
				},
        "backend_customeradminbundle_sucursaltype[direccion]": {
					required:true,
					
				},
        "backend_customeradminbundle_sucursaltype[radio]": {
					required:false,
				  digits:true
				},
        "backend_customeradminbundle_sucursaltype[delivery]": {
					required:false,
				  number:true
				},
        "backend_customeradminbundle_sucursaltype[minimo]": {
					required:false,
				  number:true
				},
			},
			
		    messages: {
            "backend_customeradminbundle_sucursaltype[name]": {
            required: "Ingrese el nombre de la sucursal",
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
		 
           "backend_customeradminbundle_sucursaltype[cuit]": {
           required: "Ingrese el numero de cuit",
		       digits: "Ingrese los numeros sin guiones",	   
           maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
           minlength: jQuery.validator.format("Mínimo {0} carácteres!")
           },
		 	
           "backend_customeradminbundle_sucursaltype[phone]": {
           required: "Ingrese el numero de telefono",
           digits: "Ingrese los numeros sin guiones",	
           maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
           minlength: jQuery.validator.format("Mínimo {0} carácteres!")
           },
           "backend_customeradminbundle_sucursaltype[email]": {
           required: "Ingrese una direccion de email",
           email: "Ingrese un email válido",	
           maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
           minlength: jQuery.validator.format("Mínimo {0} carácteres!")
           },
            "backend_customeradminbundle_sucursaltype[website]": {
           maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
           },
           "backend_customeradminbundle_sucursaltype[paymethods]": {
           required: "Seleccione al menos un medio de pago",
           },
          
           "backend_customeradminbundle_sucursaltype[direccion]": {
           required: "Seleccione al menos una dirección",
           },
           "backend_customeradminbundle_sucursaltype[radio]": {
           digits: "Debe ingresar radio de entrega en kms",
           },
           "backend_customeradminbundle_sucursaltype[delivery]": {
           number: "Debe ingresar un número valido",
           },
           "backend_customeradminbundle_sucursaltype[minimo]": {
           number: "Debe ingresar un número válido",
           }
           
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
    
    

       var sucursalId = 0;
      if ($("#categorias").data("sucursalid")){
        sucursalId = $("#categorias").data("sucursalid");
      }
      var dataString ="sucursalId="+sucursalId;
      var path = $("#categorias").data('url');
        $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString,
            success: function(data) {
               
                  
   $('#jstree-proton-3').jstree({
        'plugins': ["wholerow", "checkbox"],
        'core': {
            'data': data ,
            'themes': {
                'name': 'proton',
                'responsive': true
            }
        }
    });
    
    $('#jstree-proton-3').on('changed.jstree', function (e, data) {
        var i, j, r = [], c=[];
        for(i = 0, j = data.selected.length; i < j; i++) {
          
          if (data.instance.is_leaf(data.selected[i])){ 
              r.push(data.instance.get_node(data.selected[i]).a_attr.subcategoria_id);
          }else{
              c.push(data.instance.get_node(data.selected[i]).a_attr.categoria_id);
          }
          
        }
        $("#subcategorias").val(r.join(', ')) ;
        $("#categorias").val(c.join(', ')) ;
        console.log(r.join(', '));
    });
               
               
               
            }
        });  
  
    
		
	});


 function loadDireccion(direccionId){
    	var params = { 'direccionId': direccionId }	
      var path = $('#agregar_direccion').data("url");
      $.ajax({
              type: "POST",
              url: path,
              dataType: 'json',
              data: params,
            })
            .done(function(data){
               $('#backend_customeradminbundle_sucursaltype_direccion').select2({data: data});
               $('#backend_customeradminbundle_sucursaltype_direccion').select2('val',direccionId);
            });
 
 }


