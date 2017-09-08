<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model("Json_Model");
    }

    public function generarProveedores() {
        $result= $this->Json_Model->ListarProveedoresSelect('TRABAJADOR');
        echo json_encode($result);
        echo '[{"id":"1","text":"Industrias M&C"},{"id":"2","text":"oscar"},{"id":"3","text":"nte"},{"id":"4","text":"RIO BLANCO S.A.C."},{"id":"5","text":"Mimbral"},{"id":"6","text":"TST"},{"id":"7","text":"f"},{"id":"8","text":"fa"},{"id":"13","text":"cvc"},{"id":"14","text":"yeah"},{"id":"15","text":"juan"},{"id":"16","text":"Juan Polvo"},{"id":"18","text":"cazador sa"},{"id":"19","text":"LUIS PAREDES"},{"id":"20","text":"edwin"},{"id":"22","text":"sevicentersolutions"},{"id":"23","text":"gggg"},{"id":"24","text":"gggg"},{"id":"25","text":"AA"},{"id":"26","text":"rtyg"},{"id":"27","text":"onesystemas"},{"id":"28","text":"dfgdgdfg"},{"id":"29","text":"Cajitas SA"},{"id":"30","text":"44"},{"id":"33","text":"REDATEL"},{"id":"34","text":"CODE AND BYTE"},{"id":"35","text":"test"},{"id":"36","text":"Fatima"},{"id":"37","text":"Apple"},{"id":"38","text":"PRUEBA"},{"id":"39","text":"Movistar"},{"id":"40","text":"tplink espa\u00f1a"},{"id":"41","text":"innova Producciones"},{"id":"42","text":"Inventory Control"},{"id":"44","text":"RANSA SA"},{"id":"45","text":"david "},{"id":"46","text":"juancho"},{"id":"47","text":"ato"},{"id":"48","text":"nuevo"},{"id":"49","text":"AmoraRio"}]';
    }

    public function logout() {
        $this->session->sess_destroy();
        header("location:" . base_url() . 'home');
    }

}
