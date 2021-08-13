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


//Query para seleção dos produtos mais vendidos
$query = "SELECT Codigo_produto, Vendas FROM registros ORDER BY Vendas DESC LIMIT 3";
          #select * from registros order by Vendas DESC LIMIT 3

if ($result = $mysqli->query($query)) {
	if ($result->num_rows > 0) { //Verifca se foram retornados resultados
    	while ($row = $result->fetch_assoc()) {

			$codigo_produto = $row["Codigo_produto"];
    	   
    	    //Inicio processo para consultar produto a partir do id

			$query2 = "SELECT Nome FROM produtos WHERE Codigo=$codigo_produto";
    	    if ($result2 = $mysqli2->query($query2)) {
				if ($result2->num_rows > 0) { //Verifca se foram retornados resultados
			    	$atributos_indice = $result2 -> fetch_array(MYSQLI_NUM); //pega os valores da tablea a partir do indice de atributos selecionados

			    	echo $atributos_indice[0]." - ".$row["Vendas"]."|";
			    	//Retorno/Saida do codigo

				}else{
			  		echo "Nenhum resultado foi retornado";
				}
			}else{
				echo "Erro: ".$mysqli2->error;
			}
			//Fim processo de consulta do produto
		}
	}else{
  		echo "Nenhum resultado foi retornado";
	}
}else{
	echo "Erro: ".$mysqli->error;
}

?>