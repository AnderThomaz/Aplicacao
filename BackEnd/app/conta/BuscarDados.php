<?php 
require_once "conexao.php";

$emailUser = $_SESSION['emailUser'];

$stmt = $conn->prepare($sql = "SELECT *  FROM `login` WHERE `email` LIKE '$emailUser'");

$stmt->execute();

$result = $stmt->get_result(); 

while($dados = $result->fetch_assoc()) {
    $nome = $dados['nome'];
}

?>      




<div id="inform">

    <p>Dados Pessoais</p>

    <div id="email" class="dados">
        <div  id="titulo"><p>Nome</p></div>
        <p><?php echo $nome?></p>
        <div class="editar">
            <span id="AbrirModel1" class="material-symbols-outlined" onclick="EditarNomeN()">
                edit
            </span>
        </div>
    </div>
    <div id="saldo" class="dados">
        <div  id="titulo"><p>Email</p></div>
        <p><?php echo $emailUser?></p>
        <div class="editar">
            <span  id="AbrirModel2" class="material-symbols-outlined" onclick="EditarEmailF()">
                edit
            </span>
        </div>
    </div>
    <div id="nome" class="dados">
        <div id="titulo"><p>Senha</p></div>
        <p>Alterar senha</p>
        <div class="editar">
            <span id="AbrirModel3" class="material-symbols-outlined" onclick="AbrirSenha()">
                edit
            </span>
        </div>
    </div>

    

</div>



<div class="Fundo" id="EditarNome">
    <div class="model" >
        <form action="">
            <span class="material-symbols-outlined" id="ButFechar1" onclick="FecharNomeN()">
            close
            </span>
            <p>Atualizar Nome</p>
            <input type="text" id="NovoNome" class="Editar" placeholder="Seu nome">
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

<div class="Fundo" id="EditarEmail">
    <div class="model">
        <form action="">
            <span class="material-symbols-outlined" id="ButFechar2" onclick="FecharEmail()">close</span>
            <p>Atualizar Email</p>
            <input type="email" id="NovoEmail" class="Editar" placeholder="Seu email">
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

<div class="Fundo" id="EditarSenha">
    <div class="model">
        <form action="">
            <span class="material-symbols-outlined" id="ButFechar3" onclick="FecharSenha()">close</span>
            <p>Atualizar Senha</p>
            <input type="password" id="SenhaAtual" class="Editar" placeholder="Senha Atual">
            <input type="password" id="NovaSenha" class="Editar" placeholder="Nova Senha">
            <input type="password" id="RNovaSenha" class="Editar" placeholder="Repetir Senha">

            <button type="submit">Salvar</button>
        </form>
    </div>
</div>


<script src="../../../js/conta/ModelDados.js"></script>
