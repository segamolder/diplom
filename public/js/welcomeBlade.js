/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/welcomeBlade.js":
/*!**************************************!*\
  !*** ./resources/js/welcomeBlade.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.onload = function () {
  var showDialog = function showDialog(value) {
    document.querySelector('.dialog__title').innerHTML = value.innerHTML;
    document.querySelector('.dialog__submit').innerHTML = value.innerHTML;
    dialog.show();

    if (value == signIn && document.querySelector('.dialog__email') == null) {
      //Если клик по Зарегистрироваться вызывает функцию то выполняется условие
      //Вставляем в форму новый input до кнопки submit
      var newInput = document.querySelector('.dialog__form').insertBefore(document.createElement('input'), document.querySelector('.dialog__submit')); //добавляем input'у класс, тип, и плейсхолдер

      newInput.className = "dialog__email";
      newInput.type = "email";
      newInput.placeholder = "E-mail";
    }

    if (value == logIn && document.querySelector('.dialog__email') != null) {
      document.querySelector('.dialog__form').removeChild(document.querySelector('.dialog__email'));
    }
  };

  var logIn = document.querySelector('#logIn');
  var signIn = document.querySelector('#signIn');
  var dialog = document.querySelector('dialog');

  logIn.onclick = function () {
    showDialog(logIn);
  };

  signIn.onclick = function () {
    showDialog(signIn);
  };

  document.querySelector('.dialog__close').onclick = function () {
    dialog.close();
  };
};

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**********************************************************************!*\
  !*** multi ./resources/js/welcomeBlade.js ./resources/sass/app.scss ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! W:\domains\DIPLOM\resources\js\welcomeBlade.js */"./resources/js/welcomeBlade.js");
module.exports = __webpack_require__(/*! W:\domains\DIPLOM\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });