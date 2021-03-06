<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    private $menu;

    public function __construct() {
        parent::__construct();
        $this->load->database();

        if (!$this->session->userdata('email')) {
            $this->menu = [
                'modal_link' => 'modal_login_moderador',
                'modal' => 'modal',
                'link_logado' => '#'
            ];
        } else {
            $this->menu = [
                'modal_link' => '',
                'modal' => '#',
                'link_logado' => 'Restrita/'
            ];
        }
    }

    public function index($number = null) {
		
			/*require 'assets/PHPMailer/PHPMailerAutoload.php';
    	  $mail = new PHPMailer();
    	 $mail->CharSet = 'utf-8';
	  $mail->IsSMTP();
    	  $mail->isHTML(true);
    	  $mail->SMTPDebug = 1;
	      $mail->Encoding = 'base64';
    	  $mail->SMTPAuth = true;
    	  $mail->SMTPSecure = 'tls';
    	  $mail->Host = "smtp.gmail.com";
    	  $mail->Port = 587;
    	  $mail->Username = "simposiovarginha@gmail.com";
    	  $mail->Password = "gelldispesquisa";
		  $mail->From = "simposiovarginha@gmail.com";
		  $mail->FromName = "Simpósio de Língua e Literatura";
		  $mail->Subject = "Teste";
		  $mail->Body = "Teste para ver se funciona";
		  $mail->AltBody = "Conteúdo";
		  $mail->AddAddress("elyasnog@gmail.com");
    	  //$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
    	  //echo !extension_loaded('openssl')?"Not Available":"Available";
    	  		  if ($mail->Send()) {
			echo "Funcionou";		  
		  } else {
			echo $mail->ErrorInfo;
		  }*/
		
        $dados = $this->menu;
        $dados['url'] = base_url();
        $dados['display'] = 'none';

    	$this->db->select("EVENTO.idEVENTO, EVENTO.NOME");
		$this->db->from("EVENTO");
		$dados['EVENTO'] = $this->db->get()->result();

        if (isset($number) && $number == 1) {
            $dados['color'] = 'success';
            $dados['msg'] = 'Logado com sucesso!, agora pode acessar a área administrativa';
            $dados['display'] = 'block';
        } else if (isset($number) && $number == 2) {
            $dados['color'] = 'danger';
            $dados['msg'] = 'O CPF informado já foi cadastrado.';
	     		$dados['display'] = 'block';
        } else if (isset($number) && $number == 3) {
            $dados['color'] = 'danger';
            $dados['msg'] = 'As vagas para esse GT já foram preenchidas. Fique atento(a) ao seu e-mail para qualquer novidade.';
            $dados['display'] = 'block';
        } else if (isset($number) && $number == 4) {
            $dados['color'] = 'danger';
            $dados['msg'] = 'Não foi possível confirmar o cadastro. Confira as informações digitadas.';
            $dados['display'] = 'block';
        } else if (isset($number) && $number == 5) {
            $dados['color'] = 'danger';
            $dados['msg'] = 'Os e-mails informados não são iguais.';
            $dados['display'] = 'block';
        } else if (isset($number) && $number == 6) {
            $dados['color'] = 'success';
            $dados['msg'] = 'O seu cadastro foi feito! Confira seu e-mail para a confirmação.';
            $dados['display'] = 'block';
        } else if (isset($number) && $number == 7) {
            $dados['color'] = 'danger';
            $dados['msg'] = 'O número de palavras-chave não está dentro dos limites.';
            $dados['display'] = 'block';
        }
        $this->parser->parse('layout_inicio', $dados);
    }

    public function login() {
        $dados = $this->menu;
        $dados['url'] = base_url();
        $form = $this->input->post();
        if (count($form) == 2) {
            $email['email'] = $form['email'];
            $form['senha'] = sha1($form['senha']);
            $data = $this->Crud->select('usuario', '*', $email);
            if (count($data) == 1 && $data[0]['senha'] == $form['senha']) {
                $this->session->set_userdata($data[0]);
                redirect('Inicio/index/1');
            } else {
                $dados['msg'] = 'Usuário e/ou senha incorretos.';
                $dados['display'] = 'block';
                $dados['color'] = 'danger';
            }
        }
        $this->parser->parse('layout_inicio', $dados);
    }

}
