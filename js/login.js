function obterParametroConsulta(nome) {
    const urlSearchParams = new URLSearchParams(window.location.search);
    return urlSearchParams.get(nome);
}

// Função para exibir a mensagem com base no parâmetro de consulta
function exibirMensagem() {
    const mensagemDiv = document.getElementById("mensagem");
    const erro = obterParametroConsulta("erro");

    if (erro === "credencias_incorreta") {
        mensagemDiv.innerHTML = "<p> Email ou senha incorreto *</p> ";
    } else if (erro === "insercao_falhou") {
        mensagemDiv.innerHTML = "<p>Ocorreu um erro durante o cadastro. Por favor, tente novamente.</p>";
    } else if (erro === "email_invalido") {
        mensagemDiv.innerHTML = "<p>Email invalido, tente novamente.</p>";
        
    } else if (erro === "chave_incorreta") {    
        mensagemDiv.innerHTML = "<p>Chave inválida ou expirada, tente novamente.</p>";
    } else {

    }


}


// Chame a função quando a página carregar
window.onload = exibirMensagem;

