$(document).ready(function () {

// Получаем элемент текстового поля
    var field_name = document.getElementById("field_name");

// Добавляем обработчик события ввода
    field_name.addEventListener("input", function (e) {
        // При вводе текста запускаем функцию толькоLettersSpacesDashes
        field_name.value = onlyLettersSpacesDashes(field_name.value);
    });

    function onlyLettersSpacesDashes(e) {
        // Допускаются только буквы, пробелы и тире
        var regex = /[^a-zA-Zа-яА-Я-]/g;

        // Заменяем все недопустимые символы на пустую строку
        var result = e.replace(regex, "");

        // Возвращаем замененный результат
        return result;
    }
})
