document.getElementById("SelectMes").addEventListener("change", function() {
    var selectedOption = this.value;
    console.log("Opção selecionada:", selectedOption);


    fetch('../BackEnd/app/selecao_menu.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ selectedOption: selectedOption })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro ao enviar a variável para PHP');
        }
        return response.text();
    })
    .then(data => {
        console.log('Resposta do PHP:', data);
    })
    .catch(error => {
        console.error('Erro:', error);
    });
    setTimeout(function() {
        location.reload();  
    }, 200);

    
    
});


