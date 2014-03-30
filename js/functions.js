function Genelate_password(){
    var length   = 7;                                                   // Длинна пароля
    var charset  = "abcdefghjknprstuwxzABCDEFGHJKMNPRSTUVWXYZ2345678";  // Допустимые симфолы в пароле

    // Обнуление поля
    $("#User_password").val('');

    // Генерация пароля
    for (var i = 0, n = charset.length; i < length; ++i)
        $("#User_password").val($("#User_password").val() + charset.charAt(Math.floor(Math.random() * n)));
}

function addTableRow(jQtable){
    $('#example tr').each(function(row, e) {
        if ($(this).css('display') == 'none'){
            $(this).css({'display' : 'table-row'});
            exit;
        }
    });
}