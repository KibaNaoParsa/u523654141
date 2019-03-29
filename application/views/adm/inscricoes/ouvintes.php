<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($INSCRITO as $i) {
		echo '<b>Nome: </b>';
		echo $i->NOME;
		if ($i->NECESSIDADES == 1)
			echo '<br><div id="necessidade" style="color: blue;">PORTADOR DE NECESSIDADES ESPECIAIS</div>';
		echo '<br><b>E-mail: </b>';
		echo $i->EMAIL;
		echo '<br><b>GT: </b>';
		echo $i->NOME_EVENTO;
		echo '<br><b>Situação: </b>';
		
		if ($i->SITUACAO == 0) {
			echo "<div id='insc' style='color: green;'><b>";
			echo "PAGO";
			echo "</b></div>";
			echo anchor("adm/inscricao/indeferir_ouvinte/".$i->idINSCRITO, "Indeferir", array('class'=>"btn btn-danger", 'id'=>"botao"));		
			echo "<br>";
		} else if ($i->SITUACAO == 1) {
			echo "<div id='insc' style='color: red;'><b>";
			echo "INDEFERIDO/LIMITE ATINGIDO";
			echo "</b></div>";
			echo anchor("adm/inscricao/pag_ouvinte/".$i->idINSCRITO, "Deferir c/ pagamento", array('class'=>"btn btn-success", 'id'=>"botao"));		
			echo anchor("adm/inscricao/deferir_ouvinte/".$i->idINSCRITO, "Deferir s/ pagamento", array('class'=>"btn btn-warning", 'id'=>"botao"));		
			echo "<br>";

		} else if ($i->SITUACAO == 2) {
			echo "<div id='insc' style='color: orange;'><b>";
			echo "PAGAMENTO PENDENTE";
			echo "</b></div>";
			echo anchor("adm/inscricao/pag_ouvinte/".$i->idINSCRITO, "Confirmar pagamento", array('class'=>"btn btn-success", 'id'=>"botao"));		
			echo "<br>";		
		}
		
		echo "<br>";
	}



?>
