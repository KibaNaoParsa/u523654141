<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	echo "Qual tipo de relatório você deseja gerar?<br>";
	echo anchor("adm/inscricao/gerar_pdf", "Pagantes completo", array('class'=>"btn btn-success", 'id'=>"botao")).
		  anchor("adm/inscricao/gerar_pdft", "Inscritos completo", array('class'=>"btn btn-primary", 'id'=>"botao")).
		  anchor("adm/inscricao/gerar_pdfcom", "Comunicação completo", array('class'=>"btn btn-info", 'id'=>"botao")).
		  anchor("adm/inscricao/gerar_pdfouv", "Ouvintes completo", array('class'=>"btn btn-warning", 'id'=>"botao"));

?>
