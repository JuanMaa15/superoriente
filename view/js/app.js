"use strict"
var sumaAnchoContRegistro = 0;
var contF = 0;
var contH = 0;
var acciones = {
    listo : function() {

        // ------ Se ejecutan las funciones por medio del evento click ----------------

        $("#btn-ingresar").click(acciones.enviarFormIngreso);
        $("#btn-registrar-empleado").click(acciones.enviarFormRegistro);
        $("#btn-registrar-tipo-documento").click(acciones.enviarFormTipoDocumento);
        $("#btn-registrar-genero").click(acciones.enviarFormGenero);
        $("#btn-registrar-estado-civil").click(acciones.enviarFormEstadoCivil);
        $("#btn-atras").click(acciones.volverForm);
        $("#agregar-familiar").click(acciones.agregarFamiliar);
        $("#remover-familiar").click(acciones.removerFamiliar);
        $("#agregar-hijo").click(acciones.agregarhijo);
        $("#remover-hijo").click(acciones.removerhijo);
        $("#btn-buscar-fecha").click(acciones.buscarEmpleadoFecha);
        $("#btn-buscar-salario").click(acciones.buscarEmpleadoSalario);
        $("#filtro-empleado").click(acciones.filtroEmpleado);

        $("#buscar_empleado").keyup(acciones.buscarEmpleado);


        // ---------------- Verificación de campos (inputs) por teclado ------------

        $("#correo").keyup(acciones.verificarCorreoBd);
        
        
        // --------------- Se muestran las tablas con los datos ----------------


        // Usuarios
        $.post('../../controller/usuario/ListaUsuarios.php',{

        }, function(responseText){
            $("#listado-usuarios").html(responseText);
        });

        $.post('../../controller/usuario/ListaEnlaces.php',{

        },function(responseText) {
            $("#listado-enlaces").html(responseText);
        });

        //Tipos de documento

        $.post('../../controller/tipo documento/ListaTiposDocumentos.php',{
            
        },function(responseText){
            $("#listado-tipos-documentos").html(responseText);
        }); 


        // Genero

        $.post('../../controller/genero/ListaGeneros.php',{

        },function(responseText) {
            $("#listado-generos").html(responseText);
        });

        // estado civil

        $.post('../../controller/estado civil/ListaEstadosCiviles.php',{

        },function(responseText) {
            $("#listado-estados-civiles").html(responseText);
        });


    },

    // ---------------- Verificación de campos (inputs) por teclado ------------


    verificarCorreoBd : function() {

    var correo = $(this).val();

    if (correo.length != 0) {

        $.post('../../controller/correo/VerificarCorreoBD.php',{
            correo: correo
        },function(responseText){
            $("#correo").next().html(responseText);
        });

    }else{
        $("#correo").next().html("Campo vacío, por favor ingrese el correo");
    }

    },

    filtroEmpleado : function() {

        var filtroEmpleado = $(this).val();

        var idFiltro = "";

        if (filtroEmpleado.indexOf("estado") > -1){
            idFiltro = filtroEmpleado.replace("estado", "").trim();

            $.post('../../controller/usuario/ListaEnlaces.php',{
                opc: "estado",
                id: idFiltro
            },function(responseText) {
                $("#listado-enlaces").html(responseText);
            });

        }else if(filtroEmpleado.indexOf("contrato") > -1){
            idFiltro = filtroEmpleado.replace("contrato", "").trim();

            $.post('../../controller/usuario/ListaEnlaces.php',{
                opc: "contrato",
                id: idFiltro
            },function(responseText) {
                $("#listado-enlaces").html(responseText);
            });

             
        }else if(filtroEmpleado.indexOf("casa") > -1) {
            idFiltro = filtroEmpleado.replace("casa", "").trim();

            $.post('../../controller/usuario/ListaEnlaces.php',{
                opc: "casa",
                id: idFiltro
            },function(responseText) {
                $("#listado-enlaces").html(responseText);
            });
        }else{
            $.post('../../controller/usuario/ListaEnlaces.php',{
                opc: filtroEmpleado,
                id: ""
            },function(responseText) {
                $("#listado-enlaces").html(responseText);
            });
        }


        //console.log(id_filtro);

  
        

    },

    buscarEmpleadoSalario : function () {
        
        
        var inicio_salario = $("#inicio_salario").val();
        var fin_salario = $("#fin_salario").val();
        var validar = 0;

        if (inicio_salario.length !== 0) {
            $("#inicio_salario").next().html("");
            validar++;
        }else{
            $("#inicio_salario").next().html("Campo vacío, por favor ingrese el inicio del salario");
        }

        if (fin_salario.length !== 0) {
            $("#fin_salario").next().html("");
            validar++;
        }else{
            $("#fin_salario").next().html("Campo vacío, por favor ingrese el fin del salario");
        }

        if (validar === 2) {
            
            $.post('../../controller/listas reportes/ListasUsuarios.php',{
                opc: "salario",
                inicio_salario: inicio_salario,
                fin_salario: fin_salario
            },function(responseText){

                $("#lista-intervalo-salario").html(responseText);

            });

        }else{
            alert("Hay campos vacíos");
        }

    },

    buscarEmpleadoFecha : function() {

        var fecha_inicio = $("#fecha_inicio").val();
        var fecha_fin = $("#fecha_fin").val();
        var validar = 0;

        if (fecha_inicio.length !== 0) {
            $("#fecha_inicio").next().html("");
            validar++;
        }else{
            $("#fecha_inicio").next().html("Campo vacío, por favor ingrese el inicio de la fecha");
        }

        if (fecha_fin.length !== 0) {
            $("#fecha_fin").next().html("");
            validar++;
        }else{
            $("#fecha_fin").next().html("Campo vacío, por favor ingrese el fin de la fecha");
        }

        if (validar === 2) {
            
            $.post('../../controller/listas reportes/ListasUsuarios.php',{
                opc: "fecha",
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_fin
            },function(responseText){

                $("#lista-intervalo-fecha").html(responseText);

            });

        }else{
            alert("Hay campos vacíos");
        }

    },

    buscarEmpleado : function() {

        var busqueda = $(this).val();

        $.post('../../controller/usuario/ListaEnlaces.php',{
            busqueda: busqueda
        },function(responseText) {
            $("#listado-enlaces").html(responseText);
        });

    },

    removerhijo : function() {
        
        
        contH--

        if (contH === 0) {
            $(".cont-remover-hijo").removeClass("d-block").addClass("d-none");
        }

        $("#hijo" + contH).remove();
    },

    agregarhijo : function() {

        

        var cont_hijo = `
        <div id="hijo` + contH +  `" class="border-bottom my-1 pb-1"  >
            <div class="row">
                <div class="col my-3">
                    <input class="form-control" type="text" id="nombre_hijo` + contH +  `" placeholder="Nombre">
                    <small class="text-danger"></small>
                    
                </div>
                <div class="col my-3">
                    <input class="form-control" type="text" id="apellido_hijo` + contH +  `" placeholder="Apellido">
                    <small class="text-danger"></small>
                    
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                    <input class="form-control" type="number" id="edad_hijo` + contH +  `" placeholder="Edad">
                    <small class="text-danger"></small>
                    
                </div>
                <div class="col my-3">
                    <input class="form-control" type="date" id="fecha_nacimiento_hijo` + contH +  `" placeholder="Escolaridad">
                    <small class="text-danger"></small>
                    
                </div>
                
            </div>
        </div>
    `;
        
        $("#cont-hijos").append(cont_hijo);

        contH++;

        if (contH > 0) {
           // $("#opc-familiar").append("<div class='col-4'><button type='button' class='btn btn-verde' id='remover-familiar'>Remover familiar</button></div>");
            $(".cont-remover-hijo").removeClass("d-none").addClass("d-block");
        }

        console.log(contH);
    },

    removerFamiliar : function () {
       
        
        contF--

        if (contF === 0) {
            $(".cont-remover-familiar").removeClass("d-block").addClass("d-none");
        }

        $("#familiar" + contF).remove();
      
    },

    agregarFamiliar : function() {

        

        var cont_familiar = `
            <div id="familiar` + contF + `" class="border-bottom my-1 pb-1"  >
            <div class="row">
                <div class="col my-3">
                    <input class="form-control" type="text" id="id_familiar` + contF + `" placeholder="Nro de documento">
                    <small class="text-danger"></small>
                    
                </div>
                <div class="col my-3">
                    <input class="form-control" type="text" id="nombre-familiar` + contF + `" placeholder="Nombre">
                    <small class="text-danger"></small>
                    
                </div>
                <div class="col my-3">
                    <input class="form-control" type="text" id="apellido-familiar` + contF + `" placeholder="Apellido">
                    <small class="text-danger"></small>
                    
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                    <input class="form-control" type="number" id="edad-familiar` + contF + `" placeholder="Edad">
                    <small class="text-danger"></small>
                    
                </div>
                <div class="col my-3">
                    <input class="form-control" type="text" id="escolaridad-familiar` + contF + `" placeholder="Escolaridad">
                    <small class="text-danger"></small>
                    
                </div>
                <div class="col my-3">
                    <input class="form-control" type="text" id="parentesco-familiar` + contF + `" placeholder="Parentesco">
                    <small class="text-danger"></small>
                    
                </div>
            </div>
        </div>
        `;

        $("#cont-familiares").append(cont_familiar);

        contF++;

        if (contF > 0) {
           // $("#opc-familiar").append("<div class='col-4'><button type='button' class='btn btn-verde' id='remover-familiar'>Remover familiar</button></div>");
            $(".cont-remover-familiar").removeClass("d-none").addClass("d-block");
        }

        console.log(contF);

    },

    // --------- Verifica y envía el formulario de tipo de documento -----


    enviarFormEstadoCivil : function() {

  
        var nombre = $("#nombre-estado-civil").val();

        if (nombre.length != 0) {
            $("#nombre-estado-civil").next().html("");

            $.post('../../controller/estado civil/RegistrarEstadoCivil.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-estado-civil").html(responseText);
            })
        }else{
            $("#nombre-estado-civil").next().html("Campo vacío, por favor ingrese el estado civil");
        }


    },

    enviarFormGenero : function () {

        
        var nombre = $("#nombre-genero").val();

        if (nombre.length != 0) {
            $("#nombre-genero").next().html("");

            $.post('../../controller/genero/RegistrarGenero.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-genero").html(responseText);
            })
        }else{
            $("#nombre-genero").next().html("Campo vacío, por favor ingrese el género");
        }

    },
     
    enviarFormTipoDocumento: function () {

        var nombre = $("#nombre-tipo-documento").val();


        if (nombre.length != 0) {
            $("#nombre-tipo-documento").next().html("");

            $.post('../../controller/tipo documento/RegistrarTipoDocumento.php',{
                nombre:nombre
            },function(responseText){
                $("#rta-tipo-documento").html(responseText);
                setTimeout("location.reload()", 1800);
            });
                
        }else{
            $("#nombre-tipo-documento").next().html("Campo vacío, por favor ingrese el tipo de documento");
        }

    },

    volverForm : function () {

        //var cantidadCont = $(".cont-registro").toArray().length;
        var anchoContRegistro = $(".cont-registro").innerWidth();
        
        sumaAnchoContRegistro -= anchoContRegistro;


        $("#cont-campos").scrollLeft(sumaAnchoContRegistro);
        $(this).prop('disabled', true);

        if (sumaAnchoContRegistro === 0) {
            $(this).prop('disabled', true);
        }else{
            setTimeout(() =>{
                $(this).prop('disabled', false);

            },500);
        }

        $("#btn-registrar-empleado").val("Siguiente > ");

        console.log(sumaAnchoContRegistro);

    },

    // ---------- Verifica y envía el formulario de registrar un empleado -----------------

    enviarFormRegistro : function() {

        var cantidadCont = $(".cont-registro").toArray().length;
        var anchoContRegistro = $(".cont-registro").innerWidth();
        
        var anchoContPpal = (cantidadCont * anchoContRegistro) - anchoContRegistro;
        // alert(anchoContPpal + " " + sumaAnchoContRegistro);

        if (parseInt(sumaAnchoContRegistro) !== parseInt(anchoContPpal)) {

            sumaAnchoContRegistro += anchoContRegistro;
            $("#cont-campos").scrollLeft(sumaAnchoContRegistro);
        

            $(this).prop('disabled', true);

            setTimeout(() =>{

                $(this).prop('disabled', false);

            },500);

        } else{

            // ----- Datos personales ------

            var id_usuario = $("#id_empleado").val();
            var tipo_documento = $("#tipo_documento").val();
            var fecha_expedicion = $("#fecha_expedicion").val();
            var lugar_expedicion = $("#lugar_expedicion").val();

            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var telefono_fijo = $("#telefono_fijo").val();
            var telefono_movil = $("#telefono_movil").val();
            var tipo_casa =  $("#tipo_casa").val();
            var genero = $("#genero").val();
            var fecha_nacimiento = $("#fecha_nacimiento").val();
            var edad = $("#edad").val();
            var direccion = $("#direccion").val();
            var lugar_residencia = $("#lugar_residencia").val();
            var nivel_academico = $("#nivel_academico").val();
            var area_academica = $("#area_academica").val();
            var estado_civil = $("#estado_civil").val();
            var eps = $("#eps").val();
            var nro_cuenta = $("#nro_cuenta").val();
            var tipo_sangre = $("#tipo_sangre").val();
            var antecedentes = $("#antecedentes").val();
            var practica_deporte = $("#practica_deporte").val();
            var consumo_cigarros = $("#consumo_cigarros").val();
            var consumo_licor = $("#consumo_licor").val();
            var consumo_spa = $("#consumo_spa").val();
            var correo = $("#correo").val();
            var password = $("#pass").val();
            var nombre_persona_emergencia = $("#nombre_persona_emergencia").val();
            var telefono_emergencia = $("#telefono_emergencia").val();
            var celular_emergencia = $("#celular_emergencia").val();
            var parentesco_emergencia = $("#parentesco_emergencia").val();

            // ------- Datos Laboraless -------
            var sucursal = $("#sucursal").val();
            var tipo_contrato = $("#tipo_contrato").val();
            var fecha_ingreso = $("#fecha_ingreso").val();
            var fecha_retiro = $("#fecha_retiro").val();
            var motivo_retiro = $("#motivo_retiro").val();
            var salario = $("#salario").val();  
            var valor_dia = $("#valor_dia").val();
            var valor_hora = $("#valor_hora").val();
            var clase_riesgo = $("#clase_riesgo").val();
            var porcentaje_riesgo = $("#porcentaje_riesgo").val();
            var area = $("#area").val();
            var seccion = $("#seccion").val();
            var cargo = $("#cargo").val();
            var pension = $("#pension").val();
            var estado = $("#estado").val();
            var perfil = $("#perfil").val();

            // ------------------- Datos Familiares ----------------

            var id_familiar = [];
            var nombre_familiar = [];
            var apellido_familiar = [];
            var edad_familiar = [];
            var escolaridad_familiar = [];
            var parentesco_familiar = [];

            for (let i = 0; i < contF; i++) {
                id_familiar[i] = $("#id_familiar" + i).val();
                nombre_familiar[i] = $("#nombre-familiar" + i).val();
                apellido_familiar[i] = $("#apellido-familiar" + i).val();
                edad_familiar[i] = $("#edad-familiar" + i).val();
                escolaridad_familiar[i] = $("#escolaridad-familiar" + i).val();
                parentesco_familiar[i] = $("#parentesco-familiar" + i).val();
            }

           /*  var nombre_familiar = $("#apellido-familiar").val();
            var apellido_familiar = $("#apellido-familiar").val();
            var edad_familiar = $("#edad-familiar").val();
            var escolaridad_familiar = $("#escolaridad-familiar").val();
            var parentesco_familiar = $("#parentesco-familiar").val(); */


            // ------------------- Datos hijos ------------------

           // var id_hijo = $("#id_hijo").val();

            var nombre_hijo = [];
            var apellido_hijo = [];
            var edad_hijo = [];
            var fecha_nacimiento_hijo = [];

            for (let i = 0; i < contH; i++) {
                 nombre_hijo[i] = $("#nombre_hijo" + i).val();
                 apellido_hijo[i] = $("#apellido_hijo" + i).val();
                 edad_hijo[i] = $("#edad_hijo" + i).val();
                 fecha_nacimiento_hijo[i] = $("#fecha_nacimiento_hijo" + i).val();
            }

            /* var nombre_hijo = $("#nombre_hijo").val();
            var apellido_hijo = $("#apellido_hijo").val();
            var edad_hijo = $("#edad_hijo").val();
            var fecha_nacimiento_hijo = $("#fecha_nacimiento_hijo").val(); */

            
            var validar = 0;


            // -------------------- Validar campos de datos personales ---------------------

            if (tipo_documento.length !== 0) {
                $("#tipo_documento").next().html("");
                validar++;
            }else{
                $("#tipo_documento").next().html("Campo vacío, por favor ingrese el tipo de contrato");

            }

            if (id_usuario.length != 0) {
                $("#id_empleado").next().html("");
                validar++;
            }else{
                $("#id_empleado").next().html("Campo vacío, por favor ingrese el número de documento");

            }

            if (fecha_expedicion.length != 0) {
                $("#fecha_expedicion").next().html("");
                validar++;
            }else{
                $("#fecha_expedicion").next().html("Campo vacío, por favor ingrese la fecha de expedición");

            }
            
            if (lugar_expedicion.length !== 0) {
                $("#lugar_expedicion").next().html("");
                validar++;
            }else{
                $("#lugar_expedicion").next().html("Campo vacío, por favor ingrese el lugar de expedición");

            }
            
          

            if (nombre.length !== 0) {
                $("#nombre").next().html("");
                validar++;
            }else{
                $("#nombre").next().html("Campo vacío, por favor ingrese el nombre");

            }

            if (apellido.length !== 0) {
                $("#apellido").next().html("");
                validar++;
            }else{
                $("#apellido").next().html("Campo vacío, por favor ingrese el apellido");

            }

            /* if (telefono_fijo.length != 0) {
                $("#telefono_fijo").next().html("");
                validar++;
            }else{
                $("#telefono_fijo").next().html("Campo vacío, por favor ingrese el teléfono fijo");

            }

            if (telefono_movil.length != 0) {
                $("#telefono_movil").next().html("");
                validar++;
            }else{
                $("#telefono_movil").next().html("Campo vacío, por favor ingrese el teléfono Móvil");

            } */

            if (tipo_casa.length !== 0) {
                $("#tipo_casa").next().html("");
                validar++;
            }else{
                $("#tipo_casa").next().html("Campo vacío, por favor ingrese el tipo de casa");

            }

            if (genero.length !== 0) {
                $("#genero").next().html("");
                validar++;
            }else{
                $("#genero").next().html("Campo vacío, por favor ingrese el género");

            }

            if (fecha_nacimiento.length !== 0) {
                $("#fecha_nacimiento").next().html("");
                validar++;
            }else{
                $("#fecha_nacimiento").next().html("Campo vacío, por favor ingrese la fecha de nacimiento");

            }

            if (edad.length !== 0) {
                $("#edad").next().html("");
                validar++;
            }else{
                $("#edad").next().html("Campo vacío, por favor ingrese la edad");

            }

            if (estado_civil.length !== 0) {
                $("#estado_civil").next().html("");
                validar++;
            }else{
                $("#estado_civil").next().html("Campo vacío, por favor ingrese el estado civil");

            }

            if (eps.length !== 0) {
                $("#eps").next().html("");
                validar++;
            }else{
                $("#eps").next().html("Campo vacío, por favor ingrese su EPS");

            }

            if (nro_cuenta.length !== 0) {
                $("#nro_cuenta").next().html("");
                validar++;
            }else{
                $("#nro_cuenta").next().html("Campo vacío, por favor ingrese su # de cuenta de Bamcolombia");

            }

            if (tipo_sangre.length !== 0) {
                $("#tipo_sangre").next().html("");
                validar++;
            }else{
                $("#tipo_sangre").next().html("Campo vacío, por favor ingrese el tipo de sangre");

            }

            if (correo.length !== 0) {

                if (correo.indexOf("@") > -1) {
                    $("#correo").next().html("");
                validar++;
                }else{
                    $("#correo").next().html("Correo no valido (recuerde: @)");

                }
                
            }else{
                $("#correo").next().html("Campo vacío, por favor ingrese el correo");

            }

            if (password.length !== 0) {
                $("#pass").next().html("");
                validar++;
            }else{
                $("#pass").next().html("Campo vacío, por favor ingrese la contraseña");

            }


            // --------------------- Validar campos de datos laborales --------------------

            if (sucursal.length !== 0) {
                $("#sucursal").next().html("");
                validar++;
            }else{
                $("#sucursal").next().html("Campo vacío, por favor ingrese la sucursal");

            }

            if (tipo_contrato.length !== 0) {
                $("#tipo_contrato").next().html("");
                validar++;
            }else{
                $("#tipo_contrato").next().html("Campo vacío, por favor ingrese el tipo de contrato");

            }

            if (fecha_ingreso.length !== 0) {
                $("#fecha_ingreso").next().html("");
                validar++;
            }else{
                $("#fecha_ingreso").next().html("Campo vacío, por favor ingrese la fecha de ingreso");

            }

            if (salario.length !== 0) {
                $("#salario").next().html("");
                validar++;
            }else{
                $("#salario").next().html("Campo vacío, por favor ingrese el salario");

            }

            if (valor_dia.length != 0) {
                $("#valor_dia").next().html("");
                validar++;
            }else{
                $("#valor_dia").next().html("Campo vacío, por favor ingrese el valor del día");

            }

            if (valor_hora.length !== 0) {
                $("#valor_hora").next().html("");
                validar++;
            }else{
                $("#valor_hora").next().html("Campo vacío, por favor ingrese el valor de la hora");

            }

            if (area.length !== 0) {
                $("#area").next().html("");
                validar++;
            }else{
                $("#area").next().html("Campo vacío, por favor ingrese el area");

            }
    
            if (seccion.length !== 0) {
                $("#seccion").next().html("");
                validar++;
            }else{
                $("#seccion").next().html("Campo vacío, por favor ingrese el area");

            }

            if (cargo.length !== 0) {
                $("#cargo").next().html("");
                validar++;
            }else{
                $("#cargo").next().html("Campo vacío, por favor ingrese el cargo");

            }

            if (estado.length !== 0) {
                $("#estado").next().html("");
                validar++;
            }else{
                $("#estado").next().html("Campo vacío, por favor ingrese el cargo");

            }

            if (perfil.length !== 0) {
                $("#perfil").next().html("");
                validar++;
            }else{
                $("#perfil").next().html("Campo vacío, por favor ingrese el perfil");

            }

           

    
           if (validar === 27) {
                
                $.post('../../controller/usuario/RegistrarUsuario.php', {
                    id_usuario: id_usuario,
                    tipo_documento: tipo_documento,
                    fecha_expedicion: fecha_expedicion,
                    lugar_expedicion: lugar_expedicion,
                    nombre: nombre,
                    apellido:apellido,
                    telefono_fijo: telefono_fijo,
                    telefono_movil: telefono_movil,
                    tipo_casa: tipo_casa,
                    genero: genero,
                    fecha_nacimiento: fecha_nacimiento,
                    edad: edad,
                    direccion: direccion,
                    lugar_residencia: lugar_residencia,
                    nivel_academico: nivel_academico,
                    area_academica: area_academica,
                    estado_civil: estado_civil,
                    eps: eps,
                    nro_cuenta: nro_cuenta,
                    tipo_sangre: tipo_sangre,
                    antecedentes: antecedentes,
                    practica_deporte: practica_deporte,
                    consumo_cigarros: consumo_cigarros,
                    consumo_licor: consumo_licor,
                    consumo_spa: consumo_spa,
                    correo:correo,
                    password:password,
                    nombre_persona_emergencia: nombre_persona_emergencia,
                    telefono_emergencia: telefono_emergencia,
                    celular_emergencia: celular_emergencia,
                    parentesco_emergencia: parentesco_emergencia,

                    
                    sucursal: sucursal,
                    tipo_contrato: tipo_contrato,
                    fecha_ingreso: fecha_ingreso,
                    fecha_retiro: fecha_retiro,
                    motivo_retiro: motivo_retiro,
                    salario: salario,
                    valor_dia: valor_dia,
                    valor_hora: valor_hora,
                    clase_riesgo: clase_riesgo,
                    porcentaje_riesgo: porcentaje_riesgo,
                    area: area,
                    seccion: seccion,
                    cargo: cargo,
                    pension: pension,
                    estado: estado,
                    perfil: perfil,
                    

                    id_familiar: id_familiar,
                    nombre_familiar: nombre_familiar,
                    apellido_familiar: apellido_familiar,
                    edad_familiar: edad_familiar,
                    escolaridad_familiar: escolaridad_familiar,
                    parentesco_familiar: parentesco_familiar,

                    nombre_hijo: nombre_hijo,
                    apellido_hijo: apellido_hijo,
                    edad_hijo: edad_hijo,
                    fecha_nacimiento_hijo: fecha_nacimiento_hijo
        
                }, function(responseText) {
                    $("#rta-registro-empleado").html(responseText);
                    //setTimeout("location.reload()", 1800);
                });


                $.post('../../controller/correo/VerificarCorreoBD.php',{
                    correo: correo
                },function(responseText){
                    $("#correo").next().html(responseText);
                });
                                                            
            }else{
                alert("Hay campos vacíos");
            } 
        }

        if (parseInt(sumaAnchoContRegistro) === parseInt(anchoContPpal)) {
            $(this).val("Registrar");
        }

        if (sumaAnchoContRegistro >= anchoContRegistro) {

            $("#btn-atras").prop('disabled', false);

        }

       // console.log(sumaAnchoContRegistro + " " + anchoContPpal);
       
        

    },

    // --------- Verifica y envía el formulario de inicio de sesión -----
    enviarFormIngreso : function() {

        var correo = $("#correo-ingresar").val();
        var pass = $("#password-ingresar").val();

        if (correo.length != 0){
            $("#correo-ingresar").next().html("");
            if (pass.length != 0) {
                $("#password-ingresar").next().html("");
                //alert("Bienvenido!");
            }else{
                $("#password-ingresar").next().html("Campo vacío, por favor ingrese la contraseña");
            }
        }else{
            $("#correo-ingresar").next().html("Campo vacío, por favor ingrese el correo");
        }
    },
 
    accionesClick : function(e) {
        
        var btn = e.target.id;
        var id = e.target.value;
        
        switch (btn) {

            // ------------- Editar un registro -----------

            

            // Estado civil

            case "btn-editar-estado-civil":

                $.post('../../controller/estado civil/EditarEstadoCivil.php',{
                    id:id
                },function(responseText) {
                    $("#editar-estado-civil").html(responseText);
                });

            break;
            
            // Genero

            case "btn-editar-genero":

                $.post('../../controller/genero/EditarGenero.php',{
                    id:id
                },function(responseText) {
                    $("#editar-genero").html(responseText);
                });

            break;

            //Tipo documento
            case "btn-editar-tipo-documento":

                $.post('../../controller/tipo documento/EditarTipoDocumento.php',{
                    id:id
                },function(responseText) {
                    $("#editar-tipo-documento").html(responseText);
                });

            break;

            //Usuario
            case "btn-editar-usuario":
                
                $.post('../../controller/usuario/EditarUsuario.php',{
                    id:id
                },function(responseText){
                    $("#editar-usuario").html(responseText);             
                });

            break;

            case "btn-editar-datos-personales":
                //console.log("funciona");

                $.post('../../controller/usuario/EditarUsuario.php',{
                    id:id,
                    opc: "personales"
                },function(responseText){
                    $("#editar-datos-personales").html(responseText);             
                });
            break;

            // Datos laborales

            case "btn-editar-datos-laborales":

                $.post('../../controller/usuario/EditarUsuario.php',{
                    id:id,
                    opc: "laborales"
                },function(responseText){
                    $("#editar-datos-laborales").html(responseText);             
                });

            break;

            // Datops familiares

            case "btn-editar-datos-familiares":

                $("#editar-datos-familiares").html("");

                $.post('../../controller/familiar/EditarFamiliar.php',{
                    id:id
                },function(responseText) {
                    $("#editar-datos-familiares").html(responseText);
                });

                setTimeout(() => {
                    $.post('../../controller/hijo/EditarHijos.php',{
                        id:id
                    },function(responseText) {
                        $("#editar-datos-familiares").append(responseText);
                    });
                },100);
                


            break;

            

            // Actualizar un registro

            case "btn-actualizar-estado-civil":

                var id_estado_civil = $("#id-estado-civil-act").val();
                var nombre = $("#nombre-estado-civil-act").val();


                $.post('../../controller/estado civil/ActualizarEstadoCivil.php',{
                    id_estado_civil: id_estado_civil,
                    nombre: nombre
                },function(responseText){
                    $("#rta-estado-civil-act").html(responseText);
                    //setTimeout("location.reload()", 1800);
                });

            break;

            case "btn-actualizar-genero":

                var id_genero = $("#id-genero-act").val();
                var nombre = $("#nombre-genero-act").val();


                $.post('../../controller/genero/ActualizarGenero.php',{
                    id_genero: id_genero,
                    nombre: nombre
                },function(responseText){
                    $("#rta-genero-act").html(responseText);
                    //setTimeout("location.reload()", 1800);
                });

            break;

            case "btn-actualizar-tipo-documento":

                var id_tipo_documento = $("#id-tipo-documento-act").val();
                var tipo_documento = $("#tipo-documento-act").val();


                $.post('../../controller/tipo documento/ActualizarTipoDocumento.php',{
                    id_tipo_documento: id_tipo_documento,
                    tipo_documento: tipo_documento
                },function(responseText){
                    $("#rta-tipo-documento-act").html(responseText);
                    setTimeout("location.reload()", 1800);
                });

            break;

            // Usuario
            case "btn-actualizar-usuario":

                var id_usuario = $("#id-usuario-act").val();
                var tipo_documento = $("#tipo-documento-usuario-act").val();
                var nombre = $("#nombre-usuario-act").val();
                var apellido = $("#apellido-usuario-act").val();
                var telefono = $("#telefono-usuario-act").val();
                var cargo = $("#cargo-usuario-act").val();
                var tipo_contrato = $("#tipo-contrato-usuario-act").val();
                var sueldo = $("#sueldo-usuario-act").val();
                var correo = $("#correo-usuario-act").val();
                var password = $("#password-usuario-act").val();
                var fecha_inicio = $("#fecha-inicio-usuario-act").val();
                var fecha_fin = $("#fecha-fin-usuario-act").val();
                var perfil = $("#perfil-usuario-act").val();
                var estado = $("#estado-usuario-act").val();
                var genero = $("#genero-usuario-act").val();

                $.post('../../controller/usuario/ActualizarUsuario.php',{
                    id_usuario: id_usuario,
                    tipo_documento: tipo_documento,
                    nombre: nombre,
                    apellido:apellido,
                    telefono:telefono,
                    cargo:cargo,
                    tipo_contrato:tipo_contrato,
                    sueldo:sueldo,
                    correo:correo,
                    password:password,
                    fecha_inicio:fecha_inicio,
                    fecha_fin:fecha_fin,
                    perfil:perfil,
                    estado: estado,
                    genero: genero
                    
                },function(responseText) {
                    $("#rta-usuario-act").html(responseText);
                    setTimeout("location.reload()", 1800);
                });

            break;

            // Usuario - Datos personales
            case "btn-actualizar-datos-personales":

                var id_usuario = $("#id_empleado_act").val();
                var tipo_documento = $("#tipo_documento_act").val();
                var fecha_expedicion = $("#fecha_expedicion_act").val();
                var lugar_expedicion = $("#lugar_expedicion_act").val();
    
                var nombre = $("#nombre_act").val();
                var apellido = $("#apellido_act").val();
                var telefono_fijo = $("#telefono_fijo_act").val();
                var telefono_movil = $("#telefono_movil_act").val();
                var tipo_casa =  $("#tipo_casa_act").val();
                var genero = $("#genero_act").val();
                var fecha_nacimiento = $("#fecha_nacimiento_act").val();
                var edad = $("#edad_act").val();
                var direccion = $("#direccion_act").val();
                var lugar_residencia = $("#lugar_residencia_act").val();
                var nivel_academico = $("#nivel_academico_act").val();
                var area_academica = $("#area_academica_act").val();
                var estado_civil = $("#estado_civil_act").val();
                var eps = $("#eps_act").val();
                var nro_cuenta = $("#nro_cuenta_act").val();
                var tipo_sangre = $("#tipo_sangre_act").val();
                var antecedentes = $("#antecedentes_act").val();
                var practica_deporte = $("#practica_deporte_act").val();
                var consumo_cigarros = $("#consumo_cigarros_act").val();
                var consumo_licor = $("#consumo_licor_act").val();
                var consumo_spa = $("#consumo_spa_act").val();
                var correo = $("#correo_act").val();
                var password = $("#pass_act").val();
                var nombre_persona_emergencia = $("#nombre_persona_emergencia_act").val();
                var telefono_emergencia = $("#telefono_emergencia_act").val();
                var celular_emergencia = $("#celular_emergencia_act").val();
                var parentesco_emergencia = $("#parentesco_emergencia_act").val();
                var perfil = $("#perfil_act").val();

                var validar = 0;

                if (tipo_documento.length !== 0) {
                    $("#tipo_documento_act").next().html("");
                    validar++;
                }else{
                    $("#tipo_documento_act").next().html("Campo vacío, por favor ingrese el tipo de contrato");
    
                }
    
                if (id_usuario.length != 0) {
                    $("#id_empleado_act").next().html("");
                    validar++;
                }else{
                    $("#id_empleado_act").next().html("Campo vacío, por favor ingrese el número de documento");
    
                }
    
                if (fecha_expedicion.length != 0) {
                    $("#fecha_expedicion_act").next().html("");
                    validar++;
                }else{
                    $("#fecha_expedicion_act").next().html("Campo vacío, por favor ingrese la fecha de expedición");
    
                }
                
                if (lugar_expedicion.length !== 0) {
                    $("#lugar_expedicion_act").next().html("");
                    validar++;
                }else{
                    $("#lugar_expedicion_act").next().html("Campo vacío, por favor ingrese el lugar de expedición");
    
                }
                
              
    
                if (nombre.length !== 0) {
                    $("#nombre_act").next().html("");
                    validar++;
                }else{
                    $("#nombre_act").next().html("Campo vacío, por favor ingrese el nombre");
    
                }
    
                if (apellido.length !== 0) {
                    $("#apellido_act").next().html("");
                    validar++;
                }else{
                    $("#apellido_act").next().html("Campo vacío, por favor ingrese el apellido");
    
                }
    
                /* if (telefono_fijo.length != 0) {
                    $("#telefono_fijo").next().html("");
                    validar++;
                }else{
                    $("#telefono_fijo").next().html("Campo vacío, por favor ingrese el teléfono fijo");
    
                }
    
                if (telefono_movil.length != 0) {
                    $("#telefono_movil").next().html("");
                    validar++;
                }else{
                    $("#telefono_movil").next().html("Campo vacío, por favor ingrese el teléfono Móvil");
    
                } */
    
                if (tipo_casa.length !== 0) {
                    $("#tipo_casa_act").next().html("");
                    validar++;
                }else{
                    $("#tipo_casa_act").next().html("Campo vacío, por favor ingrese el tipo de casa");
    
                }
    
                if (genero.length !== 0) {
                    $("#genero_act").next().html("");
                    validar++;
                }else{
                    $("#genero_act").next().html("Campo vacío, por favor ingrese el género");
    
                }
    
                if (fecha_nacimiento.length !== 0) {
                    $("#fecha_nacimiento_act").next().html("");
                    validar++;
                }else{
                    $("#fecha_nacimiento_act").next().html("Campo vacío, por favor ingrese la fecha de nacimiento");
    
                }
    
                if (edad.length !== 0) {
                    $("#edad_act").next().html("");
                    validar++;
                }else{
                    $("#edad_act").next().html("Campo vacío, por favor ingrese la edad");
    
                }
    
                if (estado_civil.length !== 0) {
                    $("#estado_civil_act").next().html("");
                    validar++;
                }else{
                    $("#estado_civil_act").next().html("Campo vacío, por favor ingrese el estado civil");
    
                }
    
                if (eps.length !== 0) {
                    $("#eps_act").next().html("");
                    validar++;
                }else{
                    $("#eps_act").next().html("Campo vacío, por favor ingrese su EPS");
    
                }
    
                if (nro_cuenta.length !== 0) {
                    $("#nro_cuenta_act").next().html("");
                    validar++;
                }else{
                    $("#nro_cuenta_act").next().html("Campo vacío, por favor ingrese su # de cuenta de Bamcolombia");
    
                }
    
                if (tipo_sangre.length !== 0) {
                    $("#tipo_sangre_act").next().html("");
                    validar++;
                }else{
                    $("#tipo_sangre_act").next().html("Campo vacío, por favor ingrese el tipo de sangre");
    
                }
    
                if (correo.length !== 0) {
    
                    if (correo.indexOf("@") > -1) {
                        $("#correo_act").next().html("");
                    validar++;
                    }else{
                        $("#correo_act").next().html("Correo no valido (recuerde: @)");
    
                    }
                    
                }else{
                    $("#correo_act").next().html("Campo vacío, por favor ingrese el correo");
    
                }
    
                if (password.length !== 0) {
                    $("#pass_act").next().html("");
                    validar++;
                }else{
                    $("#pass_act").next().html("Campo vacío, por favor ingrese la contraseña");
    
                }

                if (perfil.length !== 0) {
                    $("#perfil_act").next().html("");
                    validar++
                }else{
                    $("#perfil_act").next().html("Campo vacío, por favor selecciona un perfil");
                }
                
                if (validar === 17) {

                    $.post('../../controller/usuario/ActualizarUsuario.php', {
                        opc: "personales",
                        id_usuario: id_usuario,
                        tipo_documento: tipo_documento,
                        fecha_expedicion: fecha_expedicion,
                        lugar_expedicion: lugar_expedicion,
                        nombre: nombre,
                        apellido:apellido,
                        telefono_fijo: telefono_fijo,
                        telefono_movil: telefono_movil,
                        tipo_casa: tipo_casa,
                        genero: genero,
                        fecha_nacimiento: fecha_nacimiento,
                        edad: edad,
                        direccion: direccion,
                        lugar_residencia: lugar_residencia,
                        nivel_academico: nivel_academico,
                        area_academica: area_academica,
                        estado_civil: estado_civil,
                        eps: eps,
                        nro_cuenta: nro_cuenta,
                        tipo_sangre: tipo_sangre,
                        antecedentes: antecedentes,
                        practica_deporte: practica_deporte,
                        consumo_cigarros: consumo_cigarros,
                        consumo_licor: consumo_licor,
                        consumo_spa: consumo_spa,
                        correo:correo,
                        password:password,
                        nombre_persona_emergencia: nombre_persona_emergencia,
                        telefono_emergencia: telefono_emergencia,
                        celular_emergencia: celular_emergencia,
                        parentesco_emergencia: parentesco_emergencia,
                        perfil: perfil
            
                    }, function(responseText) {
                        $("#rta-datos-personales-act").html(responseText);
                        setTimeout("location.reload()", 1800);
                    });

                }else{

                    alert("Hay campos importantes que están vacíos");
                }

                /* $.post('../../controller/usuario/ActualizarUsuario.php',{
                    id_usuario: id_usuario,
                    tipo_documento: tipo_documento,
                    nombre: nombre,
                    apellido:apellido,
                    telefono:telefono,
                    cargo:cargo,
                    tipo_contrato:tipo_contrato,
                    sueldo:sueldo,
                    correo:correo,
                    password:password,
                    fecha_inicio:fecha_inicio,
                    fecha_fin:fecha_fin,
                    perfil:perfil,
                    estado: estado,
                    genero: genero
                    
                },function(responseText) {
                    $("#rta-usuario-act").html(responseText);
                    setTimeout("location.reload()", 1800);
                }); */

            break;

            case "btn-actualizar-datos-laborales":

                var id_usuario = $("#id_empleado_act").val();
                var sucursal = $("#sucursal_act").val();
                var tipo_contrato = $("#tipo_contrato_act").val();
                var fecha_ingreso = $("#fecha_ingreso_act").val();
                var fecha_retiro = $("#fecha_retiro_act").val();
                var motivo_retiro = $("#motivo_retiro_act").val();
                var salario = $("#salario_act").val();  
                var valor_dia = $("#valor_dia_act").val();
                var valor_hora = $("#valor_hora_act").val();
                var clase_riesgo = $("#clase_riesgo_act").val();
                var porcentaje_riesgo = $("#porcentaje_riesgo_act").val();
                var area = $("#area_act").val();
                var seccion = $("#seccion_act").val();
                var cargo = $("#cargo_act").val();
                var pension = $("#pension_act").val();
                 var estado = $("#estado_act").val();

                 var validar = 0;

                 // --------------------- Validar campos de datos laborales --------------------

             if (id_usuario.length != 0) {
                $("#id_empleado_act").next().html("");
                validar++;
            }else{
                $("#id_empleado_act").next().html("Campo vacío, por favor ingrese el número de documento");

            }

            if (sucursal.length !== 0) {
                $("#sucursal_act").next().html("");
                validar++;
            }else{
                $("#sucursal_act").next().html("Campo vacío, por favor ingrese la sucursal");

            }

            if (tipo_contrato.length !== 0) {
                $("#tipo_contrato_act").next().html("");
                validar++;
            }else{
                $("#tipo_contrato_act").next().html("Campo vacío, por favor ingrese el tipo de contrato");

            }

            if (fecha_ingreso.length !== 0) {
                $("#fecha_ingreso_act").next().html("");
                validar++;
            }else{
                $("#fecha_ingreso_act").next().html("Campo vacío, por favor ingrese la fecha de ingreso");

            }

            if (salario.length !== 0) {
                $("#salario_act").next().html("");
                validar++;
            }else{
                $("#salario_act").next().html("Campo vacío, por favor ingrese el salario");

            }

            if (valor_dia.length != 0) {
                $("#valor_dia_act").next().html("");
                validar++;
            }else{
                $("#valor_dia_act").next().html("Campo vacío, por favor ingrese el valor del día");

            }

            if (valor_hora.length !== 0) {
                $("#valor_hora_act").next().html("");
                validar++;
            }else{
                $("#valor_hora_act").next().html("Campo vacío, por favor ingrese el valor de la hora");

            }

            if (area.length !== 0) {
                $("#area_act").next().html("");
                validar++;
            }else{
                $("#area_act").next().html("Campo vacío, por favor ingrese el area");

            }
    
            if (seccion.length !== 0) {
                $("#seccion_act").next().html("");
                validar++;
            }else{
                $("#seccion_act").next().html("Campo vacío, por favor ingrese el area");

            }

            if (cargo.length !== 0) {
                $("#cargo_act").next().html("");
                validar++;
            }else{
                $("#cargo_act").next().html("Campo vacío, por favor ingrese el cargo");

            }

            if (estado.length !== 0) {
                $("#estado_act").next().html("");
                validar++;
            }else{
                $("#estado_act").next().html("Campo vacío, por favor ingrese el cargo");

            }

            if (validar === 11) {
                
                $.post('../../controller/usuario/ActualizarUsuario.php', {
                    
                    opc: "laborales",
                    id_usuario: id_usuario,
                    sucursal: sucursal,
                    tipo_contrato: tipo_contrato,
                    fecha_ingreso: fecha_ingreso,
                    fecha_retiro: fecha_retiro,
                    motivo_retiro: motivo_retiro,
                    salario: salario,
                    valor_dia: valor_dia,
                    valor_hora: valor_hora,
                    clase_riesgo: clase_riesgo,
                    porcentaje_riesgo: porcentaje_riesgo,
                    area: area,
                    seccion: seccion,
                    cargo: cargo,
                    pension: pension,
                    estado: estado
                    
        
                }, function(responseText) {
                    $("#rta-datos-laborales-act").html(responseText);
                    //setTimeout("location.reload()", 1800);
                });
                                                            
            }



            break;

            case "btn-actualizar-datos-familiares":

            // ------------------- Datos Familiares ----------------

            var contCamposF = $(".cont-familiar-act").toArray().length;

                var id_familiar = [];
                var nombre_familiar = [];
                var apellido_familiar = [];
                var edad_familiar = [];
                var escolaridad_familiar = [];
                var parentesco_familiar = [];

                for (let i = 0; i < contCamposF; i++) {
                    id_familiar[i] = $("#id_familiar_act" + i).val();
                    nombre_familiar[i] = $("#nombre_familiar_act" + i).val();
                    apellido_familiar[i] = $("#apellido_familiar_act" + i).val();
                    edad_familiar[i] = $("#edad_familiar_act" + i).val();
                    escolaridad_familiar[i] = $("#escolaridad_familiar_act" + i).val();
                    parentesco_familiar[i] = $("#parentesco_familiar_act" + i).val();
                }

                $.post('../../controller/familiar/ActualizarFamiliar.php',{
                    id_familiar: id_familiar,
                    nombre_familiar: nombre_familiar,
                    apellido_familiar: apellido_familiar,
                    edad_familiar: edad_familiar,
                    escolaridad_familiar: escolaridad_familiar,
                    parentesco_familiar: parentesco_familiar


                },function(responseText) {
                    $("#rta-datos-familiares-act").html(responseText);
                });
                

                // ------------------ Datos hijos ---------------

                var contCamposH = $(".cont-hijo-act").toArray().length;

                var id_hijo = [];
                var nombre_hijo = [];
                var apellido_hijo = [];
                var edad_hijo = [];
                var fecha_nacimiento_hijo = [];

                for (let i = 0; i < contCamposH; i++) {
                    id_hijo[i] = $("#id_hijo_act" + i).val();
                    nombre_hijo[i] = $("#nombre_hijo_act" + i).val();
                    apellido_hijo[i] = $("#apellido_hijo_act" + i).val();
                    edad_hijo[i] = $("#edad_hijo_act" + i).val();
                    fecha_nacimiento_hijo[i] = $("#fecha_nacimiento_hijo_act" + i).val();

                }


               

                setTimeout(() => {
                    $.post('../../controller/hijo/ActualizarHijos.php',{
                        id_hijo:id_hijo,
                        nombre_hijo: nombre_hijo,
                        apellido_hijo: apellido_hijo,
                        edad_hijo: edad_hijo,
                        fecha_nacimiento_hijo: fecha_nacimiento_hijo
                    },function(responseText) {
                        $("#rta-datos-familiares-act").append(responseText);
                    });
                },100);

            break;
            default:
                break;
        }

    },

    redimensionar : function() {
        var anchoVentana = $(this).width();

        console.log(anchoVentana);
        if (anchoVentana < 992) {
            $("#seccion-login .col-9").addClass("col-12");
            $("#seccion-login .col-9").removeClass("col-9");
        }else{
            $("#seccion-login .col-12").addClass("col-9");
            $("#seccion-login .col-12").removeClass("col-12");
        }
    }
}

// ------------ Se ejecutan las funciones descritas cuando se haga click en cualquier parte del documento ----
$(document).click(acciones.accionesClick);
// --------- Ejecuta todos los procesos cuando el documento este listo ----------------
$(document).ready(acciones.listo);
// --------- Ejecut --------------
$(window).resize(acciones.redimensionar);