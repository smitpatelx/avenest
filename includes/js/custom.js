$(document).ready(()=>{
    // Notiflix.Notify.Init({ distance:"50px", info: {background:"#0c82d8",}, }); 
    // Notiflix.Notify.Success('Sol lucet omnibus');
    // Notiflix.Loading.Init({ svgColor:"#0365f3", }); 
    // Notiflix.Loading.Pulse();
    // Notiflix.Loading.Remove(500);

    var htrigger = $('#trigger');
    var htarget = $('#target');

    htrigger.mouseenter(()=>{
        htarget.removeClass( "hidden" ).addClass( "flex" );
    });

    htrigger.mouseleave(()=>{
        htarget.removeClass( "flex" ).addClass( "hidden" );
    });
});