<?php
require_once ROOT_PATH.'Controllers/Controller.php';

class ContactController extends Controller {
    public function create(){
      $this->view('contact/index');
    }
}
