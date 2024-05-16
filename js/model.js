function obterParametroConsulta(nome) {
    const parametros = new URLSearchParams(window.location.search);
    return parametros.get(nome);
}

function exibirModal() {
    var modal = document.getElementById('modal');
    var VodalSenha = document.getElementById('modalSenha');
    const parametroValor = obterParametroConsulta("return");

    if (parametroValor === 'senha-alterada') { 
        // Certifique-se de comparar com "true"
        VodalSenha.style.display = 'block';

    } else if (parametroValor === 'cadastro-efetuado') { // corrigido o else if
        modal.style.display = 'block';

    } else if (parametroValor === 'cad-recebimento') { // corrigido o else if
        modal.style.display = 'block';

    } else if (parametroValor === 'cad-despesa') { // corrigido o else if
        modal.style.display = 'block';

    } else if (parametroValor === 'alterar-senha') {
        modal.style.display = 'block';


    }else {

    }  
}

// Chame a função exibirModal para aplicar a lógica desejada
exibirModal();
