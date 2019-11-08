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

    var path = window.location.pathname.split("/").pop();
    // Account for home page with empty path
    if (path == '') {
        path = 'index.php';
    }

    var target = $('#target > a[href="./' + path + '"]');
    // Add active class to target link
    target.removeClass('text-gray-500').addClass('text-blue-600');

});

window.onbeforeunload = function () {
    window.scrollTo(0,0);
};