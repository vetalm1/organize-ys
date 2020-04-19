
$('.add-to-base').on('click', function () {
    let key = $(this).data('key');
    let startTime = '.input-start'+key;
    let endTime = '.input-end'+key;
    let description = '.input-desc'+key;
    description = $(description).val();
    startTime = $('.date').text()+' '+$(startTime).val()+':00';
    endTime = $('.date').text()+' '+$(endTime).val()+':00';

   // alert (key+'------'+startTime+'==='+endTime+'   '+description);
    let arr = {
        'start_time': startTime,
        'end_time': endTime,
        'description': description
    }  // т.к. форму делали сами создаем массив тоже руками
    $.ajax({
        url: 'unit/register',
        data: {Register: arr},

        type: 'POST',
        success: function (res) {
            if(!res) alert('Ошибка');
            console.log(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
});

//$(id_button).attr('style', 'display:none')