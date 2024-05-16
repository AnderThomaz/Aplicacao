function enviarDados() {
    var email = document.getElementById ("email").value;

const caminho = "../php/recuperar_senha.php"
let res=fetch(caminho)

.then(res=>res.json())
.then(dados=>{
    console.log(dados)
})

}