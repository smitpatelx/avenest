$(document).ready(()=>{
    // Notiflix.Notify.Init({ distance:"50px", info: {background:"#0c82d8",}, }); 
    // Notiflix.Notify.Success('Sol lucet omnibus');
    // Notiflix.Loading.Init({ svgColor:"#0365f3", }); 
    // Notiflix.Loading.Pulse();
    // Notiflix.Loading.Remove(500);

    var htrigger = $('#trigger');
    var htarget = $('#target');

    htrigger.click(()=>{
        if(htarget.hasClass('hidden')){
            htarget.addClass('flex').removeClass('hidden');
        } else if (htarget.hasClass('flex')){
            htarget.addClass('hidden').removeClass('flex');
        }
    });

    $(document).mouseup(function(e) {
    // if the target of the click isn't the container nor a descendant of the container
        if (!htrigger.is(e.target) && htrigger.has(e.target).length === 0) 
        {
            htarget.addClass('hidden').removeClass('flex');
        }
    });
});