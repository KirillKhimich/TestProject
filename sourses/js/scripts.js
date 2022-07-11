$('#finderInput').on("change input ",function () {
    let txtlen = $(this).val().length;
    const inputValue = $(this).val();

    $('.table .searchTd').each(function(){
        let i = 0;
        ($(this).html());
    });
    if (txtlen > 0){

    }
});
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}
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

});

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
});
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
});

$('#createMaterialForm').submit(function (){
        let selectTypeId =  $('#selectTypeId').val().split('/');
        let selectCategoryId = $('#selectCategoryId').val().split('/');
        let inputName = $('#inputMaterialName').val().length;
        if (selectTypeId[1] < 1 ){
            $('#invalid-feedback-tag').show(500);
        }
        if (selectCategoryId[1] < 1 ){
            $('#invalid-feedback-category').show(500);
        }
        if (inputName < 1){
            $('#invalid-feedback-name').show(500)
        }
        if (selectCategoryId[1] > 0 && selectTypeId[1] > 0 && inputName > 0){
            $.post({
                url:"../../index.php",
                data: $("#createMaterialForm").serialize(),
                datatype:"json",
                success: function () {
                    location.reload();
                }
            })
        }
    return false;
});
$('#addTagButton').click(function (){
        let selectAddTag = $('#selectAddTag').val().split('/');
        if (selectAddTag[1] > 0){
            $.post({
                url:"../../index.php",
                data:{selectAddTag : selectAddTag},
                datatype:"json",
                success: function () {
                    location.reload();
                }
            })
       }
});
$('#materialId').click(function () {
    let addLinksLink = $('#addLinksLink').val();
    let addLinksTitle = $('#addLinksTitle').val();
    let checkOnUrl = addLinksLink.match(/(^http:\/\/)|(^www)|(https:\/\/)/) != null;
    let checkGETId = $.urlParam("viewMaterialId")
    if (addLinksLink.length > 0){
        if (checkOnUrl === true) {
            $.post({
                url: "../../index.php",
                data: {addLinksLink : addLinksLink,addLinksTitle: addLinksTitle,checkGETId:checkGETId},
                datatype: "json",
                success: function () {
                    location.reload();
                }
            })
        }else{
            $('#invalidFeedbackField').hide(500);
            $('#invalidFeedbackLink').show(500);
        }
    }else{
        $('#invalidFeedbackLink').hide(500);
        $('#invalidFeedbackField').show(500);
    }
    return false;
})