<?php
namespace App\controllers;

use League\Plates\Engine;

class Controller {
    protected $view;
    public function __construct() {
        $this->view = new Engine( '/../views');
    }
    public function sendPage($page, array $data = []){
        exit($this->view->render($page,$data));
    }
    public function checkSesskey() {
        return ($_SESSION['sesskey'] == $_POST['sesskey'] ?? '');
    }
}
