$(function() {

    // agrego a validator y el metodo valor
 $.validator.addMethod("valor", function(value, element, arg){
    return arg !== value;
   }, "el valor no puede ser el predefinido");
  // FORMULARIO DE CONTACTO
    $("form[name='formcontacto']").validate({
      // especificamos las validaciones a tener en cuenta para contactar
      rules: {
        nombre: {
            required:true,
            minlength:3
        },
        seleccion:{
            valor: "default"

        },
        email: {
          required: true,
          email: true
        },
        areadetexto: {
            required: true,
            minlength:20
          }

      },
      // Mensajes de error 
      messages: {
        nombre: {
            required: "Debes rellenar el campo del nombre",
            minlength: "Minimo 3 caracteres"
          },
        email:{
            required: "debe rellenar este campo",
            email: "Escriba un formato correcto",
        },
        seleccion:{
            valor: "Elija una opción distinta a la de por defecto"
           
        },
        areadetexto:{
            required: "debe rellenar este campo",
            minlength: "Mínimo 20 caracteres"

        },
        
      },
      // enviamos si todo está correctamente validado
      submitHandler: function(form) {
        form.submit();
      }
    });
// FORMULARIO DE REGISTRO VALIDACIONES -------------------------------------------
    $("form[name='form-registro']").validate({
      // especificamos las validaciones a tener en cuenta
      rules: {
        nombreusuario: {
            required:true,
            minlength:5
        },
        emailregistro: {
          required: true,
          email: true
        },

        password:{
          required:true,
          minlength:6,
          maxlength:12,
        },
        confirmpassword: {
          equalTo: "#password"
      }
      },
      // Mensajes de error del registro
      messages: {
        nombreusuario: {
            required: "Debes rellenar el campo del nombre",
            minlength: "Minimo 5 caracteres"
          },
        emailregistro:{
            required: "debe rellenar este campo",
            email: "Escriba un formato correcto",
        },
        password:{
          required: "Escribe una contraseña",
          minlength: "La longitud mínima son 6 caracteres",
          maxlength: "La longitud máxima son 20 caracteres"
        },
        confirmpassword:"La contraseña no coincide, revisela de nuevo"
        
      },
     // se envia al php si ha validado
      submitHandler: function(form) {
        form.submit();
      }
    });
  });