// https://procatador.setres.ma.gov.br/api/associado/${search}/eventos
//https://procatador.setres.ma.gov.br/storage/fotos/
// 16219928887 16219930988

///////////////////////////
let search = 16219928887;
///////////////////////////

function bodyValidado() {
	var bodyValidado = document.getElementsByTagName("body")[0];
	bodyValidado.className = "validado";
}

function bodyFalha() {
	var bodyFalha = document.getElementsByTagName("body")[0];
	bodyFalha.className = "falha";

	document.getElementById("container").style.display = "none";

	var registro = document.getElementById("registro");
	registro.innerHTML = "<h1>Registro não encontrado!</h1>";
}

const options = {
	method: "GET",
	mode: "cors",
	cache: "default",
};

fetch(
	`https://procatador.setres.ma.gov.br/api/associado/${search}/eventos`,
	options
)
	.then((response) => response.json())
	.then((data) => {
		bodyValidado();

		document.getElementById("nome").textContent = data[0].nome;
		document.getElementById("carteira").textContent = data[0].filiacao;
		document.getElementById("cooperativa").textContent = data[0].nomecompanhia;

		// Consultar imagem na api
		const imagemSearch = (document.getElementById("imagePhoto").textContent =
			data[0].imagem);

		// Applicar a consulta dentro do diretorio da imagem
		document.getElementById(
			"imagePhoto"
		).src = `https://procatador.setres.ma.gov.br/storage/${imagemSearch}`;
	})

	.catch((error) => {
		console.log(error);
		bodyFalha();
	});
