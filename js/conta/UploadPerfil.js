var AbrirUpload = document.getElementById('uploadBut') // botao de abrir Upload
var modelUpload = document.getElementById('UploadImg') // tela de model UploadImg 
var model = document.getElementById('model') // tela do model 

function abrir_UploadPefil() {
    if(modelUpload.style.display === 'none' || modelUpload.style.display === '') 
    {
        modelUpload.style.display = 'block';
        document.addEventListener('click', FecharModel)
    }
}


function FecharModel(event)  {
    if(!AbrirUpload.contains(event.target) && !model.contains(event.target) ) 
    {
        modelUpload.style.display = 'none';
        document.removeEventListener('click', FecharModel)
    }
}


AbrirUpload.onclick = abrir_UploadPefil;
