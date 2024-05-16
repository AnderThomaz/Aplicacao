function importarMenu () {
    fetch('../html/menu.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('menu').innerHTML = data;

        })
        .catch(error => console.log('Erro ao Importar o Menu:' . error))
}

window.addEventListener('DOMContentLoaded', importarMenu)