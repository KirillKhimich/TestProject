$('#finderInput').bind("change keyup input click",function () {
    let txtlen = $(this).val().length;
    const inputValue = $(this).val();
    if (txtlen >= 3){
               $.get({
                   url:"../result.php",
                   data:{finderInput: inputValue},
                   datatype:"json",
                   success: function(data){
                       let answer = $.parseJSON(data);
                       if (answer.result == "error"){
                           $('div').empty();
                           $('div').append("Совпадений не найдено");
                           return false
                       }else{
                       $('div').empty();
                       $.each(answer, function(key,value) {
                           let replace = value.body.replace(inputValue,"<span>" + inputValue+"</span>");
                           let result = `<h3>Название поста:<br/> ${value.title}</h3> 
                                    <p>Комментарий к посту: <br/> ${replace}</p><hr/>`
                           $('div').append(result);
                       });
                       }
                   }
           })
    }else{
        $('div').empty();
    }
});
//Кнопка подтверждения удаления
$('.delete').click(function (){
    $('#darkWindow').show('slow');
    $('#confirmDeleteBlock').show('slow');
    let deleteId = $(this).attr('data-id');
    $('#confirmDeleteButton').click(function (){
        $.post({
            url: "../../index.php",
            data: {deleteId},
            datatype: "json",
            success: function () {
                location.reload();
            }
        })
    })
    return false;
});

$('#darkWindow').click(function () {
    $('#darkWindow').hide('slow');
    $('#confirmDeleteBlock').hide('slow');

})
$('#closeBlock').click(function () {
    $('#darkWindow').hide('slow');
    $('#confirmDeleteBlock').hide('slow');
    return false;
});

//Скрипт для добавления категории
$('#createCategoryForm').submit(function () {
    let count = $('#createCategory').val().length;
    if (count > 0){
            $.post({
                url:"../../index.php",
                data: $("#createCategoryForm").serialize(),
                datatype:"json",
                success: function () {
                    location.reload();
                }
            })
    }else{
        $('.invalid-feedback').show(500);
    }
    return false;
})
//Скрипт для добавления тега
$('#createTagForm').submit(function () {
    let count = $('#createTag').val().length;
    if (count > 0){
        $.post({
            url:"../../index.php",
            data: $("#createTagForm").serialize(),
            datatype:"json",
            success: function () {
                location.reload();
            }
        })
    }else {
        $('.invalid-feedback').show(500);
    }
    return false;
})

$('#createMaterialForm').submit(function (){
        let selectTagId =  $('#selectTagId').val();
        let selectCategoryId = $('#selectCategoryId').val();
        let input = $('#inputMaterialInput').val() ;
        console.log(selectTagId);
        console.log(selectCategoryId);
        console.log(input)

    return false;
})