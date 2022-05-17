<?php 

require_once '../../models/DAO/UsuarioDAO.php';

if (isset($_POST)) {

    $id_usuario = $_POST['id'];
    
    $usuariodao = new UsuarioDAO();

    $usuariodao->eliminarTodaDotacion($id_usuario);

}