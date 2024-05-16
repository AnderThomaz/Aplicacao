

var abrirMenu = document.getElementById('iconmenu');
var fecharMenu = document.getElementById('closemenu');
var menu = document.querySelector('.menu');

function toggleMenu() {
    if (menu.style.left === '-370px' || menu.style.display === '') 
        {
            menu.style.left = '0';
            document.addEventListener('click', AutoCloseMenu);
        }
    } 


function closedmenu() {
    if (menu.style.left === '0' || menu.style.display === '')

        {
            menu.style.left = '-370px';
            document.removeEventListener('click', AutoCloseMenu);

        }
} 

function AutoCloseMenu(event) {
    // o menu só será fechado quando o clique ocorrer fora do ícone de abertura, do ícone de fechamento e do próprio menu. Isso deve resolver o problema que você está enfrentando.
    if (!abrirMenu.contains(event.target) && !fecharMenu.contains(event.target) && !menu.contains(event.target))

    {
        menu.style.left = '-370px';
        document.removeEventListener('click', AutoCloseMenu);
    }
}

fecharMenu.onclick = closedmenu;
abrirMenu.onclick = toggleMenu;

