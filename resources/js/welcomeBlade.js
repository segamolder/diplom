window.onload = function () {

    var showDialog = function (value) {
        document.querySelector('.dialog__title').innerHTML = value.innerHTML;
        document.querySelector('.dialog__submit').innerHTML = value.innerHTML;
        dialog.show();
        if (value == signIn && document.querySelector('.dialog__email') == null) { //Если клик по Зарегистрироваться вызывает функцию то выполняется условие
            //Вставляем в форму новый input до кнопки submit
            var newInput = document.querySelector('.dialog__form').insertBefore(document.createElement('input'), document.querySelector('.dialog__submit'));
            //добавляем input'у класс, тип, и плейсхолдер
            newInput.className = "dialog__email";
            newInput.type = "email";
            newInput.placeholder = "E-mail"
        }
        if (value == logIn && document.querySelector('.dialog__email') != null) {
            document.querySelector('.dialog__form').removeChild(document.querySelector('.dialog__email'))
        }
    }

    var logIn = document.querySelector('#logIn');
    var signIn = document.querySelector('#signIn');
    var dialog = document.querySelector('dialog');
    
    
    logIn.onclick = function () {
        showDialog(logIn);
    }

    signIn.onclick = function () {
        showDialog(signIn);
    }

    document.querySelector('.dialog__close').onclick = function () {
        dialog.close();
    }
}
// // // // 
 
