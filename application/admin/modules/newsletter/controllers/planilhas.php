<?php


$html="";

$html.= "<table width='100%'>";

$html.= "<thead>";

$html.= "<tr>";

$html.= "
<th>Nome:<th>
<th>E-mail:<th>
";

$html.= "<tr>";

$html.="</thead>";

$html.= "<tr>";


foreach ($emails as $email) {

$html.= "
<td>{$email->nome}</td>
<td>{$email->email}</td>
";

}

$html.="</tr>";


$html.= "</table>";


// Determina que o arquivo é uma planilha do Excel
  header("Content-type: application/vnd.ms-excel");   

  // Força o download do arquivo
  header("Content-type: application/force-download");  

  // Seta o nome do arquivo
  header("Content-Disposition: attachment; filename=emails.xls");

  header("Pragma: no-cache");
  // Imprime o conteúdo da nossa tabela no arquivo que será gerado
  echo $html;


?>