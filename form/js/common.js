$(function(){
    $('#form').submit(function(e){
       var errors = false;
       $(this).find('span').empty();

       $(this).find('input').each(function(){
           if($.trim($(this).val()) == '') {
               errors = true;
               $(this).next().text('Не заполнено поле ' + $(this).prev().text());
           }
       });

       if(!errors) {
           var data = $('#form').serialize();
           $.ajax({
               url: '../send.php',
               type: 'POST',
               data: data,
               beforeSend: function() {
                   $('button').next().text('Отправляю...');
               },
               success: function(res) {
                   if(res) {
                       $('#form').find('input').val('');
                       $('button').next().empty();
                       alert('Письмо отправлено');
                   }
               },
               error: function() {
                   alert('Ошибка!');
               }
           });
       }

        e.preventDefault();
    });
});