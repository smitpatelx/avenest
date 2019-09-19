$(document).ready(()=>{
    Notiflix.Notify.Init({ distance:"100px", info: {background:"#0c82d8",}, }); 
    // Notiflix.Notify.Success('Sol lucet omnibus');
    Notiflix.Loading.Init({ svgColor:"#0365f3", }); 
    Notiflix.Loading.Pulse();
    Notiflix.Loading.Remove(500);
});