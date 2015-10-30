$(document).ready(function() {
		var validator = $("#tab").validate({
		
			rules: {
				"backend_customerbundle_profiletype[name]": {
					required:true,
					minlength:2,
					maxlength:100,
				},
				"backend_customerbundle_profiletype[lastname]": {
					required:true,
					minlength:2,
					maxlength:100,
				},
				"backend_customerbundle_profiletype[email]": {
					required:true,
					minlength:2,
					maxlength:60,
					email: true,
				},
				"backend_customerbundle_profiletype[phone]": {
					required:false,
          digits: true,
					minlength:9,
					maxlength:20,
					
				},
				"backend_customerbundle_profiletype[mobile]": {
					required:false,
          digits: true,
					minlength:9,
					maxlength:20,
					
				},
        "backend_customerbundle_profiletype[dni]": {
					required:false,
					minlength:8,
					maxlength:15,
          digits:true,
					
				},
        "backend_customerbundle_profiletype[cuit]": {
					required:true,
					minlength:9,
					maxlength:20,
          digits:true,
					
				}
			
			},
			
			 messages: {
            "backend_customerbundle_profiletype[name]": {
            required: "Ingrese su nombre",
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
            "backend_customerbundle_profiletype[lastname]": {
            required: "Ingrese su Apellido",
            maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
            "backend_customerbundle_profiletype[email]": {
                required: "Ingrese un email",
                email: "Ingrese un email con formato válido name@domain.com",
                maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
                minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
            "backend_customerbundle_profiletype[phone]": {
                maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
                minlength: jQuery.validator.format("Mínimo {0} carácteres!"),
                digits: "Ingrese solo números"
            },
            "backend_customerbundle_profiletype[mobile]": {
                maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
                minlength: jQuery.validator.format("Mínimo {0} carácteres!"),
                digits: "Ingrese solo números"
            },
            "backend_customerbundle_profiletype[dni]": {
                 required: "Ingrese su DNI",
                maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
                minlength: jQuery.validator.format("Mínimo {0} carácteres!"),
                digits: "Ingrese solo números"
            },
            "backend_customerbundle_profiletype[cuit]": {
                required: "Ingrese su CUIT",
                maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
                minlength: jQuery.validator.format("Mínimo {0} carácteres!"),
                digits: "Ingrese solo números"
            } 
            
            
      },
      
      errorPlacement: function(error, element) {
            	error.appendTo( element.next() );
        }
			
		});
		
		
		var validator2 = $("#tab2").validate({
		
			rules: {
				"form[password][first]": {
					required:true,
					minlength:6,
					maxlength:20,
				},
				"form[password][second]": {
					required:true,
					equalTo: "#form_password_first"
				}
				
			},
			
			 messages: {
             "form[password][first]": {
            required: "Ingrese una contraseña",
            maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
             "form[password][second]": {
            required: "Ingrese nuevamente la contraseña",
            equalTo: "No coincide la contraseña con su confirmación"
            }
            
      },
      
      errorPlacement: function(error, element) {
            	error.appendTo( element.next() );
        }
			
		});
		
		
		
		
	});


