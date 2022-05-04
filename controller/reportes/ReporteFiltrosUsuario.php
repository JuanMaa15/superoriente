<?php

require_once '../../models/DAO/UsuarioDAO.php';

if (isset($_POST['btn-reporte-empleados-filtros'])) {

    $usuariodao = new UsuarioDAO();

    $listaUsuarios;

    $tipo_documento = isset($_POST['tipo_documento']) ? "AND tu.id_tipo_documento" . $_POST['tipo_documento'] : "";
    $tipo_vivienda = isset($_POST['casa']) ? "AND tu.id_casa = " . $_POST['casa'] : "";
    $estrato = isset($_POST['estrato']) ? "AND tu.estrato = " . $_POST['estrato'] : "";
    $genero = isset($_POST['genero']) ? "AND tu.id_genero = " . $_POST['genero'] : "";;
    $lugar_residencia = isset($_POST['lugar_residencia']) ? "AND tu.id_lugar_residencia = " . $_POST['lugar_residencia'] : "";;
    $estado_civil = isset($_POST['tipo_documento']) ? "AND tu.id_nivel_academico = " . $_POST['tipo_documento'] : "";;
    $nivel_academico = isset($_POST['estado_civil']) ? "AND tu.id_estado_civil = " . $_POST['estado_civil'] : "";;
    $eps = isset($_POST['eps']) ? "AND tu.id_eps = " . $_POST['eps'] : "";
    $tipo_sangre_rh = isset($_POST['tbl_tipo_sangre_rh']) ? "AND tu.id_tipo_sangre_rh = " . $_POST['tbl_tipo_sangre_rh'] : "";
    $sucursal = isset($_POST['sucursal']) ? "AND tu.id_sucursal = " . $_POST['sucursal'] : "";
    $tipo_contrato = isset($_POST['tipo_contrato']) ? "AND tu.id_tipo_contrato = " . $_POST['tipo_contrato'] : "";
    $cesantia = isset($_POST['cesantia']) ? "AND tu.id_cesantia = " . $_POST['cesantia'] : "";
    $clase_riesgo = isset($_POST['clase_riesgo']) ? "AND tu.id_clase_riesgo = " . $_POST['clase_riesgo'] : "";
    $seccion = isset($_POST['seccion']) ? "AND tu.id_seccion = " . $_POST['seccion'] : "";
    $area = isset($_POST['area']) ? "AND tu.id_area = " . $_POST['area'] : "";
    $cargo = isset($_POST['cargo']) ? "AND tu.id_cargo = " . $_POST['cargo'] : "";
    $pension = isset($_POST['pension']) ? "AND tu.id_pension = " . $_POST['pension'] : "";
    $tipo_dotacion = isset($_POST['tipo_dotacion']) ? "AND tu.id_tipo_dotacion = " . $_POST['tipo_dotacion'] : "";
    $estado = isset($_POST['estado']) ? "AND tu.id_estado = " . $_POST['estado'] : "";
    $hijos = isset($_POST['hijo']) ? intval($_POST['hijo']) : "";
    $salario1 = isset($_POST['salario1']) ? $_POST['salario1'] : "";
    $salario2 = isset($_POST['salario2']) ? $_POST['salario2'] : "";
    $fecha1 = isset($_POST['fecha1']) ? $_POST['fecha1'] : "";
    $fecha2 = isset($_POST['fecha2']) ? $_POST['fecha2'] : "";
    $salarioF = "";
    $fechaF = "";
    if ($salario1 != "" && $salario2 != "") {
        $salarioF = "AND salario BETWEEN " . $salario1 . " AND " . $salario2;
    }

    if ($fecha1 != "" && $fecha2 != "") {
        $fechaF = "AND fecha_ingreso BETWEEN '" . $fecha1 . "' AND '" . $fecha2. "'";
    }
    
     

    $listaUsuarios = $usuariodao->listaUsuarioFiltros($tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado, $salarioF, $fechaF); 

    $listaUsuariosHijos = [];

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        
        $listaUsuariosHijos[$i] = $usuariodao->listaUsuarioFiltroHijos($listaUsuarios[$i]->getId_usuario(), $tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado, $salarioF, $fechaF); 

    }
    // NOMBRE DEL ARCHIVO Y CHARSET


    header('Content-Type:text/cvs; charset=utf-8');
    header('Content-Disposition: attachment; filename="Reporte_filtros_usuario.csv"');


    // Salida del archivo
    $salida = fopen('php://output', 'w');

    if ($hijos != "") {
        for ($i=0; $i < count($listaUsuarios); $i++) { 
            if ($listaUsuariosHijos[$i]->getHijos() == $hijos) {

                fputcsv($salida, array('NRO DOCUMENTO', 'TIPO DE DOCUMENTO', 'FECHA DE EXPEDICION', 'LUGAR DE EXPEDICION', 'NOMBRE', 'APELLIDO', 'TELEFONO FIJO', 'TELEFONO MOVIL', 'CASA', 'ESTRATO', 'GENERO','FECHA NACIMIENTO','FECHA ACTUAL','ANTIGUEDAD','EDAD','DIRECCION','LUGAR DE RESIDENCIA','NIVEL ACADEMICO','AREA ACADEMICA','ESTADO CIVIL','EPS','NRO CUENTA', 'TIPO DE SANGRE Y RH','ANTECEDENTES','PRACTICA DEPORTE','CONSUMO CIGARROS','CONSUMO DE LICOR','CONSUMO SPA','CORREO','CONTRASEÑA','PERFIL','PERSONA DE EMERGENCIA','TELEFONO EMERGENCIA','CELULAR EMERGENCIA','PARENTESCO EMERGENCIA','SUCURSAL','TIPO DE CONTRATO','FECHA DE INGRESO', 'FECHA DE RETIRO','MOTIVO DE RETIRO', 'CESANTIA', 'SALARIO','VALOR DIA','VALOR HORA','CLASE DE RIESGO','SECCION','AREA','CARGO','PENSION','TIPO DE DOTACION','CAMISA','PANTALON','ZAPATO','OTROS','ESTADO', 'HIJOS'));
        for ($i=0; $i < count($listaUsuarios); $i++) { 
            fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                    $listaUsuarios[$i]->getTipo_documento(),
                    $listaUsuarios[$i]->getFecha_expedicion(),
                    $listaUsuarios[$i]->getLugar_expedicion(),        
                    $listaUsuarios[$i]->getNombre(),
                    $listaUsuarios[$i]->getApellido(),
                    $listaUsuarios[$i]->getTelefono_fijo(),
                    $listaUsuarios[$i]->getTelefono_movil(),
                    $listaUsuarios[$i]->getTipo_casa(),
                    $listaUsuarios[$i]->getEstrato(),
                    $listaUsuarios[$i]->getGenero(),
                    $listaUsuarios[$i]->getFecha_nacimiento(),
                    $listaUsuarios[$i]->getFecha_actual(),
                    $listaUsuarios[$i]->getAntiguedad(),
                    $listaUsuarios[$i]->getEdad(),
                    $listaUsuarios[$i]->getDireccion(),
                    $listaUsuarios[$i]->getLugar_residencia(),
                    $listaUsuarios[$i]->getNivel_academico(),
                    $listaUsuarios[$i]->getArea_academica(),
                    $listaUsuarios[$i]->getEstado_civil(),
                    $listaUsuarios[$i]->getEps(),
                    $listaUsuarios[$i]->getNro_cuenta(),
                    $listaUsuarios[$i]->getTipo_sangre(),
                    $listaUsuarios[$i]->getAntecedentes(),
                    $listaUsuarios[$i]->getPractica_deporte(),
                    $listaUsuarios[$i]->getConsumo_cigarros(),
                    $listaUsuarios[$i]->getConsumo_licor(),
                    $listaUsuarios[$i]->getConsumo_spa(),
                    $listaUsuarios[$i]->getCorreo(),
                    $listaUsuarios[$i]->getPassword(),
                    $listaUsuarios[$i]->getPerfil(),
                    $listaUsuarios[$i]->getNombre_persona_emergencia(),
                    $listaUsuarios[$i]->getTelefono_emergencia(),
                    $listaUsuarios[$i]->getCelular_emergencia(),
                    $listaUsuarios[$i]->getParentesco_emergencia(),


                    $listaUsuarios[$i]->getSucursal(),
                    $listaUsuarios[$i]->getTipo_contrato(),
                    $listaUsuarios[$i]->getFecha_ingreso(),
                    $listaUsuarios[$i]->getFecha_retiro(),
                    $listaUsuarios[$i]->getMotivo_retiro(),
                    $listaUsuarios[$i]->getCesantia(),
                    $listaUsuarios[$i]->getSalario(),
                    $listaUsuarios[$i]->getValor_dia(),
                    $listaUsuarios[$i]->getValor_hora(),
                    $listaUsuarios[$i]->getClase_riesgo(),
                    $listaUsuarios[$i]->getArea(),
                    $listaUsuarios[$i]->getSeccion(),
                    $listaUsuarios[$i]->getCargo(),
                    $listaUsuarios[$i]->getPension(),
                    $listaUsuarios[$i]->getTipo_dotacion(),
                    $listaUsuarios[$i]->getCamisa(),
                    $listaUsuarios[$i]->getPantalon(),
                    $listaUsuarios[$i]->getZapato(),
                    $listaUsuarios[$i]->getVestimenta(),
                    $listaUsuarios[$i]->getEstado(),
                    $listaUsuariosHijos[$i]->getHijos())
                    );
        };

            }
        }
    }else{
        fputcsv($salida, array('NRO DOCUMENTO', 'TIPO DE DOCUMENTO', 'FECHA DE EXPEDICION', 'LUGAR DE EXPEDICION', 'NOMBRE', 'APELLIDO', 'TELEFONO FIJO', 'TELEFONO MOVIL', 'CASA', 'ESTRATO', 'GENERO','FECHA NACIMIENTO','FECHA ACTUAL','ANTIGUEDAD','EDAD','DIRECCION','LUGAR DE RESIDENCIA','NIVEL ACADEMICO','AREA ACADEMICA','ESTADO CIVIL','EPS','NRO CUENTA', 'TIPO DE SANGRE Y RH','ANTECEDENTES','PRACTICA DEPORTE','CONSUMO CIGARROS','CONSUMO DE LICOR','CONSUMO SPA','CORREO','CONTRASEÑA','PERFIL','PERSONA DE EMERGENCIA','TELEFONO EMERGENCIA','CELULAR EMERGENCIA','PARENTESCO EMERGENCIA','SUCURSAL','TIPO DE CONTRATO','FECHA DE INGRESO', 'FECHA DE RETIRO','MOTIVO DE RETIRO', 'CESANTIA', 'SALARIO','VALOR DIA','VALOR HORA','CLASE DE RIESGO','SECCION','AREA','CARGO','PENSION','TIPO DE DOTACION','CAMISA','PANTALON','ZAPATO','OTROS','ESTADO'));
        for ($i=0; $i < count($listaUsuarios); $i++) { 
            fputcsv($salida, array($listaUsuarios[$i]->getId_usuario(),
                    $listaUsuarios[$i]->getTipo_documento(),
                    $listaUsuarios[$i]->getFecha_expedicion(),
                    $listaUsuarios[$i]->getLugar_expedicion(),        
                    $listaUsuarios[$i]->getNombre(),
                    $listaUsuarios[$i]->getApellido(),
                    $listaUsuarios[$i]->getTelefono_fijo(),
                    $listaUsuarios[$i]->getTelefono_movil(),
                    $listaUsuarios[$i]->getTipo_casa(),
                    $listaUsuarios[$i]->getEstrato(),
                    $listaUsuarios[$i]->getGenero(),
                    $listaUsuarios[$i]->getFecha_nacimiento(),
                    $listaUsuarios[$i]->getFecha_actual(),
                    $listaUsuarios[$i]->getAntiguedad(),
                    $listaUsuarios[$i]->getEdad(),
                    $listaUsuarios[$i]->getDireccion(),
                    $listaUsuarios[$i]->getLugar_residencia(),
                    $listaUsuarios[$i]->getNivel_academico(),
                    $listaUsuarios[$i]->getArea_academica(),
                    $listaUsuarios[$i]->getEstado_civil(),
                    $listaUsuarios[$i]->getEps(),
                    $listaUsuarios[$i]->getNro_cuenta(),
                    $listaUsuarios[$i]->getTipo_sangre(),
                    $listaUsuarios[$i]->getAntecedentes(),
                    $listaUsuarios[$i]->getPractica_deporte(),
                    $listaUsuarios[$i]->getConsumo_cigarros(),
                    $listaUsuarios[$i]->getConsumo_licor(),
                    $listaUsuarios[$i]->getConsumo_spa(),
                    $listaUsuarios[$i]->getCorreo(),
                    $listaUsuarios[$i]->getPassword(),
                    $listaUsuarios[$i]->getPerfil(),
                    $listaUsuarios[$i]->getNombre_persona_emergencia(),
                    $listaUsuarios[$i]->getTelefono_emergencia(),
                    $listaUsuarios[$i]->getCelular_emergencia(),
                    $listaUsuarios[$i]->getParentesco_emergencia(),


                    $listaUsuarios[$i]->getSucursal(),
                    $listaUsuarios[$i]->getTipo_contrato(),
                    $listaUsuarios[$i]->getFecha_ingreso(),
                    $listaUsuarios[$i]->getFecha_retiro(),
                    $listaUsuarios[$i]->getMotivo_retiro(),
                    $listaUsuarios[$i]->getCesantia(),
                    $listaUsuarios[$i]->getSalario(),
                    $listaUsuarios[$i]->getValor_dia(),
                    $listaUsuarios[$i]->getValor_hora(),
                    $listaUsuarios[$i]->getClase_riesgo(),
                    $listaUsuarios[$i]->getArea(),
                    $listaUsuarios[$i]->getSeccion(),
                    $listaUsuarios[$i]->getCargo(),
                    $listaUsuarios[$i]->getPension(),
                    $listaUsuarios[$i]->getTipo_dotacion(),
                    $listaUsuarios[$i]->getCamisa(),
                    $listaUsuarios[$i]->getPantalon(),
                    $listaUsuarios[$i]->getZapato(),
                    $listaUsuarios[$i]->getVestimenta(),
                    $listaUsuarios[$i]->getEstado())
                    );
        };
    }

    

}

?>