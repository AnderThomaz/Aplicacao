var AbrirModel1 = document.getElementById('AbrirModel1')
var EditarNome = document.getElementById('EditarNome')
var ButFechar1 = document.getElementById('ButFechar1')

function EditarNomeN() {
    EditarNome.style.display = 'block';
}

function FecharNomeN() {
    EditarNome.style.display = 'none';
}

AbrirModel1.onclick = EditarNomeN;
ButFechar1.onclick = FecharNomeN;

var AbrirModel2 = document.getElementById('AbrirModel2');
var EditarEmail = document.getElementById('EditarEmail');
var ButFechar2 = document.getElementById('ButFechar2');

// Função para abrir o formulário de edição do email
function EditarEmailF() {
    EditarEmail.style.display = 'block';
}

// Função para fechar o formulário de edição do email
function FecharEmail() {
    EditarEmail.style.display = 'none';
}

// Atribuição das funções aos eventos onclick dos botões correspondentes
AbrirModel2.onclick = EditarEmailF;
ButFechar2.onclick = FecharEmail;


var AbrirModel3 = document.getElementById('AbrirModel3');
var EditarSenha = document.getElementById('EditarSenha');
var ButFechar3 = document.getElementById('ButFechar3');

// Função para abrir o formulário de edição do email
function AbrirSenha() {
    EditarSenha.style.display = 'block';
}

// Função para fechar o formulário de edição do email
function FecharSenha() {
    EditarSenha.style.display = 'none';
}

// Atribuição das funções aos eventos onclick dos botões correspondentes
AbrirModel3.onclick = AbrirSenha;
ButFechar3.onclick = FecharSenha;



