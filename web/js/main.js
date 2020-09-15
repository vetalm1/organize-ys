
$(function(){
    // инициализации подсказок для всех элементов на странице, имеющих атрибут data-toggle="tooltip"
    $('[data-toggle="tooltip"]').tooltip();
});



$('.add-to-base').on('click', function ()
 {
    let key = $(this).data('key');
    let date = $('.date').text();
    let startTime = '.input-start'+key;
    let endTime = '.input-end'+key;
    let description = '.input-desc'+key;
    description = $(description).val();
    //startTime = $('.date').text()+' '+$(startTime).val()+':00';
    //endTime = $('.date').text()+' '+$(endTime).val()+':00';
    startTime = $(startTime).val();
    endTime = $(endTime).val();

    let arr = {
        'date': date,
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