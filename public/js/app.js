/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

// require('./bulma');
// require('./modal');
// require('./dropdown');
// utility
$(window).on('load', function () {
  if (feather) {
    feather.replace({
      width: 14,
      height: 14
    });
  }
}); // loading page

$(function () {
  $('.pageloader').removeClass('is-active');
}); // select2

if ($('.select2')[0]) {
  $('.select2').select2();
} // disabled button on form submit


$('form').submit(function () {
  if ($(this).attr('this-disabled-button') == undefined) {
    $('button[type="submit"]').attr('disabled', 'disabled');
  }
});

setPageLoading = function setPageLoading() {
  var _boolean = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

  if (_boolean) {
    $('.pageloader').addClass('is-active');
  } else {
    $('.pageloader').removeClass('is-active');
  }
}; // end Utility
// confirm


confirm = function confirm(title, text, then) {
  var confirmButtonText = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : 'OK';
  var cancelButtonText = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : 'Batal';
  Swal.fire({
    title: title === 'default' ? 'Apakah Anda yakin?' : title,
    text: text,
    icon: 'warning',
    showCancelButton: true,
    // confirmButtonColor: 'hsl(217, 71%, 53%)',
    // cancelButtonColor: '#d33',
    confirmButtonText: confirmButtonText,
    cancelButtonText: cancelButtonText
  }).then(function (result) {
    if (result.isConfirmed) {
      then();
    }
  });
}; // ajax delete


ajaxDelete = function ajaxDelete(route, csrf_token) {
  var redirect = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'reload';
  setPageLoading();
  $.ajax({
    url: route,
    type: 'DELETE',
    data: {
      _token: csrf_token
    },
    success: function success(response) {
      if (response.status === 'success') {
        if (redirect == 'reload') {
          window.location.reload();
        } else {
          window.location.href = redirect;
        }
      } else {
        setPageLoading(false);
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: response.message
        });
      }
    },
    error: function error(response) {
      setPageLoading(false);
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Terjadi kesalahan saat menghapus data.'
      });
    }
  });
}; // select2 pagination


select2Pagination = function select2Pagination(element, route) {
  var parameters = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
  var modal = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
  $(element).select2({
    dropdownParent: modal,
    ajax: {
      url: route,
      data: function data(params) {
        var query = {
          cari: params.term,
          page: params.page || 1
        };
        $.extend(query, parameters);
        return query;
      },
      processResults: function processResults(response, params) {
        return {
          results: response.data,
          pagination: {
            more: (params.page || 1) * response.meta.per_page < response.meta.total
          }
        };
      },
      dataType: 'json'
    }
  });
};

logout = function logout(route) {
  confirm('default', 'Anda akan mengakhiri sesi.', function () {
    setPageLoading();
    window.location.href = route;
  }, 'Ya, Keluar');
};

toastSuccess = function toastSuccess(message) {
  toastr.success(message, "Success!", {
    closeButton: true,
    tapToDismiss: false,
    progressBar: true
  });
};

toastFailed = function toastFailed(message) {
  toastr.error(message, "Error!", {
    closeButton: true,
    tapToDismiss: false,
    progressBar: true
  });
};

alertSuccess = function alertSuccess(message) {
  Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: message
  });
};

alertFailed = function alertFailed(message) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: message
  });
};

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;