<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class email extends CI_Controller {
    public function enviar($body,$email){
        $mensaje = $this->buildBodyMessage($body);

				$this->email->from('no-reply@lastit.com', 'LastIt.com');
				$this->email->to($email);
				$this->email->subject('Reseteo de la Contraseña');
				$this->email->message($mensaje);
                $this->email->send();
        return 0;
    }
}
