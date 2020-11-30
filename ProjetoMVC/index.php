<?php

$template = file_get_contents('template/estrutura.html');

require_once 'Core/frame.php';

require_once 'Controller/HomeController.php';
require_once 'Controller/ErrorController.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/SistemaController.php';
require_once 'Controller/SobreController.php';
require_once 'Controller/CadastroController.php';
require_once 'Controller/FatorialController.php';
require_once 'Controller/IdadeController.php';
require_once 'Controller/ContagemController.php';
require_once 'Controller/CalculadoraController.php';
require_once 'Controller/DashboardController.php';

require_once 'Model/fatorial.php';
require_once 'Model/idade.php';
require_once 'Model/contagem.php';
require_once 'Model/calculadora.php';

require_once 'Database/conexao.php';

require_once 'vendor/autoload.php';

$core = new Estrurura;
echo $core->start($_GET);

$saida = ob_get_contents(); // COMANDO PARA ARMAZENA O CONTEUDO
ob_end_clean();

$tplpronto = str_replace('{{area_dinamica}}', $saida, $template); // COMANDI IRA EXIBIR O CONTEUDO NA AREA MARCADA
echo $tplpronto; // COMANDO PARA MOSTRAR A ESTRUTURA 
?>