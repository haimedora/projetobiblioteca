<?php 
    class Usuario{
	    public $nome;
		public $cpf;
		public $email;
		public $senha;
		public $função;
	    function Usuario() {
		    $this->nome = "Isadora";
		    $this->cpf = "0000000-00";
		    $this->email = "Isadora****@gmail.com";
			$this->senha = "";
			$this->função = "professor";
		}
	}
?>