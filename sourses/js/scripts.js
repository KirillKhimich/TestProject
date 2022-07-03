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
})
