<?php
error_reporting(0);

//Informações para conexão com o banco de dados
$servername = "127.0.0.1"; 
$username = "root";
$database = "db_padaria";
$password = "";

//Cria o objeto pelo o qual sera feita a conexão com o banco de dados para pegar os registros da tabela
$mysqli = new mysqli($servername, $username, $password, $database);

//Cria o objeto pelo o qual sera feita a conexão com o banco de dados para pegar registros de outra tabela
$mysqli2 = new mysqli($servername, $username, $password, $database);

//Verifica se a conexão foi bem sucedida
if (mysqli_connect_errno()) {
	echo "Erro: Falha ao estabelecer conexão com o banco!";
	echo $mysqli->connect_error;
    exit();
}

date_default_timezone_set('America/Manaus');
$data_atual = date(DATE_ATOM);
$data_atual = explode('T', $data_atual)[0];
#echo $data_atual."<br>";


//Query para seleção dos codigos e vendas dos produtos a partir da data
$query = "SELECT Codigo_produto, Vendas FROM registros";

$ticket_medio = 0;
$quantidade_vendas = 0;
$valor_total_das_vendas = 0;

if ($result = $mysqli->query($query)) {
	if ($result->num_rows > 0) { //Verifca se foram retornados resultados
    	while ($row = $result->fetch_assoc()) {
    	    $quantidade_vendas += $row["Vendas"];
			
			#echo("Produto ".$row["Codigo_produto"].' - Vendas '.$row["Vendas"].' - ');

			$codigo_produto = $row["Codigo_produto"];
    	   
    	    //Inicio processo para consultar produto a partir do id

			$query2 = "SELECT Valor FROM produtos WHERE Codigo=$codigo_produto";
    	    if ($result2 = $mysqli2->query($query2)) {
				if ($result2->num_rows > 0) { //Verifca se foram retornados resultados
			    	$atributos_indice = $result2 -> fetch_array(MYSQLI_NUM); //pega os valores da tablea a partir do indice de atributos selecionados

			    	$valor_total_das_vendas += $row["Vendas"]*sprintf("%0.2f",$atributos_indice[0]);

			    	#echo "Valor ".$atributos_indice[0]."<br>";
			    	#" Total = ".$valor_total_das_vendas."<br>";

				}else{
			  		echo "Nenhum resultado foi retornado";
				}
			}else{
				echo "Erro: ".$mysqli2->error;
			}
			//Fim processo de consulta do produto
		}
		#echo "Quantidade de vendas ".$quantidade_vendas."<br>Valor total = ".$valor_total_das_vendas."<br>";
		$ticket_medio = ($valor_total_das_vendas/$quantidade_vendas);
		$ticket_medio = sprintf("%0.2f",$ticket_medio);
		#echo "Ticket médio ".$ticket_medio;
	}else{
  		echo "Nenhum resultado foi retornado";
	}
}else{
	echo "Erro: ".$mysqli->error;
}

echo $ticket_medio;

?>