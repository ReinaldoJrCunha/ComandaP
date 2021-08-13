function ir_para(pagina){
	window.location = './'+pagina+'.html';
}

function consulta_ticket_medio(id){
	//Requisição back end
	$.ajax({
		url: "backend/ticket_medio.php",
		method: "GET",
		success: function(retorno){
			if (retorno != undefined) { //Verifica se a pesquisa retornou campos preenchidos

				document.getElementById(id).value = "R$"+retorno; 
				
				//alert(retorno);
				return;
			}else{
				alert("Erro ao realizar pesquisa");
				alert(retorno);
			}

		}
	});
}

function consulta_vendas_diaria(id){
	//Requisição back end
	$.ajax({
		url: "backend/vendas_diaria.php",
		method: "GET",
		success: function(retorno){
			if (retorno != undefined) { //Verifica se a pesquisa retornou campos preenchidos

				document.getElementById(id).value = "R$"+retorno; 
				
				//alert(retorno);
				return;
			}else{
				alert("Erro ao realizar pesquisa");
				alert(retorno);
			}

		}
	});
}

function consulta_mais_vendidos(){
	//Requisição back end
	$.ajax({
		url: "backend/mais_vendidos.php",
		method: "GET",
		success: function(retorno){
			if (retorno != undefined) { //Verifica se a pesquisa retornou campos preenchidos

				for (i = 0; i <= 3; i++) {
					document.getElementById(i+1).value = retorno.split("|")[i];
				}
				
				return;
			}else{
				alert("Erro ao realizar pesquisa");
				alert(retorno);
			}

		}
	});
}

function consulta_menos_vendidos(){
	//Requisição back end
	$.ajax({
		url: "backend/menos_vendidos.php",
		method: "GET",
		success: function(retorno){
			if (retorno != undefined) { //Verifica se a pesquisa retornou campos preenchidos

				for (i = 0; i <= 3; i++) {
					document.getElementById(i+1).value = retorno.split("|")[i];
				}
				
				return;
			}else{
				alert("Erro ao realizar pesquisa");
				alert(retorno);
			}

		}
	});
}