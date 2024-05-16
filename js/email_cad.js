function obterParametroConsulta(nome) {
    const urlSearchParams = new URLSearchParams(window.location.search);
    return urlSearchParams.get(nome);
}

// Função para exibir a mensagem com base no parâmetro de consulta
function exibirMensagem() {
    const mensagemDiv = document.getElementById("mensagem");
    const erro = obterParametroConsulta("erro");

    if (erro === "email_existente") {
        mensagemDiv.innerHTML = "<p>O e-mail já está cadastrado.<br> Tente novamente com um e-mail diferente.</p> ";
    } else if (erro === "insercao_falhou") {
        mensagemDiv.innerHTML = "<p>Ocorreu um erro durante o cadastro. Por favor, tente novamente.</p>";
    } else {
        // Outras mensagens de erro podem ser tratadas aqui
    }
}

// Chame a função quando a página carregar
window.onload = exibirMensagem;