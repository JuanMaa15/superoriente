<?php

require_once '../../models/DAO/UsuarioDAO.php';
require_once '../../models/DAO/TipoCamisaDAO.php';
require_once '../../models/DAO/TipoPantalonDAO.php';
require_once '../../models/DAO/TipoZapatoDAO.php';


if (isset($_POST)) {

    $dato = isset($_POST['dato']) ? $_POST['dato'] : null;
    $lista = $_POST['lista'];
    
    $tipoCamisadao = new TipoCamisaDAO();
    $listaTiposCamisas = $tipoCamisadao->listaTiposCamisas();
    $tipoPantalondao = new TipoPantalonDAO();
    $listaTiposPantalones = $tipoPantalondao->listaTiposPantalones();
    $tipoZapatodao = new TipoZapatoDAO();
    $listaTiposZapatos = $tipoZapatodao->listaTiposZapatos();
     

    $validar_existencias = false;
    $campos = array();
    $cant_caracteres = "";

    $usuariodao = new UsuarioDAO();
    $revisar = "";

    $listaUsuarios;


   
    $genero = "";
    $sucursal = "";
    $tipo_dotacion = "";
    $talla_camisa = "";
    $talla_pantalon = "";
    $talla_zapato = "";
    $tipo_camisa = "";
    $tipo_pantalon = "";
    $tipo_zapato = "";
    $camisa = "";
    $pantalon = "";
    $zapato = "";
    $tipo = "";
    $ropa = "";
  
    for ($i=0; $i < count($lista); $i++) { 

        //$dato[$i] = intval($dato[$i]);
        if (str_contains($lista[$i], "tbl_")) {
            $cant_caracteres = strlen($lista[$i]);
            $campos[$i] = substr($lista[$i], 4, $cant_caracteres);
        }else{
            $campos[$i] = $lista[$i];
        }
        
        
        switch ($lista[$i]) {
            
          
            case 'tbl_genero':
                $genero = "AND tu.id_genero = " . $dato[$i];
            break;       
            case 'tbl_sucursal':
                $sucursal = "AND tu.id_sucursal = " . $dato[$i];
            break;
            case 'tbl_tipo_dotacion':
                $tipo_dotacion = "AND tu.id_tipo_dotacion = " . $dato[$i];
            break;
            case 'talla_camisa':
                $talla_camisa = " AND tu.talla_camisa = '" . $dato[$i] . "'";
            break;
            case 'talla_pantalon':
                $talla_pantalon= "AND tu.talla_pantalon = '" . $dato[$i] . "'";
            break;
            case 'talla_zapato':
                $talla_zapato = "AND tu.talla_zapato = '" . $dato[$i] . "'";
            break;
            /* case 'talla_camisa':
                $talla_camisa = "AND tcma.talla = '" . $dato[$i] . "'";
            break;
            case 'talla_pantalon':
                $talla_pantalon= "AND tpn.talla = '" . $dato[$i] . "'";
            break;
            case 'talla_zapato':
                $talla_zapato = "AND tzo.talla = '" . $dato[$i] . "'";
            break; */
            case 'tbl_tipo_camisa':

                for ($j=0; $j < count($listaTiposCamisas); $j++) { 
                    if ($listaTiposCamisas[$j]->getId_tipo_camisa() == intval($dato[$i])) {
                        $tipo = $listaTiposCamisas[$j]->getNombre();
                    }   
                }
                $ropa = "camisa";
            break;
            case 'tbl_tipo_pantalon':
                for ($j=0; $j < count($listaTiposPantalones); $j++) { 
                    if ($listaTiposPantalones[$j]->getId_tipo_pantalon() == intval($dato[$i])) {
                        $tipo = $listaTiposPantalones[$j]->getNombre();
                    }   
                }
                
                $ropa = "pantalon";
            break;
            case 'tbl_tipo_zapato':
                for ($j=0; $j < count($listaTiposZapatos); $j++) { 
                    if ($listaTiposZapatos[$j]->getId_tipo_zapato() == intval($dato[$i])) {
                        $tipo = $listaTiposZapatos[$j]->getNombre();
                    }   
                }
                $ropa = "zapato";
            break;
            
        }
    }



    $camisa = $talla_camisa;
    $pantalon = $talla_pantalon;
    $zapato = $talla_zapato;

    $listaUsuarios = $usuariodao->listaDotacionFiltros($genero, $sucursal, $tipo_dotacion, $camisa, $pantalon, $zapato); 

    

    echo "Cantidad: " . count($listaUsuarios);

    $lista =  "<table class='table table-striped'>"
    ."<thead>"
    ."<tr class='text-center'>"
        ."<th scope='col'>Doc</th>"
        ."<th scope='col'>Nombre</th>"
        ."<th scope='col'>Apellido</th>"
        ."<th scope='col'>Sucursal</th>"
        ."<th scope='col'>Tipo de dotación</th>"
        ."<th scope='col'>Género</th>"
        ."<th scope='col'>Tipo " . $ropa . "</th>"
        ."<th scope='col'>Talla</th>"
        
    ."</tr>"
    ."</thead>"
    ."<tbody>"; 


        for ($i=0; $i < count($listaUsuarios); $i++) { 

            
            
            $lista .= "<tr>"
            ."<td>" . $listaUsuarios[$i]->getId_usuario() . "</td>"
            ."<td>" . $listaUsuarios[$i]->getNombre() . "</td>"
            ."<td>" . $listaUsuarios[$i]->getApellido() . "</td>"
            ."<td>" . $listaUsuarios[$i]->getSucursal() . "</td>"
            ."<td>" . $listaUsuarios[$i]->getTipo_dotacion() ."</td>"
            ."<td>" . $listaUsuarios[$i]->getGenero() . "</td>";

            if ($ropa == "camisa") {
                $lista .= "<td>Camisa " . $tipo . "</td>";
            }else if($ropa == "pantalon"){
                $lista .= "<td>Pantalon " . $tipo . "</td>";
            }else if($ropa == "zapato") {
                $lista .= "<td>Zapato " . $tipo . "</td>"; 
            }else{
                $lista .= "<td>Sin seleccionar</td>"; 
            }

            
                $lista .= "<td>" . $listaUsuarios[$i]->getTalla_camisa() . "</td>";
            
                

             $lista .="</tr>";
    
            $validar_existencias = true;
        }
    

    

    $btnReporte = "";

    if (!$validar_existencias) {
        $lista .= "<td colspan='8' class='text-center'>No hay empleados con esos filtros</td>";
    }else{
        $btnReporte = "<form action='../../controller/reportes/ReporteFiltrosDotacion.php' method='post'>";

        if ($dato != null) {
            for ($i=0; $i < count($campos); $i++) { 
                $btnReporte .= "<input type='text' name='" . $campos[$i]
                . "' value='" . $dato[$i] . "' class='d-none'>";
            }
        }

        $btnReporte .= "<button class='btn btn-verde' name='btn-reporte-empleados-filtros'>Generar reporte</button>"
        ."</form>";
    }

    $lista .= "</tbody>"
    . "</table>"
    . $btnReporte;

    echo $lista;

}