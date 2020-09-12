var tabButtons = document.querySelectorAll(".tabContainer .buttonContainer button");
var tabPanel = document.querySelectorAll(".tabContainer .tabPanel");

function showPanel(panelIndex, colorCode){
	console.log('aqui');
	tabButtons.forEach(function(node){
		node.style.backgroundColor="";
		node.style.color="";
	});
	tabButtons[panelIndex].style.backgroundColor=colorCode;
	tabButtons[panelIndex].style.color="white";
	tabPanel.forEach(function(node){
		node.style.display="none";
	});
	tabPanel[panelIndex].style.display="block";
	tabPanel[panelIndex].style.backgroundColor=colorCode;
}



/*=======================Mascara Telefone=============================*/
function mascaraDeTelefone(telefone){
    const textoAtual = telefone.value;
    const isCelular = textoAtual.length === 9;
    let textoAjustado;
    if(isCelular) {
        const parte0 = textoAtual.slice(0,2);
        const parte1 = textoAtual.slice(2,7);
        const parte2 = textoAtual.slice(7,11);
        textoAjustado = `(${parte0}) ${parte1}-${parte2}`
        console.log(textoAjustado)
    } else {
        const parte0 = textoAtual.slice(0,2);
        const parte1 = textoAtual.slice(2,6);
        const parte2 = textoAtual.slice(6,10);
        textoAjustado = `(${parte0}) ${parte1}-${parte2}`
        console.log(textoAjustado)
    }

    telefone.value = textoAjustado;
}
function tiraHifen(telefone) {
    const textoAtual = telefone.value;
    const textoAjustado = textoAtual.replace(/\-/g, '');

    telefone.value = textoAjustado;
}
/*====================================================*/