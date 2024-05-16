<?php 
require_once '../BackEnd/favicon.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../../estilo/StyleApp/style.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/styleReceita.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/midiaQuery.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/despesasExtras.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançamento</title>
</head>
<body>

    <div id="modal" class="modal">
        <div class="modal-content">
        <h2>Despesa cadastrada</h2>
          
        <button><a href="despesas">Novo Lançamento</a></button>
        <button><a href="deshbord">Acessar Deshbord</a></button>
        </div>
    </div>
    <script src="../js/model.js"></script>
    
    <header>
        <span onclick="abrir_menu" id="iconmenu" class="material-symbols-outlined">
            menu
            </span>

        <h1>DESPESAS</h1>

        <span id="configuracoes" class="material-symbols-outlined">
            settings
            </span>
    </header>

    <menu id="menu" class="menu">
        <div id="header_menu">
            <span class="material-symbols-outlined" id="closemenu">
            close
            </span>

            

            
        </div>
        <ul>
                <a href="deshbord">
                <li><img src="../../estilo/StyleApp/icon/dashboard_FILL1_wght200_GRAD0_opsz24.svg" alt=""> Dashbord</a>
                <a href="recebimento">
                <li><img src="../../estilo/StyleApp/icon/paid_FILL1_wght600_GRAD0_opsz24.svg" alt="">Receita</a>
                <a href="despesas">
                <li><img src="../../estilo/StyleApp/icon/shopping_bag_FILL1_wght200_GRAD0_opsz24.svg" alt="">Despesas</a>
                <a href="relatorio">
                <li><img src="../../estilo/StyleApp/icon/equalizer_FILL1_wght200_GRAD0_opsz24.svg" alt="">Relátorio</a>
                <a href="conta">
                <li><img src="../../estilo/StyleApp/icon/person_FILL1_wght200_GRAD0_opsz24.svg" alt="">Conta</a>
                <a href="../BackEnd/app/logout">
                <li><img src="../../estilo/StyleApp/icon/exit_to_app_FILL1_wght400_GRAD0_opsz24.svg" alt="">Logout</a>
        </ul>

    </menu>

    <main>
        <div id="areaDespesas" class="despesas">
            
            <div id="lancamento">
                

                    <div id="imgaem"><img src="/app/img/2760426.jpg" alt=""></dir>

                        
            </div>

            <form  action="../BackEnd/app/despesas" method="post">
                <h1>Pagamentos</h1>

                <select name="Desc" id="SelecDespesas">
                        <option id="textt" value="" disabled selected hidden>Selecione um despesa</option>
                    <optgroup label="Moradia">
                        <option value="Aluguel">Aluguel</option>
                        <option value="Condomínio">Condomínio</option>
                        <option value="Água">Água</option>
                        <option value="Eletricidade">Eletricidade</option>
                        <option value="Gás">Gás</option>
                        <option value="Internet">Internet</option>
                        <option value="Telefone">Telefone</option>
                        <option value="TV">TV</option>
                        <option value="Manutenção">Manutenção</option>
                    </optgroup>

                    <optgroup label="Alimentação">
                        <option value="Lanches">Lanches</option>
                        <option value="Refeições">Refeições</option>
                        <option value="Restaurantes">Restaurantes</option>
                        <option value="Supermercado">Supermercado</option>
                    </optgroup>

                    <optgroup label="Transporte">
                        <option value="Combustível">Combustível</option>
                        <option value="Transporte público">Transporte público</option>
                        <option value="Uber/táxi">Uber/táxi</option>
                        <option value="Manutenção do veículo">Manutenção do veículo</option>
                        <option value="Estacionamento">Estacionamento</option>
                        <option value="Pedágios">Pedágios</option>
                    </optgroup>

                    <optgroup label="Saúde">
                        <option value="">Consultas</option>
                        <option value="">Medicamentos</option>
                        <option value="">Planos</option> de saúde
                        <option value="">Seguros</option>
                        <option value="">Exames</option>
                        <option value="">Tratamentos</option>
                    </optgroup>
                    
                    <optgroup label="Educação">
                        <option value="">Mensalidades</option>
                        <option value="">Material escolar</option>
                        <option value="">Uniforme</option>
                        <option value="">Cursos extras</option>
                        <option value="">Faculdade</option>
                        <option value="">Livros</option>
                    </optgroup>

                    <optgroup label="Laser e entretenimento">
                        <option value="">Cinema</option>
                        <option value="">Teatro</option>
                        <option value="">Shows</option>
                        <option value="">Viagens</option>
                        <option value="">Streaming</option>
                        <option value="">Hobbies</option>
                        <option value="">Clubes</option>
                    </optgroup>

                    <optgroup label="Vestuário e cuidados pessoais">
                        <option value="">Roupas</option>
                        <option value="">Calçados</option>
                        <option value="">Acessórios</option>
                        <option value="">Higiene</option>
                        <option value="">Cabelo</option>
                        <option value="">Estética</option>
                        <option value="">Cosméticos</option>
                    </optgroup>

                    
                    <optgroup label="Economias e investimentos">
                        <option value="">Poupança</option>
                        <option value="">Investimentos</option>
                        <option value="">Fundo de emergência</option>
                        <option value="">Previdência</option>
                        <option value="">Aposentadoria</option>
                    </optgroup>

                    <optgroup label="Impostos e taxas">
                        <option value="">Impostos sobre a renda</option>
                        <option value="">IPTU</option>
                        <option value="">IPVA</option>
                        <option value="">Taxas de licenciamento</option>
                        <option value="">Taxas  bancárias</option>
                    </optgroup>

                    <optgroup label="Dívidas">
                        <option value="">Empréstimos</option>
                        <option value="">Cartões de crédito</option>
                        <option value="">Financiamentos</option>
                        <option value="">Juros</option>

                    </optgroup>


                    
                </select>

                
                
                <div id="chekMes">

                    

                    <label for="Janeiro">Janeiro</label>
                    <input type="checkbox" value="1" name="Janeiro" id="Janeiro">
                    <label for="Fevereiro">Fevereiro</label>
                    <input type="checkbox" value="2" name="Fevereiro" id="Fevereiro">
                    <label for="Março">Março</label>
                    <input type="checkbox" value="3" name="Março" id="Março">
                    <label for="Maio">Maio</label>
                    <input type="checkbox" value="4" name="Janeiro" id="Maio">
                    <label for="Abril">Abril</label>
                    <input type="checkbox" value="5" name="Fevereiro" id="Abril">
                    <label for="Junho">Junho</label>
                    <input type="checkbox" value="6" name="Junho" id="Junho">
                    <label for="Julho">Julho</label>
                    <input type="checkbox" value="7" name="Julho" id="Julho">
                    <label for="Agosto">Agosto</label>
                    <input type="checkbox" value="8" name="Agosto" id="Agosto">
                    <label for="Setembro">Setembro</label>
                    <input type="checkbox" value="9" name="Setembro" id="Setembro">
                    <label for="Outubro">Outubro</label>
                    <input type="checkbox" value="10" name="Outubro" id="Outubro">
                    <label for="Novembro">Novembro</label>
                    <input type="checkbox" value="11" name="Novembro" id="Novembro">
                    <label for="Dezembro">Dezembro</label>
                    <input type="checkbox" value="12" name="Dezembro" id="Dezembro">                    
                </div>


                <label for="valor">Valor</label>

                <input type="text" id="valor" name="valor" placeholder="R$" required>

                <label for="data">Data</label>

                <input type="text" name="data" id="data" placeholder="Data de pagamento" required>

                <p>Conta recorrente?</p>
                
                <button id="mes" class="abrirMes" onclick="AbriModel()"type="button">Selecionar conta recorrente</button>
                <button type="submit">Incluir</button>
               
            </form>

        </div>
    </main>
    

    <footer>
        <p>Desenvolvido por  </p> <img src="/app/img/LogoDev.png" alt=""> 
    </footer>
</body>

    <script src="../../js/menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <script>        
    
        $('#valor').mask('000.000.000.000.000,00', {reverse: true});
        $('#data').mask('00/00/0000');</script>

</html>