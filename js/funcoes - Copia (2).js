function ir_para(pagina){
	window.location = './'+pagina+'.html';
}

function pesquisar(form_id){
	//Requisição back end
	$.ajax({
		url: "backend/consulta_ticket_medio.php",
		method: "GET",
		success: function(retorno){
			if (retorno != undefined) { //Verifica se a pesquisa retornou campos preenchidos

				let quantidade_inputs = document.getElementsByTagName("input").length;

				for (let i = 0; i <= quantidade_inputs; i++) {
					document.getElementById(form_id).elements[i].value = retorno; //"i+3" pra pular os inputs indesejaveis da pagina como a caixa de pesquisa e o botão pesquisar.
				}

				alert(retorno);
				return;
			}else{
				alert("Erro ao realizar pesquisa");
				alert(retorno);
			}

		}
	});
}