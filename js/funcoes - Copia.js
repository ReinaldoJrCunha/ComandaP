function ir_para(pagina){
	window.location = './'+pagina+'.html';
}

function pesquisar(form_id){
	let cpf_pesquisa = document.getElementById('cpf_pesquisa').value;
	if (cpf_pesquisa == ""){
	 	alert("Preencha o campo!");
	 	return
	}

	//Requisição back end
	$.ajax({
		url: "backend/consultar.php",
		method: "GET",
		data: "cpf_pesquisa="+cpf_pesquisa, 
		success: function(retorno){
			if (retorno.split("|")[1] != undefined) { //Verifica se a pesquisa retornou campos preenchidos

				let quantidade_inputs = document.getElementsByTagName("input").length;

				document.getElementById('area_de_pesquisa').style.display = "none";
				document.getElementById('area_de_dados').style.display = "";

				for (let i = 0; i <= quantidade_inputs; i++) {
					document.getElementById(form_id).elements[i+3].value = retorno.split("|")[i]; //"i+3" pra pular os inputs indesejaveis da pagina como a caixa de pesquisa e o botão pesquisar.
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


function Validar_form(form_id, ignorar){
	let quantidade_inputs = document.getElementsByTagName("input").length;
	let inputs_form;
	let quantidade_campos_vazios = 0;
	let campos_vazios = "";

	for (let i = ignorar; i <= quantidade_inputs; i++) {
		inputs_form = document.getElementById(form_id).elements[i].value;
		if (inputs_form == ""){ //Caso o usuario n tenha preenchido o input
			campos_vazios = campos_vazios+"-> "+document.getElementById(form_id).elements[i].getAttribute("placeholder")+"\n"; //Pega o texto que aparece na caixa input e concatena na variavel campos_vazios
			quantidade_campos_vazios++; 
		}
	}

	if (quantidade_campos_vazios > 0){
		alert("É necessario que os seguintes campos sejam preenchidos: \n"+campos_vazios);
	}else{
		return true;
	}
}

function explode(dados, inicio, fim){
	let resto = dados.split(inicio)[1];
	resto = resto.split(fim)[0];
	return resto;
}