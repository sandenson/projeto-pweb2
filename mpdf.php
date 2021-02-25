<?php
  use Mpdf\Mpdf;

  require_once __DIR__ . '/vendor/autoload.php';

  $mpdf = new Mpdf();

  $html = "<h2 style='text-align: center;'>Relatório de adoções - ";

  $date = new DateTime($pets[1]);
  $date = $date->format('d \d\\e m \d\\e Y');
  if ($date[6] == '0' && $date[7] == '1') $date = substr_replace($date, 'janeiro', 6, 2);
  else if ($date[6] == '0' && $date[7] == '2') $date = substr_replace($date, 'fevereiro', 6, 2);
  else if ($date[6] == '0' && $date[7] == '3') $date = substr_replace($date, 'março', 6, 2);
  else if ($date[6] == '0' && $date[7] == '4') $date = substr_replace($date, 'abril', 6, 2);
  else if ($date[6] == '0' && $date[7] == '5') $date = substr_replace($date, 'maio', 6, 2);
  else if ($date[6] == '0' && $date[7] == '6') $date = substr_replace($date, 'junho', 6, 2);
  else if ($date[6] == '0' && $date[7] == '7') $date = substr_replace($date, 'julho', 6, 2);
  else if ($date[6] == '0' && $date[7] == '8') $date = substr_replace($date, 'agosto', 6, 2);
  else if ($date[6] == '0' && $date[7] == '9') $date = substr_replace($date, 'setembro', 6, 2);
  else if ($date[6] == '1' && $date[7] == '0') $date = substr_replace($date, 'outubro', 6, 2);
  else if ($date[6] == '1' && $date[7] == '1') $date = substr_replace($date, 'novembro', 6, 2);
  else if ($date[6] == '1' && $date[7] == '2') $date = substr_replace($date, 'dezembro', 6, 2);
  
  $html .= $date . "</h2>";

  $loggedUser = $_SESSION['loggedUser'];

  if ($pets[0]) {
    $html .= "<table>
      <tr>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Sexo</th>
        <th>Status</th>
        <th>Adotado por</th>
        <th>Registrado por</th>
      </tr>";

      foreach ($pets[0] as $index => $pet) {
        $html .= "<tr>
          <td>" . $pet->getName() . "</td>
          <td>" . $pet->getType() . "</td>
          <td>" . $pet->getSex() . "</td>
          <td>" . ($pet->getIsAdopted() ? 'Adotado' : 'Esperando por adoção') . "</td>
          <td>@" . $pet->getAdoptedBy() . "</td>
          <td>@" . $pet->getRegisteredBy() . "</td>
        </tr>";
      }
      
    $html .= "</table>";
  } else {
    $html .= '<p>Nenhum pet foi adotado neste dia.</p>';
  }

  $date = new DateTime($pets[1]);
  $filename = "relatorio_de_adocao_de_pets-" . $date->format('d-m-Y') . ".pdf";

  $mpdf->WriteHTML($html);

  $mpdf->Output($filename, "D");