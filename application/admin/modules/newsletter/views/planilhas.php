<?php


$html="";

$html.="<h1 style='font-size:16px;color:#f00;'>Lista de E-mails Cadastrados</h1>";

$html.= "<table >";

$html.="
<tr>
<td>Nome:</td>
<td>E-mail:</td>
</tr>
";

foreach ($emails as $email) {
$html.= "<tr>";
$html.= "
<td align='center'>".utf8_decode($email->nome)."</td>
<td align='center'>{$email->email}</td>
";
$html.="</tr>";

}




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