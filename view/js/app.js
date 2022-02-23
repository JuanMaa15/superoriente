"use strict"
var sumaAnchoContRegistro = 0;
var contF = 0;
var contH = 0;
var contenido_area = $("#area").html();
var opc_trabajo_reporte = "";

var acciones = {
    listo : function() {

        

        // ------ Se ejecutan las funciones por medio del evento click ----------------

        $("#btn-ingresar").click(acciones.enviarFormIngreso);
        $("#btn-registrar-empleado").click(acciones.enviarFormRegistro);
        $("#btn-registrar-tipo-documento").click(acciones.enviarFormTipoDocumento);
        $("#btn-registrar-genero").click(acciones.enviarFormGenero);
        $("#btn-registrar-estado-civil").click(acciones.enviarFormEstadoCivil);
        $("#btn-registrar-tipo-contrato").click(acciones.enviarFormTipoContrato);
        $("#btn-registrar-seccion").click(acciones.enviarFormSeccion);
        $("#btn-registrar-area").click(acciones.enviarFormArea);    
        $("#btn-registrar-cargo").click(acciones.enviarFormCargo);
        $("#btn-registrar-sucursal").click(acciones.enviarFormSucursal);
        $("#btn-registrar-eps").click(acciones.enviarFormEps);
        $("#btn-registrar-nivel-academico").click(acciones.enviarFormNivelAcademico);
        $("#btn-registrar-pension").click(acciones.enviarFormPension);
        $("#btn-registrar-tipo-dotacion").click(acciones.enviarFormTipoDotacion);

        $("#btn-atras").click(acciones.volverForm);
        $("#agregar-familiar").click(acciones.agregarFamiliar);
        $("#remover-familiar").click(acciones.removerFamiliar);
        $("#agregar-hijo").click(acciones.agregarhijo);
        $("#remover-hijo").click(acciones.removerhijo);
        $("#btn-buscar-fecha").click(acciones.buscarEmpleadoFecha);
        $("#btn-buscar-salario").click(acciones.buscarEmpleadoSalario);
        $("#btn-buscar-opcion-trabajo").click(acciones.buscarEmpleadoOpcTrabajo)

        $("input:radio[name=opcTrabajo]").click(acciones.habilitarComboBox);
        $("#filtro-empleado").click(acciones.filtroEmpleado);
        $("#menu-desplegable-listas").click(acciones.desplegarMenuListas);
        $("#seccion").click(acciones.mostrarOpcionesArea);
        $("#area").click(acciones.mostrarOpcionesCargo);
        $("#btn-mostrar-ocultar").click(acciones.mostrarMenu);
        $("#enlace-administracion").click(acciones.desplegarSubmenu);

        $(".fecha_nacimiento").on('change', acciones.calcularEdadesHijos);


        $("#fecha_nacimiento").on('change', acciones.calcularEdad);

        $("#buscar_empleado").keyup(acciones.buscarEmpleado);
        $("#salario").keyup(acciones.calcularValorDiaHora);


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

        // Tipos de contrato 

        $.post('../../controller/tipo contrato/ListaTiposContratos.php',{

        },function (responseText) {
           $("#listado-tipos-contratos").html(responseText); 
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

        // Seccion

        $.post('../../controller/seccion/ListaSecciones.php',{

        },function(responseText) {
            $("#listado-secciones").html(responseText);
        });

        //Area

        $.post('../../controller/area/ListaAreas.php',{

        },function(responseText) {
            $("#listado-areas").html(responseText);
        });

        // Cargo 

        $.post('../../controller/cargo/ListaCargos.php',{

        },function(responseText) {
            $("#listado-cargos").html(responseText);
        });

        // Sucursal

        $.post('../../controller/sucursal/ListaSucursales.php',{

        },function(responseText) {
            $("#listado-sucursales").html(responseText);
        });

        // EPS

        $.post('../../controller/eps/ListaEpss.php',{

        },function(responseText) {
            $("#listado-epss").html(responseText);
        });

        // Nivel academico

        $.post('../../controller/nivel_academico/ListaNivelesAcademicos.php',{

        },function(responseText) {
            $("#listado-niveles-academicos").html(responseText);
        });

        // Pensión

        $.post('../../controller/pension/ListaPensiones.php',{

        },function(responseText) {
            $("#listado-pensiones").html(responseText);
        });

        //Tipo de dotación

        $.post('../../controller/tipo_dotacion/ListaTiposDotaciones.php',{

        },function(responseText) {
            $("#listado-tipos-dotaciones").html(responseText);
        });

    },


    // Despliega el submenú de administración en el menú lateral

    desplegarSubmenu : function(e) {


        e.preventDefault();

        var submenu_administracion = $("#submenu-administracion");

        if (!submenu_administracion.hasClass("desplegar-submenu")){

            submenu_administracion.addClass("desplegar-submenu");

        }else{
            submenu_administracion.removeClass("desplegar-submenu");
        }

    },

    // Muestra el la barra lateral del menú completa

    mostrarMenu : function() {

        //alert("funciona");
        var cont_menu = $("#cont_menu");
        var cont_ppal_menu = $("#cont-ppal-menu");
     

        if (!cont_menu.hasClass("mostrar-menu")) {

            cont_menu.addClass("mostrar-menu");

            cont_ppal_menu.removeClass("col-1");
            cont_ppal_menu.addClass("col-2");
   
            

        }else{
            cont_menu.removeClass("mostrar-menu");

            cont_ppal_menu.removeClass("col-2");
            cont_ppal_menu.addClass("col-1")

        }

    },

    // Muestra las opciones en el Combo Box de Cargo

    mostrarOpcionesCargo : function() {

        var area = $(this).val();
        var seccion = $("#seccion").val();
        var area = $("#area").val();

        if (area.length !== 0) {
            $.post('../../controller/cargo/CbxCargo.php',{
                seccion: seccion,
                area: area
            },function(responseText){
                $("#cargo").html(responseText);
            });
        }else{
            $("#cargo").html("<option value=''>Cargo *</option>");
        }

        

    },

    // Muestra las opciones en el Combo Box de Area

    mostrarOpcionesArea : function () {

        
        
        var seccion = $(this).val();
        var area = $("#area").val();
        /* var option_first = "<option value=''></option>"; */
        

        if (seccion.length !== 0) {
            
            $("#area").html(contenido_area);
            $(".opc-area").removeClass("d-none");
            $(".opc-area").addClass("d-block");
           
            $("#area option:first").remove();

        }else{
            $(".opc-area").addClass("d-none");
            $(".opc-area").removeClass("d-block");
           $("#area").html(`<option value=''>Area *</option>`);
            
        }

        if (area.length !== 0 && seccion.length !== 0) {

            $.post('../../controller/cargo/CbxCargo.php',{
                seccion: seccion,
                area: area
            },function(responseText){
                $("#cargo").html(responseText);
            });
        }else{
            $("#cargo").html("<option value=''>Cargo *</option>");
        }

    },


    // Calcula el valor del día y de la hora al ingresar el salario

    calcularValorDiaHora : function() {

        var salario = parseInt($(this).val());
        var valor_dia = salario / 30;
        var valor_hora = valor_dia / 8;

        $("#valor_dia").val(parseInt(valor_dia));
        $("#valor_hora").val(parseInt(valor_hora));


    },

    // Despliega los enlaces de las listas que lo redireccionaran a cada una de estados


    desplegarMenuListas : function (e) {
        
        e.preventDefault();

        if (!$("#menu-desplegado").hasClass("desplegar")) {
            $("#menu-desplegado").addClass("desplegar");
        }else{
            $("#menu-desplegado").removeClass("desplegar");
        }
        

    },


    // Me calcula la edad de los usuarios que contengan la clase "fecha_nacmiento" (Esta función es más enfocada en los hijos)

    calcularEdadesHijos : function () {

        
        
        var id_fecha_nacimiento = $(this).attr("id");

        console.log(id_fecha_nacimiento);

        for (let i = 0; i < contH; i++) {
       
            if(id_fecha_nacimiento === "fecha_nacimiento_hijo" + i) {

                var fecha_seleccionada = $("#" + id_fecha_nacimiento).val();
                var fecha_nacimiento = new Date(fecha_seleccionada);
                var fecha_actual = new Date();
                var edad = parseInt((fecha_actual - fecha_nacimiento) / (1000*60*60*24*365));

                $("#edad_hijo" + i).val(edad);

            }
            
        }

    },
    
    // Me calcula la edad al seleccionar la fecha de nacimiento

    calcularEdad : function() {

        var fecha_seleccionada = $(this).val();
        var fecha_nacimiento = new Date(fecha_seleccionada);
        var fecha_actual = new Date();
        var edad = parseInt((fecha_actual - fecha_nacimiento) / (1000*60*60*24*365));

        $("#edad").val(edad);
        
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


    // Me habilita el campo relacionado con la selección de los RadioButtons

    habilitarComboBox : function () {
      
        var opc = $("input:radio[name=opcTrabajo]:checked").val();
       // var no_checked = $("input:radio[name=opcTrabajo]:checked");
        var comboBox_seccion = $("#campo-seccion");
        var comboBox_area = $("#campo-area");
        var comboBox_cargo = $("#campo-cargo");

        $("#text_info").remove();

        switch (opc) {
            case "seccion":
                
                if (comboBox_seccion.hasClass("d-none")) {

                    comboBox_area.addClass("d-none");
                    comboBox_cargo.addClass("d-none");
                
                    
                    comboBox_seccion.addClass("d-block");
                    comboBox_seccion.removeClass("d-none");

                    opc_trabajo_reporte = "seccion";

                }else{

                }

            break;
            case "area":

                if (comboBox_area.hasClass("d-none")) {

                    comboBox_seccion.addClass("d-none");
                    comboBox_cargo.addClass("d-none");
                
                    
                    comboBox_area.addClass("d-block");
                    comboBox_area.removeClass("d-none");

                    opc_trabajo_reporte = "area";

                }

            break;
        
            case "cargo":

                if (comboBox_cargo.hasClass("d-none")) {

                    comboBox_seccion.addClass("d-none");
                    comboBox_area.addClass("d-none");
                
                    comboBox_cargo.addClass("d-block");
                    comboBox_cargo.removeClass("d-none");

                    opc_trabajo_reporte = "cargo";

                }

            break;
            
        }


    },


    buscarEmpleadoOpcTrabajo : function () {

        if (opc_trabajo_reporte.length !== 0) {

            
        switch (opc_trabajo_reporte) {
            case "seccion":
                    
                var seccion = $("#seccion_reporte").val();

                if (seccion.length !== 0) {
                    $("#seccion_reporte").next().html("");
                    $.post('../../controller/listas reportes/ListasUsuarios.php',{
                        seccion: seccion,
                        seleccionado: "seccion",
                        opc: "opc_trabajo"
                    },function (responseText){
                        $("#lista-opcion-trabajo").html(responseText);
                    });
    
                }else{
                    $("#seccion_reporte").next().html("Campo vacío, seleccione una opción");
                }
                
            break;

            case "area":
                    
                var area = $("#area_reporte").val();

                if (area.length !== 0) {
                    $("#area_reporte").next().html("");
                    $.post('../../controller/listas reportes/ListasUsuarios.php',{
                        area: area,
                        seleccionado: "area",
                        opc: "opc_trabajo"
                    },function (responseText){
                        $("#lista-opcion-trabajo").html(responseText);
                    });
                }else{
                    $("#area_reporte").next().html("Campo vacío, seleccione una opción");
                }

                

            break;

            case "cargo":
                    
                var cargo = $("#cargo_reporte").val();

                if (cargo.length !== 0) {
                    $("#cargo_reporte").next().html("");
                    $.post('../../controller/listas reportes/ListasUsuarios.php',{
                        cargo: cargo,
                        seleccionado: "cargo",
                        opc: "opc_trabajo"
                    },function (responseText){
                        $("#lista-opcion-trabajo").html(responseText);
                    });
                }else{
                    $("#cargo_reporte").next().html("Campo vacío, seleccione una opción");
                }
                

            break;
        
            default:
                break;
        }

        }else{
            alert("Seleccione una opción, por favor");
        }


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
                    <input class="form-control fecha_nacimiento" type="date" id="fecha_nacimiento_hijo` + contH +  `" placeholder="Escolaridad">
                    <small class="text-danger"></small>
                    
                </div>
                
            </div>
        </div>
    `;
        
        $("#cont-hijos").append(cont_hijo);

        

        console.log("Contador de hijos: " + contH);

        contH++;

        if (contH > 0) {
           // $("#opc-familiar").append("<div class='col-4'><button type='button' class='btn btn-verde' id='remover-familiar'>Remover familiar</button></div>");
            $(".cont-remover-hijo").removeClass("d-none").addClass("d-block");
        }

        $(".fecha_nacimiento").on('change', acciones.calcularEdadesHijos);
        
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

    // --------------------- Verifica y envía los formularios ---------------------

    // Tipon de dotación

    enviarFormTipoDotacion : function(){

        var nombre = $("#nombre-tipo-dotacion").val();

        if (nombre.length != 0) {
            $("#nombre-tipo-dotacion").next().html("");

            $.post('../../controller/tipo_dotacion/RegistrarTipoDotacion.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-tipo-dotacion").html(responseText);
            });
        }else{
            $("#nombre-tipo-dotacion").next().html("Campo vacío, por favor ingrese el tipo de dotacion");
        }

    },

    // Pension

    enviarFormPension : function() {
        
        var nombre = $("#nombre-pension").val();

        if (nombre.length != 0) {
            $("#nombre-pension").next().html("");

            $.post('../../controller/pension/RegistrarPension.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-pension").html(responseText);
            });
        }else{
            $("#nombre-pension").next().html("Campo vacío, por favor ingrese la pensión");
        }

    },

    // Nivel academico 

    enviarFormNivelAcademico : function() {

        var nombre = $("#nombre-nivel-academico").val();

        if (nombre.length != 0) {
            $("#nombre-nivel-academico").next().html("");

            $.post('../../controller/nivel_academico/RegistrarNivelAcademico.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-nivel-academico").html(responseText);
            });
        }else{
            $("#nombre-nivel-academico").next().html("Campo vacío, por favor ingrese el nivel academico");
        }

    },

    // Eps

    enviarFormEps : function () {
        var nombre = $("#nombre-eps").val();

        if (nombre.length != 0) {
            $("#nombre-eps").next().html("");

            $.post('../../controller/eps/RegistrarEps.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-eps").html(responseText);
            });
        }else{
            $("#nombre-eps").next().html("Campo vacío, por favor ingrese la EPS");
        }
    },

    // Sucursal 

    enviarFormSucursal : function() {

        var nombre = $("#nombre-sucursal").val();

        if (nombre.length != 0) {
            $("#nombre-sucursal").next().html("");

            $.post('../../controller/sucursal/RegistrarSucursal.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-sucursal").html(responseText);
            });
        }else{
            $("#nombre-sucursal").next().html("Campo vacío, por favor ingrese la sucursal");
        }
    },

    // Cargo 

    enviarFormCargo : function () {
        
        var nombre = $("#nombre-cargo").val();
        var id_seccion = $("#seccion-cargo").val();
        var id_area = $("#area-cargo").val();

        var validar = 0;

        if (nombre.length !== 0) {
            $("#nombre-cargo").next().html("");
            validar++;
            
        }else{
            $("#nombre-cargo").next().html("Campo vacío, por favor ingrese el cargo");
        }

        if (id_seccion.length !== 0) {
            $("#seccion-cargo").next().html("");
            validar++;
            
        }else{
            $("#seccion-cargo").next().html("Campo vacío, por favor seleccione una sección");
        }

        if (id_area.length !== 0) {
            $("#area-cargo").next().html("");
            validar++;
            
        }else{
            $("#area-cargo").next().html("Campo vacío, por favor seleccione un area");
        }

        if (validar === 3) {
            $.post('../../controller/cargo/RegistrarCargo.php',{
                nombre: nombre,
                id_seccion: id_seccion,
                id_area: id_area
            },function(responseText){
                $("#rta-cargo").html(responseText);
            });
        }


    },

    // Area
    enviarFormArea : function () {
        
        var nombre = $("#nombre-area").val();

        if (nombre.length != 0) {
            $("#nombre-area").next().html("");

            $.post('../../controller/area/RegistrarArea.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-area").html(responseText);
            });
        }else{
            $("#nombre-area").next().html("Campo vacío, por favor ingrese el area");
        }
    },

    // Sección


    enviarFormSeccion : function() {

        var nombre = $("#nombre-seccion").val();

        if (nombre.length != 0) {
            $("#nombre-seccion").next().html("");

            $.post('../../controller/seccion/RegistrarSeccion.php',{
                nombre: nombre
            },function(responseText){
                $("#rta-seccion").html(responseText);
            })
        }else{
            $("#nombre-seccion").next().html("Campo vacío, por favor ingrese la sección");
        }

    },

    // --------- Verifica y envía el formulario de estado civil -----


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

    // --------- Verifica y envía el formulario de genero -----

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

    // --------- Verifica y envía el formulario de tipo de documento -----
     
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

    // --------- Verifica y envía el formulario de tipo de contrato -----

    enviarFormTipoContrato : function () {

        var nombre = $("#nombre-tipo-contrato").val();


        if (nombre.length != 0) {
            $("#nombre-tipo-contrato").next().html("");

            $.post('../../controller/tipo contrato/RegistrarTipoContrato.php',{
                nombre:nombre
            },function(responseText){
                $("#rta-tipo-contrato").html(responseText);
                setTimeout("location.reload()", 1800);
            });
                
        }else{
            $("#nombre-tipo-contrato").next().html("Campo vacío, por favor ingrese el tipo de contrato");
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
            //var foto = document.getElementById("foto").files[0];


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

           

    
           
                
                /* $.post('../../controller/usuario/RegistrarUsuario.php', {
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
                    foto: foto,
                    
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
                }); */


                $.post('../../controller/correo/VerificarCorreoBD.php',{
                    correo: correo
                },function(responseText){
                    $("#correo").next().html(responseText);
                });


                /* var formData = new FormData();
                var files = $("#foto")[0].files[0];
                formData.append('file', files); */

                if (validar === 27) {
                    $.ajax({
                        method : "POST",
                        url : "../../controller/usuario/RegistrarUsuario.php",
                        data : {
                            "id_usuario" : id_usuario,
                            "tipo_documento": tipo_documento,
                            "fecha_expedicion": fecha_expedicion,
                            "lugar_expedicion": lugar_expedicion,
                            "nombre": nombre,
                            "apellido":apellido,
                            "telefono_fijo": telefono_fijo,
                            "telefono_movil": telefono_movil,
                            "tipo_casa": tipo_casa,
                            "genero": genero,
                           " fecha_nacimiento": fecha_nacimiento,
                            "edad": edad,
                           "direccion": direccion,
                            "lugar_residencia": lugar_residencia,
                            "nivel_academico": nivel_academico,
                            "area_academica": area_academica,
                            "estado_civil": estado_civil,
                            "eps": eps,
                            "nro_cuenta": nro_cuenta,
                            "tipo_sangre": tipo_sangre,
                            "antecedentes": antecedentes,
                            "practica_deporte": practica_deporte,
                            "consumo_cigarros": consumo_cigarros,
                            "consumo_licor": consumo_licor,
                           "consumo_spa": consumo_spa,
                            "correo":correo,
                            "password":password,
                            "nombre_persona_emergencia": nombre_persona_emergencia,
                            "telefono_emergencia": telefono_emergencia,
                            "celular_emergencia": celular_emergencia,
                            "parentesco_emergencia": parentesco_emergencia,
                            
                            
                            "sucursal": sucursal,
                            "tipo_contrato": tipo_contrato,
                            "fecha_ingreso": fecha_ingreso,
                            "fecha_retiro": fecha_retiro,
                            "motivo_retiro": motivo_retiro,
                            "salario": salario,
                            "valor_dia": valor_dia,
                            "valor_hora": valor_hora,
                            "clase_riesgo": clase_riesgo,
                            "porcentaje_riesgo": porcentaje_riesgo,
                            "area": area,
                            "seccion": seccion,
                            "cargo": cargo,
                           "pension": pension,
                            "estado": estado,
                            "perfil": perfil,
                            
    
                            "id_familiar": id_familiar,
                            "nombre_familiar": nombre_familiar,
                            "apellido_familiar": apellido_familiar,
                            "edad_familiar": edad_familiar,
                            "escolaridad_familiar": escolaridad_familiar,
                            "parentesco_familiar": parentesco_familiar,
    
                            "nombre_hijo": nombre_hijo,
                            "apellido_hijo": apellido_hijo,
                            "edad_hijo": edad_hijo,
                            "fecha_nacimiento_hijo": fecha_nacimiento_hijo
                        },
                       // contentType: "multipart/form-data",
                        
                    }).done(function (data) {
    
                        $("#rta-registro-empleado").html(data);
                
                    }).fail(function (error) {
                        $("#rta-registro-empleado").css({"color" : "red"}).html(error.responseText);
                    });
                                                                
               
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

        if (btn !== "menu-desplegable-listas") {

            if ($("#menu-desplegado").hasClass("desplegar")) {
                $("#menu-desplegado").removeClass("desplegar");
            }
        }
        
        switch (btn) {

            // ------------- Editar un registro -----------

            

            // Tipo de dotación

            case "btn-editar-tipo-dotacion":
                $.post('../../controller/tipo_dotacion/EditarTipoDotacion.php',{
                    id:id
                },function(responseText) {
                    $("#editar-tipo-dotacion").html(responseText);
                });
            break;

            // Pensión

            case "btn-editar-pension":
                $.post('../../controller/pension/EditarPension.php',{
                    id:id
                },function(responseText) {
                    $("#editar-pension").html(responseText);
                });
            break;

            // Nivel academico

            case "btn-editar-nivel-academico":
                $.post('../../controller/nivel_academico/EditarNivelAcademico.php',{
                    id:id
                },function(responseText) {
                    $("#editar-nivel-academico").html(responseText);
                });
            break;

            // Eps

            case "btn-editar-eps":
                $.post('../../controller/eps/EditarEps.php',{
                    id:id
                },function(responseText) {
                    $("#editar-eps").html(responseText);
                });
            break;

            // Sucursal

            case "btn-editar-sucursal":
                $.post('../../controller/sucursal/EditarSucursal.php',{
                    id:id
                },function(responseText) {
                    $("#editar-sucursal").html(responseText);
                });
            break;


            // Cargo 

            case "btn-editar-cargo":
                $.post('../../controller/cargo/EditarCargo.php',{
                    id:id
                },function(responseText) {
                    $("#editar-cargo").html(responseText);
                });
            break;

            //Area 

            case "btn-editar-area":
                $.post('../../controller/area/EditarArea.php',{
                    id:id
                },function(responseText) {
                    $("#editar-area").html(responseText);
                });
            break;

            // Sección

            case "btn-editar-seccion":
                $.post('../../controller/seccion/EditarSeccion.php',{
                    id:id
                },function(responseText) {
                    $("#editar-seccion").html(responseText);
                });
            break;

            // Tipo de contrato
            
            case "btn-editar-tipo-contrato":

                $.post('../../controller/tipo contrato/EditarTipoContrato.php',{
                    id:id
                },function(responseText) {
                    $("#editar-tipo-contrato").html(responseText);
                });

            break;

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

            // Datos familiares

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

            case "btn-actualizar-tipo-dotacion":
                
                var id_tipo_dotacion = $("#id-tipo-notacion-act").val();
                var nombre = $("#nombre-tipo-dotacion-act").val();
                var validar = 0;

                if (nombre.length !== 0) {
                    $("#nombre-tipo-dotacion-act").next().html("");
                    validar++;
                }else{
                    $("#nombre-tipo-dotacion-act").next().html("Campo vacío, por favor ingrese el tipo de dotación");
                }

                if (id_tipo_dotacion.length !== 0) {
                    $("#id-tipo-dotacion-act").next().html("");
                    validar++;
                }else{
                    $("#id-tipo-dotacion-act").next().html("Campo vacío, por favor ingrese el código");
                }

                if (validar === 2) {

                    $.post('../../controller/tipo_dotacion/ActualizarTipoDotacion.php',{
                        id_tipo_dotacion: id_tipo_dotacion,
                        nombre: nombre
                    },function(responseText){
                        $("#rta-tipo-dotacion-act").html(responseText);
                    });    
                    
                }

                
            break;

            case "btn-actualizar-pension":

                var id_pension = $("#id-pension-act").val();
                var nombre = $("#nombre-pension-act").val();
                var validar = 0;

                if (id_pension.length != 0) {
                    $("#id-pension-act").next().html("");
                    validar++;
                    
                }else{
                    $("#id-pension-act").next().html("Campo vacío, por favor ingrese el código");
                }

                if (nombre.length != 0) {
                    $("#nombre-pension-act").next().html("");
                    validar++;
                    
                }else{
                    $("#nombre-pension-act").next().html("Campo vacío, por favor ingrese la pensión");
                }

                

                if (validar === 2) {

                    $.post('../../controller/pension/ActualizarPension.php',{
                        id_pension: id_pension,
                        nombre: nombre
                    },function(responseText){
                        $("#rta-pension-act").html(responseText);
                    });

                }

                

            break;

            case "btn-actualizar-nivel-academico":


                var id_nivel_academico = $("#id-nivel-academico-act").val();
                var nombre = $("#nombre-nivel-academico-act").val();
                var validar = 0;

                if (nombre.length != 0) {
                    $("#nombre-nivel-academico-act").next().html("");
                    validar++;
                    
                }else{
                    $("#nombre-nivel-academico-act").next().html("Campo vacío, por favor ingrese el nombre");
                }

                if (id_nivel_academico.length != 0) {
                    $("#id-nivel-academico-act").next().html("");
                    validar++;
                    
                }else{
                    $("#id-nivel-academico-act").next().html("Campo vacío, por favor ingrese el código");
                }

                 if (validar === 2) {

                    $.post('../../controller/nivel_academico/ActualizarNivelAcademico.php',{
                        id_nivel_academico: id_nivel_academico,
                        nombre: nombre
                    },function(responseText){
                        $("#rta-nivel-academico-act").html(responseText);
                    });

                 }


            break;

            case "btn-actualizar-eps":
                
                var  id_eps = $("#id-eps-act").val();
                var nombre = $("#nombre-eps-act").val();

                if (nombre.length != 0) {
                    $("#nombre-eps-act").next().html("");

                    $.post('../../controller/eps/ActualizarEps.php',{
                        id_eps: id_eps,
                        nombre:nombre
                    },function(responseText){
                        $("#rta-eps-act").html(responseText);
                        setTimeout("location.reload()", 1800);
                    });
                        
                }else{
                    $("#nombre-eps-act").next().html("Campo vacío, por favor ingrese la EPS");
                }

            break;


            case "btn-actualizar-sucursal":
                
                var  id_sucursal = $("#id-sucursal-act").val();
                var nombre = $("#nombre-sucursal-act").val();

                if (nombre.length != 0) {
                    $("#nombre-sucursal-act").next().html("");

                    $.post('../../controller/sucursal/ActualizarSucursal.php',{
                        id_sucursal: id_sucursal,
                        nombre:nombre
                    },function(responseText){
                        $("#rta-sucursal-act").html(responseText);
                        setTimeout("location.reload()", 1800);
                    });
                        
                }else{
                    $("#nombre-sucursal-act").next().html("Campo vacío, por favor ingrese la sucursal");
                }

            break;

            case "btn-actualizar-cargo":

                var id_cargo = $("#id-cargo-act").val();
                var nombre = $("#nombre-cargo-act").val();
                var id_seccion = $("#seccion-cargo-act").val();
                var id_area = $("#area-cargo-act").val();

                var validar = 0;

                if (id_cargo.length !== 0) {
                    $("#id-cargo-act").next().html("");
                    validar++;
                    
                }else{
                    $("#nombre-cargo").next().html("Campo vacío, por favor ingrese el código");
                }

                if (nombre.length !== 0) {
                    $("#nombre-cargo-act").next().html("");
                    validar++;
                    
                }else{
                    $("#nombre-cargo-act").next().html("Campo vacío, por favor ingrese el cargo");
                }

                if (id_seccion.length !== 0) {
                    $("#seccion-cargo-act").next().html("");
                    validar++;
                    
                }else{
                    $("#seccion-cargo-act").next().html("Campo vacío, por favor seleccione una sección");
                }

                if (id_area.length !== 0) {
                    $("#area-cargo-act").next().html("");
                    validar++;
                    
                }else{
                    $("#area-cargo-act").next().html("Campo vacío, por favor seleccione un area");
                }

                if (validar === 4) {
                    $.post('../../controller/cargo/ActualizarCargo.php',{
                        id_cargo: id_cargo,
                        nombre: nombre,
                        id_seccion: id_seccion,
                        id_area: id_area
                    },function(responseText){
                        $("#rta-cargo-act").html(responseText);
                    });
                }     

            break;

            case "btn-actualizar-area":

                var id_area = $("#id-area-act").val();
                var nombre = $("#nombre-area-act").val();

                var validar = 0;

                if (id_area.length != 0) {
                    $("#id-area-act").next().html("");
                    validar++;
                }else{
                    $("#id-area-act").next().html("Campo vacío, por favor el código del area");
                }

                if (nombre.length != 0) {
                    $("#nombre-area-act").next().html("");
                    validar++;
                    
                }else{
                    $("#nombre-area-act").next().html("Campo vacío, por favor ingrese el area");
                }

                if (validar === 2) {
                    $.post('../../controller/area/ActualizarArea.php',{
                        id_area: id_area,
                        nombre: nombre
                    },function(responseText){
                        $("#rta-area-act").html(responseText);
                    })
                }          

            break;

            case "btn-actualizar-seccion":

                var id_seccion = $("#id-seccion-act").val();
                var nombre = $("#nombre-seccion-act").val();

                var validar = 0;

                if (id_seccion.length != 0) {
                    $("#id-seccion-act").next().html("");
                    validar++;
                }else{
                    $("#id-seccion-act").next().html("Campo vacío, por favor el código de la sección");
                }

                if (nombre.length != 0) {
                    $("#nombre-seccion-act").next().html("");
                    validar++;
                    
                }else{
                    $("#nombre-seccion-act").next().html("Campo vacío, por favor ingrese la sección");
                }

                if (validar === 2) {
                    $.post('../../controller/seccion/ActualizarSeccion.php',{
                        id_seccion: id_seccion,
                        nombre: nombre
                    },function(responseText){
                        $("#rta-seccion-act").html(responseText);
                    })
                }          

            break;

            case "btn-actualizar-tipo-contrato":
                
                var  id_tipo_contrato = $("#id-tipo-contrato-act").val();
                var nombre = $("#tipo-contrato-act").val();

                if (nombre.length != 0) {
                    $("#nombre-tipo-contrato-act").next().html("");

                    $.post('../../controller/tipo contrato/ActualizarTipoContrato.php',{
                        id_tipo_contrato: id_tipo_contrato,
                        nombre:nombre
                    },function(responseText){
                        $("#rta-tipo-contrato-act").html(responseText);
                        setTimeout("location.reload()", 1800);
                    });
                        
                }else{
                    $("#nombre-tipo-contrato-act").next().html("Campo vacío, por favor ingrese el tipo de contrato");
                }

            break;

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