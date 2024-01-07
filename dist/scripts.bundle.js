/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./js/bootstrap-fixes.js":
/*!*******************************!*\
  !*** ./js/bootstrap-fixes.js ***!
  \*******************************/
/***/ (() => {

eval("/**\n * For some reasons, dismissing Bootstrap modal using HTML attributes \n * isn't working, that's why I've written this script\n */\n// JavaScript to dismiss modal on button click\nvar dismissButton = document.querySelector('.btn-bs-close');\nif (dismissButton) {\n  dismissButton.addEventListener('click', function () {\n    var modal = document.querySelector('.modal');\n\n    /*\n    - This doesn't work\n    -------------------\n    const bootstrapModal = new bootstrap.Modal(modal);\n    bootstrapModal.hide();\n    */\n\n    /**\n     * - Hidding the modal manually\n     * (But it doesn't work properly as we need to click the trigger button twice to relaunch the modal a second time)\n     */\n    // Remove 'show' class\n    modal.classList.remove('show');\n\n    // Set display to 'none' after 200ms\n    // Remove 'modal-open' class from body after 200ms\n    // Remove the modal-backdrop element\n    setTimeout(function () {\n      modal.style.display = 'none';\n      document.body.classList.remove('modal-open');\n\n      // Remove the modal-backdrop element\n      var backdrop = document.querySelector('.modal-backdrop');\n      backdrop.parentNode.removeChild(backdrop);\n    }, 200);\n\n    // Remove 'aria-hidden' attribute\n    modal.removeAttribute('aria-hidden');\n  });\n}\n\n//# sourceURL=webpack://Eric_Njanga_2024/./js/bootstrap-fixes.js?");

/***/ }),

/***/ "./js/fixed-sidebar.js":
/*!*****************************!*\
  !*** ./js/fixed-sidebar.js ***!
  \*****************************/
/***/ (() => {

eval("var fixedSideBar = document.querySelector('.fixed-sidebar.is-sticky');\nif (fixedSideBar) {\n  window.addEventListener('scroll', function () {\n    var threshold = 540; // Adjust the threshold value as needed\n\n    if (window.scrollY >= threshold) {\n      fixedSideBar.style.display = 'block';\n      fixedSideBar.style.position = 'fixed';\n    } else {\n      fixedSideBar.style.display = 'none';\n    }\n  });\n}\n\n//# sourceURL=webpack://Eric_Njanga_2024/./js/fixed-sidebar.js?");

/***/ }),

/***/ "./js/main.js":
/*!********************!*\
  !*** ./js/main.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _scrollToTop_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scrollToTop.js */ \"./js/scrollToTop.js\");\n/* harmony import */ var _scrollToTop_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_scrollToTop_js__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _sidebarScrollSpy_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sidebarScrollSpy.js */ \"./js/sidebarScrollSpy.js\");\n/* harmony import */ var _sidebarScrollSpy_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_sidebarScrollSpy_js__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _bootstrap_fixes_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./bootstrap-fixes.js */ \"./js/bootstrap-fixes.js\");\n/* harmony import */ var _bootstrap_fixes_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_bootstrap_fixes_js__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _fixed_sidebar_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./fixed-sidebar.js */ \"./js/fixed-sidebar.js\");\n/* harmony import */ var _fixed_sidebar_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_fixed_sidebar_js__WEBPACK_IMPORTED_MODULE_3__);\n\n\n// Files import\n// scripts ...\n\n\n\n\n\n//# sourceURL=webpack://Eric_Njanga_2024/./js/main.js?");

/***/ }),

/***/ "./js/scrollToTop.js":
/*!***************************!*\
  !*** ./js/scrollToTop.js ***!
  \***************************/
/***/ (() => {

eval("// JavaScript code for scrolling back to top \n\nvar btnBackToTop = document.querySelector('.btn-back-to-top');\nfunction scrollToTop() {\n  document.body.scrollTop = 0; // For Safari\n  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera\n}\n\nif (btnBackToTop) {\n  // Show/hide back-to-top button based on scroll position\n  window.onscroll = function () {\n    // var button = document.querySelector('.btn-back-to-top');\n    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {\n      btnBackToTop.style.display = 'block';\n    } else {\n      btnBackToTop.style.display = 'none';\n    }\n  };\n  btnBackToTop.addEventListener('click', function (event) {\n    // Preventing the default behavior of the button (e.g., preventing form submission)\n    event.preventDefault();\n    scrollToTop();\n  });\n}\n\n//# sourceURL=webpack://Eric_Njanga_2024/./js/scrollToTop.js?");

/***/ }),

/***/ "./js/sidebarScrollSpy.js":
/*!********************************!*\
  !*** ./js/sidebarScrollSpy.js ***!
  \********************************/
/***/ (() => {

eval("/**\n * ABOUT THIS SCRIPT\n * ---------------------------\n * Activate nav items when target element appears inside the viewport\n * (This script was created because bootstrap scrolspy wan't working)\n */\n\n/**\n * \n * @param {*} element \n * @param {*} windowH \n * @param {*} thresholdPercentage From 0.0 to 1.0\n * @returns \n */\nfunction isAboveTheThreshold(elementDimension, windowH, thresholdPercentage) {\n  var distanceFromBottom = windowH - elementDimension.bottom;\n\n  // Calculate the 30% threshold from the bottom\n  var threshold = windowH * thresholdPercentage;\n  return distanceFromBottom >= threshold;\n}\n\n// Function to check if an element is in the viewport, and is above the threshold\nfunction isInViewport(elem) {\n  var rect = elem.getBoundingClientRect();\n  var windowHeight = window.innerHeight || document.documentElement.clientHeight;\n  return rect.top >= 0 && rect.left >= 0 && rect.bottom <= windowHeight && rect.right <= (window.innerWidth || document.documentElement.clientWidth) && isAboveTheThreshold(rect, windowHeight, 0.3);\n}\n\n/**\n * Toggles the .active class on anchor (<a>) elements when the element with the \n * id referenced by the anchor’s href is scrolled into view.\n * @param {*} DomEltList \n */\nfunction handleScroll(DomEltList) {\n  DomEltList.forEach(function (item) {\n    var targetId = item.getAttribute('href').substring(1); // Get the ID without '#'\n    var targetElement = document.getElementById(targetId);\n    if (targetElement && isInViewport(targetElement)) {\n      // Remove .active class from all items\n      DomEltList.forEach(function (link) {\n        return link.classList.remove('active');\n      });\n      // Add .active class to the corresponding item\n      item.classList.add('active');\n    }\n  });\n}\ndocument.addEventListener(\"DOMContentLoaded\", function () {\n  // Get all anchor elements inside the list-example\n  var listItems = document.querySelectorAll('#nav-expertise a');\n\n  // ...\n  handleScroll(listItems);\n\n  // Attach scroll event listener to the window\n  window.addEventListener('scroll', function () {\n    handleScroll(listItems);\n  });\n});\n\n//# sourceURL=webpack://Eric_Njanga_2024/./js/sidebarScrollSpy.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./js/main.js");
/******/ 	
/******/ })()
;