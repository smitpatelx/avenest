$(document).ready(()=>{

    //On load always scroll to top
    window.onbeforeunload = function () {
        window.scrollTo(0,0);
    };

    // var htrigger = $('#trigger');
    // var htarget = $('#target');

    // htrigger.click(()=>{
    //     if(htarget.hasClass('hidden')){
    //         htarget.addClass('flex').removeClass('hidden');
    //     } else if (htarget.hasClass('flex')){
    //         htarget.addClass('hidden').removeClass('flex');
    //     }
    // });

    // $(document).mouseup(function(e) {
    //     // if the target of the click isn't the container nor a descendant of the container
    //     if (!htrigger.is(e.target) && htrigger.has(e.target).length === 0) 
    //     {
    //         htarget.addClass('hidden').removeClass('flex');
    //     }
    // });

    // var path = window.location.pathname.split("/").pop();
    // // Accounts for home page with empty path
    // if (path == '') {
    //     path = 'index.php';
    // }

    // var target = $('#target > a[href="./' + path + '"]');
    // // Add active class to target link
    // target.removeClass('text-gray-500').addClass('text-blue-600');

    //Select all
    // var button_sa = $('.select-all-chk');
    // $('.select-all-chk').on('click',()=>{
    //     // var checkBoxes = $(this).parents().eq(1).find('input[type=checkbox]');
    //     var checkBoxes = $(this).parents();
    //     console.log($(checkBoxes));
    //     // checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    // });

    
});

//Handles Checkbox logic
const checkbox_all = (that)=>{
    var checkBoxes = $(that).parents(".parent-ch").eq(0).find('input[type=checkbox]');
    checkBoxes.prop("checked", !checkBoxes.prop("checked"));
}