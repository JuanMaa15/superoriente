<?php

require_once '../../models/DAO/UsuarioDAO.php';

if (isset($_POST['dato']) && isset($_POST['lista'])) {

    $dato = $_POST['dato'];
    $lista = $_POST['lista'];
    $validar_existencias = false;
    $campos = array();
    $cant_caracteres = "";

    $usuariodao = new UsuarioDAO();
    $revisar = "";

    $listaUsuarios;
    $tipo_documento = "";
    $tipo_vivienda = "";
    $estrato = "";
    $genero = "";
    $lugar_residencia = "";
    $estado_civil = "";
    $nivel_academico = "";
    $eps = "";
    $tipo_sangre_rh = "";
    $sucursal = "";
    $tipo_contrato = "";
    $cesantia = "";
    $clase_riesgo = "";
    $seccion = "";
    $area = "";
    $cargo = "";
    $pension = "";
    $tipo_dotacion = "";
    $estado = "";
    for ($i=0; $i < count($lista); $i++) { 

        //$dato[$i] = intval($dato[$i]);
        if (str_contains($lista[$i], "tbl_")) {
            $cant_caracteres = strlen($lista[$i]);
            $campos[$i] = substr($lista[$i], 4, $cant_caracteres);
        }else{
            $campos[$i] = $lista[$i];
        }
        

        switch ($lista[$i]) {
            case 'tbl_tipo_documento':
                $tipo_documento = "AND tu.id_tipo_documento = " . $dato[$i];
                
            break;
            case 'tbl_casa':
                $tipo_vivienda = "AND tu.id_casa = " . $dato[$i];
            break;
            case 'estrato':
                $estrato = "AND tu.estrato = " . $dato[$i];
            break;
            case 'tbl_genero':
                $genero = "AND tu.id_genero = " . $dato[$i];
            break;
            case 'tbl_lugar_residencia':
                $lugar_residencia = "AND tu.id_lugar_residencia = " . $dato[$i];
            break;
            case 'tbl_nivel_academico':
                $nivel_academico = "AND tu.id_nivel_academico = " . $dato[$i];
            break;
            case 'tbl_estado_civil':
                $estado_civil = "AND tu.id_estado_civil = " . $dato[$i];
            break;
            case 'tbl_eps':
                $eps = "AND tu.id_eps = " . $dato[$i];
            break;
            case 'tbl_tipo_sangre_rh':
                $tipo_sangre_rh = "AND tu.id_tipo_sangre_rh = " . $dato[$i];
            break;
            case 'tbl_sucursal':
                $sucursal = "AND tu.id_sucursal = " . $dato[$i];
            break;
            case 'tbl_tipo_contrato':
                $tipo_contrato = "AND tu.id_tipo_contrato = " . $dato[$i];
            break;
            case 'tbl_cesantia':
                $cesantia = "AND tu.id_cesantia = " . $dato[$i];
            break;
            case 'tbl_clase_riesgo':
                $clase_riesgo = "AND tu.id_clase_riesgo = " . $dato[$i];
            break;
            case 'tbl_seccion':
                $seccion = "AND tu.id_seccion = " . $dato[$i];
            break;
            case 'tbl_area':
                $area = "AND tu.id_area = " . $dato[$i];
            break;
            case 'tbl_cargo':
                $cargo = "AND tu.id_cargo = " . $dato[$i];
            break;
            case 'tbl_pension':
                $pension = "AND tu.id_pension = " . $dato[$i];
            break;
            case 'tbl_tipo_dotacion':
                $tipo_dotacion = "AND tu.id_tipo_dotacion = " . $dato[$i];
            break;
            case 'tbl_estado':
                $estado = "AND tu.id_estado = " . $dato[$i];
            break;
            
        }
    }

    $listaUsuarios = $usuariodao->listaUsuarioFiltros($tipo_documento, $tipo_vivienda, $estrato, $genero, $lugar_residencia, $nivel_academico, $estado_civil, $eps, $tipo_sangre_rh, $sucursal, $tipo_contrato, $cesantia, $clase_riesgo, $seccion, $area, $cargo, $pension, $tipo_dotacion, $estado); 

    $lista =  "<table class='table table-striped'>"
    ."<thead>"
    ."<tr class='text-center'>"
        ."<th scope='col'>Doc</th>"
        ."<th scope='col'>Nombre</th>"
        ."<th scope='col'>Apellido</th>"
        ."<th scope='col'>Cargo</th>"
        ."<th scope='col'>Sucursal</th>"
        ."<th scope='col'>Tipo de contrato</th>"
        ."<th scope='col'>Dotación</th>"
        ."<th scope='col'>Género</th>"
        
    ."</tr>"
    ."</thead>"
    ."<tbody>"; 

    for ($i=0; $i < count($listaUsuarios); $i++) { 
        $lista .= "<tr>"
        ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getCargo() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getSucursal() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getTipo_contrato() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getTipo_dotacion() . "</td>"
        ."<td>" . $listaUsuarios[$i]->getGenero() . "</td>"
        . "</tr>";

        $validar_existencias = true;
    }

    $btnReporte = "";

    if (!$validar_existencias) {
        $lista .= "<td colspan='8' class='text-center'>No hay empleados con esos filtros</td>";
    }else{
        $btnReporte = "<form action='../../controller/reportes/ReporteFiltrosUsuario.php' method='post'>";

        for ($i=0; $i < count($campos); $i++) { 
            $btnReporte .= "<input type='text' name='" . $campos[$i]. "' value='" . $dato[$i] . "' class='d-none'>";
        }

        $btnReporte .= "<button class='btn btn-verde' name='btn-reporte-empleados-filtros'>Generar reporte</button>"
        ."</form>";
    }

    $lista .= "</tbody>"
    . "</table>"
    . $btnReporte;

    echo $lista;

}