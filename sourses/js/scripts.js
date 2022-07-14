//Функция для проверки GET запроса
$.urlParam = function(name){
    let results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}
//Кнопка подтверждения удаления
$('.delete').click(function (){
    let deleteId = $(this).attr('data-id');
    $('#confirmDeleteButton').click(function (){
        $.post({
            url: "/index.php",
            data: {deleteId},
            datatype: "json",
            success: function () {
                location.reload()
            }
        })
    })
    return false;
});
//Скрипт для добавления категории
$('#createCategoryForm').submit(function () {
    let count = $('#createCategory').val().length;
    if (count > 0){
            $.post({
                url:"/index.php",
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
            url:"/index.php",
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
//Скрипт для добавления материала
$('#createMaterialForm').submit(function (){
        let selectTypeId =  $('#selectTypeId').val();
        let selectCategoryId = $('#selectCategoryId').val();
        let inputName = $('#inputMaterialName').val().length;
        if (selectTypeId < 1 ){
            $('#invalidFeedbackType').show(500);
        }
        if (selectCategoryId < 1 ){
            $('#invalidFeedbackCategory').show(500);
        }
        if (inputName < 1){
            $('#invalidFeedbackName').show(500)
        }
        if (selectCategoryId > 0 && selectTypeId > 0 && inputName > 0){
            $.post({
                url:"/index.php",
                data: $("#createMaterialForm").serialize(),
                datatype:"json",
                success: function () {
                    location.reload();
                }
            })
        }
    return false;
});
//Добавление тега в материал
$('#addTagButton').click(function (){
        let selectAddTag = $('#selectAddTag').val();
        let checkGETId = $.urlParam("viewMaterialId")
        if (selectAddTag > 0){
            $.post({
                url:"/index.php",
                data:{selectAddTag : selectAddTag,checkGETId:checkGETId},
                datatype:"json",
                success: function () {
                    location.reload()
                }
            })
       }
});
//Добавление ссылки в материал
$('#addMaterialLink').click(function () {
    let addLinksLink = $('#addLinksLink').val();
    let addLinksTitle = $('#addLinksTitle').val();
    let checkOnUrl = addLinksLink.match(/(^http:\/\/)|(^www)|(https:\/\/)/) != null;
    let checkGETId = $.urlParam("viewMaterialId")
    if (addLinksLink.length > 0){
        if (checkOnUrl === true) {
            $.post({
                url: "/index.php",
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
//Обновление Категории
$('#formUpdateCategory').submit(function (){
    let selectUpdateCategory = $('#selectUpdateCategory').val()
    let inputUpdateCategory = $('#inputUpdateCategory').val().length;
    if (selectUpdateCategory < 1){
        $('#updateInvalidSelectCategory').show(500);
    }
    if (inputUpdateCategory < 1){
        $('#updateInvalidInputCategory').show(500);
    }
    if (selectUpdateCategory > 0 && inputUpdateCategory > 0) {
        $.post({
            url: "/index.php",
            data: $(this).serialize(),
            datatype: "json",
            success: function () {
                location.reload()
            }
        })
    }
   return false;
});
//Обновление тега
$('#formUpdateTag').submit(function (){
    let selectUpdateTag = $('#selectUpdateTag').val()
    let inputUpdateTag = $('#inputUpdateTag').val().length;
    if (selectUpdateTag < 1){
        $('#updateInvalidSelectTag').show(500);
    }
    if (inputUpdateTag < 1){
        $('#updateInvalidInputTag').show(500);
    }
    if (selectUpdateTag > 0 && inputUpdateTag > 0) {
        $.post({
            url: "/index.php",
            data: $(this).serialize(),
            datatype: "json",
            success: function () {
                location.reload();
            }
        })
    }
    return false;
});
//Обновление материала
$('#updateMaterialForm').submit(function (){
    let updateMaterialId =  $('#updateMaterialId').val();
    let updateTypeId = $('#updateTypeId').val();
    let updateCategoryId = $('#updateCategoryId').val();
    let inputUpdateMaterialName = $('#inputUpdateMaterialName').val().length;
    if (updateMaterialId < 1 ){
        $('#invalidFeedbackUpdateMaterial').show(500);
    }
    if (updateTypeId < 1 ){
        $('#invalidFeedbackUpdateType').show(500);
    }
    if (updateCategoryId < 1 ){
        $('#invalidFeedbackUpdateCategory').show(500);
    }
    if (inputUpdateMaterialName < 1){
        $('#invalidFeedbackUpdateName').show(500)
    }
    if (updateMaterialId > 0 && updateTypeId > 0 && updateCategoryId > 0 && inputUpdateMaterialName > 0){
        $.post({
            url:"/index.php",
            data: $("#updateMaterialForm").serialize(),
            datatype:"json",
            success: function () {
                location.reload();
            }
        })
    }
    return false;
});
// обновление ссылки в материале
$('.editLink').click(function (){
    let linkId = $(this).attr('data-id');
    let link = document.getElementById(linkId);
    let linkLink = $(link).attr('href');
    let linkTitle = $(link).attr('data-id');
    $('#updateLinksLink').val(linkLink);
    $('#updateLinksTitle').val(linkTitle);
    $('#updateMaterialLink').click(function () {
        let updateLinksLink = $('#updateLinksLink').val();
        let updateLinksTitle = $('#updateLinksTitle').val();
        let checkOnUrl = updateLinksLink.match(/(^http(s)?:\/\/)/) != null;
        if (updateLinksLink.length > 0){
            if (checkOnUrl === true) {
                $.post({
                    url: "/index.php",
                    data: {updateLinksLink : updateLinksLink,updateLinksTitle: updateLinksTitle,linkId:linkId},
                    datatype: "json",
                    success: function () {
                        location.reload()
                    }
                })
            }
            else{
                $('#invalidUpdateFeedbackField').hide(500);
                $('#invalidUpdateFeedbackLink').show(500);
            }
        }else{
            $('#invalidUpdateFeedbackLink').hide(500);
            $('#invalidUpdateFeedbackField').show(500);
        }
        return false;
    })
})
