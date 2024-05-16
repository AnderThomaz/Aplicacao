// Selecionando o elemento de input
var inputNumero = document.getElementById('valor');

const formatter = new Intl.NumberFormat("pt-BR", {
    style: "currency",
    currency: "BRL",
    minimumFractionDigits: 2,
})

currency.innerHTML = formatter.format('value')