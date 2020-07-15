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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 20);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _jquery = __webpack_require__(0);

var _jquery2 = _interopRequireDefault(_jquery);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// category hover
(0, _jquery2.default)(function () {

  (0, _jquery2.default)('[data-callout-hover-reveal]').hover(function () {
    (0, _jquery2.default)(this).find('.callout-footer').slideDown(250);
  }, function () {
    (0, _jquery2.default)(this).find('.callout-footer').slideUp(250);
  });

  // // // // // //
  // scroll to top
  // // // // // //

  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,

  //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
  offset_opacity = 1200,

  //duration of the top scrolling animation (in ms)
  scroll_top_duration = 700,

  //grab the "back to top" link
  $back_to_top = (0, _jquery2.default)('.cd-top');

  //hide or show the "back to top" link
  (0, _jquery2.default)(window).scroll(function () {
    (0, _jquery2.default)(this).scrollTop() > offset ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
    if ((0, _jquery2.default)(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass('cd-fade-out');
    }
  });

  //smooth scroll to top
  $back_to_top.on('click', function (event) {
    event.preventDefault();
    (0, _jquery2.default)('body,html').animate({
      scrollTop: 0
    }, scroll_top_duration);
  });
});

// var target = document.getElementById("partners-tabs");
// var options = {}; //Define options e.g. "option1" : "value1", etc.									

// var elem = new Foundation.Tabs($(target), options);
// var elem = $('[data-tabs]');

// // $('[data-tabs]').on('change.zf.tabs', function () {


// $('.tabs-title').on("mouseover", function () {
// 	//Find the associated panel id.
// 	var panelId = $(this).find("a").attr("href").substring(1);
// 	var tabContents = document.getElementById(panelId);
// 	//Use the "tabs" object to select the associated panel.
// 	elem.selectTab($(tabContents));
// 	//Show the tab contents.
// 	$(tabContents).show();
// }).on("mouseout", function () {
// 	var panelId = $(this).find("a").attr("href").substring(1);
// 	$(this).find("a").attr("aria-selected", "false");
// 	var tabContents = document.getElementById(panelId);
// 	//Hide the tab contents.
// 	$(tabContents).hide();
// });


(0, _jquery2.default)('.tabs-title').on("mouseover", function () {

  var $this = this;

  var tab_id = (0, _jquery2.default)($this).find('a').attr('href');

  // https://stackoverflow.com/a/6672579
  (0, _jquery2.default)($this).addClass('is-active') //set the current as active
  .siblings("li") //find sibling h3 elements
  .removeClass("is-active"); // and remove the active from them

  (0, _jquery2.default)(".tabs-content .tabs-panel").siblings().hide();

  (0, _jquery2.default)(".tabs-content .tabs-panel" + tab_id).show();
});

// wordpress video
// https://cfxdesign.com/how-to-make-the-wordpress-video-shortcode-responsive/
(0, _jquery2.default)(function () {
  (0, _jquery2.default)('.mejs-overlay-loading').closest('.mejs-overlay').addClass('load'); //just a helper class

  var $video = (0, _jquery2.default)('div.video video');
  var vidWidth = $video.attr('width');
  var vidHeight = $video.attr('height');

  (0, _jquery2.default)(window).resize(function () {
    var targetWidth = (0, _jquery2.default)(this).width(); //using window width here will proportion the video to be full screen; adjust as needed
    (0, _jquery2.default)('div.video, div.video .mejs-container').css('height', Math.ceil(vidHeight * (targetWidth / vidWidth)));
  }).resize();
});

/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgYzYzOWUzYmQxOTRiY2I0NjM1OTYiLCJ3ZWJwYWNrOi8vL2V4dGVybmFsIFwialF1ZXJ5XCIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sIm5hbWVzIjpbImhvdmVyIiwiZmluZCIsInNsaWRlRG93biIsInNsaWRlVXAiLCJvZmZzZXQiLCJvZmZzZXRfb3BhY2l0eSIsInNjcm9sbF90b3BfZHVyYXRpb24iLCIkYmFja190b190b3AiLCJ3aW5kb3ciLCJzY3JvbGwiLCJzY3JvbGxUb3AiLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0IiwiYW5pbWF0ZSIsIiR0aGlzIiwidGFiX2lkIiwiYXR0ciIsInNpYmxpbmdzIiwiaGlkZSIsInNob3ciLCJjbG9zZXN0IiwiJHZpZGVvIiwidmlkV2lkdGgiLCJ2aWRIZWlnaHQiLCJyZXNpemUiLCJ0YXJnZXRXaWR0aCIsIndpZHRoIiwiY3NzIiwiTWF0aCIsImNlaWwiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhEQUFzRCwrREFBK0Q7O0FBRXJIO0FBQ0E7O0FBRUE7QUFDQTs7Ozs7Ozs7QUM3REEsd0I7Ozs7Ozs7Ozs7QUNBQTs7Ozs7O0FBRUE7QUFDQSxzQkFBRSxZQUFXOztBQUdULHdCQUFFLDZCQUFGLEVBQWlDQSxLQUFqQyxDQUF1QyxZQUFXO0FBQzlDLDBCQUFFLElBQUYsRUFBUUMsSUFBUixDQUFhLGlCQUFiLEVBQWdDQyxTQUFoQyxDQUEwQyxHQUExQztBQUNILEdBRkQsRUFFRyxZQUFXO0FBQ1YsMEJBQUUsSUFBRixFQUFRRCxJQUFSLENBQWEsaUJBQWIsRUFBZ0NFLE9BQWhDLENBQXdDLEdBQXhDO0FBQThDLEdBSGxEOztBQUtFO0FBQ0E7QUFDQTs7QUFFRDtBQUNBLE1BQUlDLFNBQVMsR0FBYjs7QUFDQztBQUNBQyxtQkFBaUIsSUFGbEI7O0FBR0M7QUFDQUMsd0JBQXNCLEdBSnZCOztBQUtDO0FBQ0FDLGlCQUFlLHNCQUFFLFNBQUYsQ0FOaEI7O0FBUUE7QUFDQSx3QkFBRUMsTUFBRixFQUFVQyxNQUFWLENBQWlCLFlBQVU7QUFDeEIsMEJBQUUsSUFBRixFQUFRQyxTQUFSLEtBQXNCTixNQUF4QixHQUFtQ0csYUFBYUksUUFBYixDQUFzQixlQUF0QixDQUFuQyxHQUE0RUosYUFBYUssV0FBYixDQUF5QiwyQkFBekIsQ0FBNUU7QUFDQSxRQUFJLHNCQUFFLElBQUYsRUFBUUYsU0FBUixLQUFzQkwsY0FBMUIsRUFBMkM7QUFDMUNFLG1CQUFhSSxRQUFiLENBQXNCLGFBQXRCO0FBQ0E7QUFDRCxHQUxEOztBQU9BO0FBQ0FKLGVBQWFNLEVBQWIsQ0FBZ0IsT0FBaEIsRUFBeUIsVUFBU0MsS0FBVCxFQUFlO0FBQ3ZDQSxVQUFNQyxjQUFOO0FBQ0EsMEJBQUUsV0FBRixFQUFlQyxPQUFmLENBQXVCO0FBQ3RCTixpQkFBVztBQURXLEtBQXZCLEVBRUtKLG1CQUZMO0FBSUEsR0FORDtBQVNKLENBdkNEOztBQTBDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0Esc0JBQUUsYUFBRixFQUFpQk8sRUFBakIsQ0FBb0IsV0FBcEIsRUFBaUMsWUFBWTs7QUFFNUMsTUFBSUksUUFBUSxJQUFaOztBQUVBLE1BQUlDLFNBQVMsc0JBQUVELEtBQUYsRUFBU2hCLElBQVQsQ0FBYyxHQUFkLEVBQW1Ca0IsSUFBbkIsQ0FBd0IsTUFBeEIsQ0FBYjs7QUFHQTtBQUNBLHdCQUFFRixLQUFGLEVBQ0VOLFFBREYsQ0FDVyxXQURYLEVBQ3dCO0FBRHhCLEdBRUVTLFFBRkYsQ0FFVyxJQUZYLEVBRWlCO0FBRmpCLEdBR0VSLFdBSEYsQ0FHYyxXQUhkLEVBUjRDLENBV2pCOztBQUUzQix3QkFBRSwyQkFBRixFQUErQlEsUUFBL0IsR0FBMENDLElBQTFDOztBQUVBLHdCQUFFLDhCQUE4QkgsTUFBaEMsRUFBd0NJLElBQXhDO0FBRUEsQ0FqQkQ7O0FBbUJBO0FBQ0E7QUFDQSxzQkFBRSxZQUFZO0FBQ2Isd0JBQUUsdUJBQUYsRUFBMkJDLE9BQTNCLENBQW1DLGVBQW5DLEVBQW9EWixRQUFwRCxDQUE2RCxNQUE3RCxFQURhLENBQ3lEOztBQUV0RSxNQUFJYSxTQUFTLHNCQUFFLGlCQUFGLENBQWI7QUFDQSxNQUFJQyxXQUFXRCxPQUFPTCxJQUFQLENBQVksT0FBWixDQUFmO0FBQ0EsTUFBSU8sWUFBWUYsT0FBT0wsSUFBUCxDQUFZLFFBQVosQ0FBaEI7O0FBRUEsd0JBQUVYLE1BQUYsRUFBVW1CLE1BQVYsQ0FBaUIsWUFBWTtBQUM1QixRQUFJQyxjQUFjLHNCQUFFLElBQUYsRUFBUUMsS0FBUixFQUFsQixDQUQ0QixDQUNPO0FBQ25DLDBCQUFFLHNDQUFGLEVBQTBDQyxHQUExQyxDQUE4QyxRQUE5QyxFQUF3REMsS0FBS0MsSUFBTCxDQUFVTixhQUFhRSxjQUFjSCxRQUEzQixDQUFWLENBQXhEO0FBQ0EsR0FIRCxFQUdHRSxNQUhIO0FBSUEsQ0FYRCxFIiwiZmlsZSI6ImN1c3RvbS5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwge1xuIFx0XHRcdFx0Y29uZmlndXJhYmxlOiBmYWxzZSxcbiBcdFx0XHRcdGVudW1lcmFibGU6IHRydWUsXG4gXHRcdFx0XHRnZXQ6IGdldHRlclxuIFx0XHRcdH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIlwiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDIwKTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCBjNjM5ZTNiZDE5NGJjYjQ2MzU5NiIsIm1vZHVsZS5leHBvcnRzID0galF1ZXJ5O1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIGV4dGVybmFsIFwialF1ZXJ5XCJcbi8vIG1vZHVsZSBpZCA9IDBcbi8vIG1vZHVsZSBjaHVua3MgPSAwIDEiLCJpbXBvcnQgJCBmcm9tICdqcXVlcnknO1xuXG4vLyBjYXRlZ29yeSBob3ZlclxuJChmdW5jdGlvbigpIHtcblxuXG4gICAgJCgnW2RhdGEtY2FsbG91dC1ob3Zlci1yZXZlYWxdJykuaG92ZXIoZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmNhbGxvdXQtZm9vdGVyJykuc2xpZGVEb3duKDI1MCk7XG4gICAgfSwgZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmNhbGxvdXQtZm9vdGVyJykuc2xpZGVVcCgyNTApO30pO1xuXG4gICAgICAvLyAvLyAvLyAvLyAvLyAvL1xuICAgICAgLy8gc2Nyb2xsIHRvIHRvcFxuICAgICAgLy8gLy8gLy8gLy8gLy8gLy9cblxuICAgIFx0Ly8gYnJvd3NlciB3aW5kb3cgc2Nyb2xsIChpbiBwaXhlbHMpIGFmdGVyIHdoaWNoIHRoZSBcImJhY2sgdG8gdG9wXCIgbGluayBpcyBzaG93blxuICAgIFx0dmFyIG9mZnNldCA9IDMwMCxcbiAgICBcdFx0Ly9icm93c2VyIHdpbmRvdyBzY3JvbGwgKGluIHBpeGVscykgYWZ0ZXIgd2hpY2ggdGhlIFwiYmFjayB0byB0b3BcIiBsaW5rIG9wYWNpdHkgaXMgcmVkdWNlZFxuICAgIFx0XHRvZmZzZXRfb3BhY2l0eSA9IDEyMDAsXG4gICAgXHRcdC8vZHVyYXRpb24gb2YgdGhlIHRvcCBzY3JvbGxpbmcgYW5pbWF0aW9uIChpbiBtcylcbiAgICBcdFx0c2Nyb2xsX3RvcF9kdXJhdGlvbiA9IDcwMCxcbiAgICBcdFx0Ly9ncmFiIHRoZSBcImJhY2sgdG8gdG9wXCIgbGlua1xuICAgIFx0XHQkYmFja190b190b3AgPSAkKCcuY2QtdG9wJyk7XG5cbiAgICBcdC8vaGlkZSBvciBzaG93IHRoZSBcImJhY2sgdG8gdG9wXCIgbGlua1xuICAgIFx0JCh3aW5kb3cpLnNjcm9sbChmdW5jdGlvbigpe1xuICAgIFx0XHQoICQodGhpcykuc2Nyb2xsVG9wKCkgPiBvZmZzZXQgKSA/ICRiYWNrX3RvX3RvcC5hZGRDbGFzcygnY2QtaXMtdmlzaWJsZScpIDogJGJhY2tfdG9fdG9wLnJlbW92ZUNsYXNzKCdjZC1pcy12aXNpYmxlIGNkLWZhZGUtb3V0Jyk7XG4gICAgXHRcdGlmKCAkKHRoaXMpLnNjcm9sbFRvcCgpID4gb2Zmc2V0X29wYWNpdHkgKSB7XG4gICAgXHRcdFx0JGJhY2tfdG9fdG9wLmFkZENsYXNzKCdjZC1mYWRlLW91dCcpO1xuICAgIFx0XHR9XG4gICAgXHR9KTtcblxuICAgIFx0Ly9zbW9vdGggc2Nyb2xsIHRvIHRvcFxuICAgIFx0JGJhY2tfdG9fdG9wLm9uKCdjbGljaycsIGZ1bmN0aW9uKGV2ZW50KXtcbiAgICBcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICBcdFx0JCgnYm9keSxodG1sJykuYW5pbWF0ZSh7XG4gICAgXHRcdFx0c2Nyb2xsVG9wOiAwICxcbiAgICBcdFx0IFx0fSwgc2Nyb2xsX3RvcF9kdXJhdGlvblxuICAgIFx0XHQpO1xuICAgIFx0fSk7XG5cblxufSk7XG5cblxuLy8gdmFyIHRhcmdldCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwicGFydG5lcnMtdGFic1wiKTtcbi8vIHZhciBvcHRpb25zID0ge307IC8vRGVmaW5lIG9wdGlvbnMgZS5nLiBcIm9wdGlvbjFcIiA6IFwidmFsdWUxXCIsIGV0Yy5cdFx0XHRcdFx0XHRcdFx0XHRcblxuLy8gdmFyIGVsZW0gPSBuZXcgRm91bmRhdGlvbi5UYWJzKCQodGFyZ2V0KSwgb3B0aW9ucyk7XG4vLyB2YXIgZWxlbSA9ICQoJ1tkYXRhLXRhYnNdJyk7XG5cbi8vIC8vICQoJ1tkYXRhLXRhYnNdJykub24oJ2NoYW5nZS56Zi50YWJzJywgZnVuY3Rpb24gKCkge1xuXG5cbi8vICQoJy50YWJzLXRpdGxlJykub24oXCJtb3VzZW92ZXJcIiwgZnVuY3Rpb24gKCkge1xuLy8gXHQvL0ZpbmQgdGhlIGFzc29jaWF0ZWQgcGFuZWwgaWQuXG4vLyBcdHZhciBwYW5lbElkID0gJCh0aGlzKS5maW5kKFwiYVwiKS5hdHRyKFwiaHJlZlwiKS5zdWJzdHJpbmcoMSk7XG4vLyBcdHZhciB0YWJDb250ZW50cyA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHBhbmVsSWQpO1xuLy8gXHQvL1VzZSB0aGUgXCJ0YWJzXCIgb2JqZWN0IHRvIHNlbGVjdCB0aGUgYXNzb2NpYXRlZCBwYW5lbC5cbi8vIFx0ZWxlbS5zZWxlY3RUYWIoJCh0YWJDb250ZW50cykpO1xuLy8gXHQvL1Nob3cgdGhlIHRhYiBjb250ZW50cy5cbi8vIFx0JCh0YWJDb250ZW50cykuc2hvdygpO1xuLy8gfSkub24oXCJtb3VzZW91dFwiLCBmdW5jdGlvbiAoKSB7XG4vLyBcdHZhciBwYW5lbElkID0gJCh0aGlzKS5maW5kKFwiYVwiKS5hdHRyKFwiaHJlZlwiKS5zdWJzdHJpbmcoMSk7XG4vLyBcdCQodGhpcykuZmluZChcImFcIikuYXR0cihcImFyaWEtc2VsZWN0ZWRcIiwgXCJmYWxzZVwiKTtcbi8vIFx0dmFyIHRhYkNvbnRlbnRzID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQocGFuZWxJZCk7XG4vLyBcdC8vSGlkZSB0aGUgdGFiIGNvbnRlbnRzLlxuLy8gXHQkKHRhYkNvbnRlbnRzKS5oaWRlKCk7XG4vLyB9KTtcblxuXG4kKCcudGFicy10aXRsZScpLm9uKFwibW91c2VvdmVyXCIsIGZ1bmN0aW9uICgpIHtcblxuXHR2YXIgJHRoaXMgPSB0aGlzO1xuXG5cdHZhciB0YWJfaWQgPSAkKCR0aGlzKS5maW5kKCdhJykuYXR0cignaHJlZicpO1xuXG5cblx0Ly8gaHR0cHM6Ly9zdGFja292ZXJmbG93LmNvbS9hLzY2NzI1Nzlcblx0JCgkdGhpcylcblx0XHQuYWRkQ2xhc3MoJ2lzLWFjdGl2ZScpIC8vc2V0IHRoZSBjdXJyZW50IGFzIGFjdGl2ZVxuXHRcdC5zaWJsaW5ncyhcImxpXCIpIC8vZmluZCBzaWJsaW5nIGgzIGVsZW1lbnRzXG5cdFx0LnJlbW92ZUNsYXNzKFwiaXMtYWN0aXZlXCIpIC8vIGFuZCByZW1vdmUgdGhlIGFjdGl2ZSBmcm9tIHRoZW1cblxuXHQkKFwiLnRhYnMtY29udGVudCAudGFicy1wYW5lbFwiKS5zaWJsaW5ncygpLmhpZGUoKTtcblxuXHQkKFwiLnRhYnMtY29udGVudCAudGFicy1wYW5lbFwiICsgdGFiX2lkKS5zaG93KCk7XG5cbn0pO1xuXG4vLyB3b3JkcHJlc3MgdmlkZW9cbi8vIGh0dHBzOi8vY2Z4ZGVzaWduLmNvbS9ob3ctdG8tbWFrZS10aGUtd29yZHByZXNzLXZpZGVvLXNob3J0Y29kZS1yZXNwb25zaXZlL1xuJChmdW5jdGlvbiAoKSB7XG5cdCQoJy5tZWpzLW92ZXJsYXktbG9hZGluZycpLmNsb3Nlc3QoJy5tZWpzLW92ZXJsYXknKS5hZGRDbGFzcygnbG9hZCcpOyAvL2p1c3QgYSBoZWxwZXIgY2xhc3NcblxuXHR2YXIgJHZpZGVvID0gJCgnZGl2LnZpZGVvIHZpZGVvJyk7XG5cdHZhciB2aWRXaWR0aCA9ICR2aWRlby5hdHRyKCd3aWR0aCcpO1xuXHR2YXIgdmlkSGVpZ2h0ID0gJHZpZGVvLmF0dHIoJ2hlaWdodCcpO1xuXG5cdCQod2luZG93KS5yZXNpemUoZnVuY3Rpb24gKCkge1xuXHRcdHZhciB0YXJnZXRXaWR0aCA9ICQodGhpcykud2lkdGgoKTsgLy91c2luZyB3aW5kb3cgd2lkdGggaGVyZSB3aWxsIHByb3BvcnRpb24gdGhlIHZpZGVvIHRvIGJlIGZ1bGwgc2NyZWVuOyBhZGp1c3QgYXMgbmVlZGVkXG5cdFx0JCgnZGl2LnZpZGVvLCBkaXYudmlkZW8gLm1lanMtY29udGFpbmVyJykuY3NzKCdoZWlnaHQnLCBNYXRoLmNlaWwodmlkSGVpZ2h0ICogKHRhcmdldFdpZHRoIC8gdmlkV2lkdGgpKSk7XG5cdH0pLnJlc2l6ZSgpO1xufSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==