if('serviceWorker' in navigator){
    navigator.serviceWorker.register('./js/sw.js')
    .then(reg=>console.log('SW funcinando', reg))
    .catch(err=>console.log('Error al registrar el SW', err))
}else{
    console.log('Su navegador no soporta SW');
}