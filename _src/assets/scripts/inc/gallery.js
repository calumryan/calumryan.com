// From Inclusive Components
// inclusive-components.design/a-content-slider
"use strict";

(function () {
  var gallery = document.querySelector('[aria-label="gallery"]');

  if (gallery) {
    /* lazy loading and button controls */
    var slides = gallery.querySelectorAll("li");
    var instructions = document.getElementById("instructions");

    /* touch detection */
    window.addEventListener(
      "touchstart",
      function touched() {
        document.body.classList.add("touch");
        window.removeEventListener("touchstart", touched, false);
      },
      false
    );

    Array.prototype.forEach.call(slides, function (slide) {
      slide.querySelector("a").setAttribute("tabindex", "-1");
    });

    var observerSettings = {
      root: gallery,
      rootMargin: "-10px",
    };

    if ("IntersectionObserver" in window) {
      var scrollIt = function scrollIt(slideToShow) {
        var scrollPos =
          Array.prototype.indexOf.call(slides, slideToShow) *
          (gallery.scrollWidth / slides.length);
        gallery.scrollLeft = scrollPos;
      };

      var showSlide = function showSlide(dir, slides) {
        var visible = document.querySelectorAll(
          '[aria-label="gallery"] .visible'
        );
        var i = dir === "previous" ? 0 : 1;

        if (visible.length > 1) {
          scrollIt(visible[i]);
        } else {
          var newSlide =
            i === 0
              ? visible[0].previousElementSibling
              : visible[0].nextElementSibling;
          if (newSlide) {
            scrollIt(newSlide);
          }
        }
      };

      var callback = function callback(slides, observer) {
        Array.prototype.forEach.call(slides, function (entry) {
          entry.target.classList.remove("visible");
          var link = entry.target.querySelector("a");
          link.setAttribute("tabindex", "-1");
          if (!entry.intersectionRatio > 0) {
            return;
          }
          var img = entry.target.querySelector("img");
          if (img.dataset.src) {
            img.setAttribute("src", img.dataset.src);
            img.removeAttribute("data-src");
          }
          entry.target.classList.add("visible");
          link.removeAttribute("tabindex", "-1");
        });
      };

      var observer = new IntersectionObserver(callback, observerSettings);
      Array.prototype.forEach.call(slides, function (t) {
        return observer.observe(t);
      });

      var controls = document.createElement("ul");
      controls.setAttribute("aria-label", "gallery controls");
      controls.innerHTML =
        '\n    <li><button type="button" id="previous" aria-label="previous">\n      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-left"></use></svg>\n    </button></li>\n    <li><button type="button" id="next" aria-label="next">\n      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-right"/></svg>\n    </button></li>\n    ';
      instructions.parentNode.insertBefore(
        controls,
        instructions.nextElementSibling
      );
      instructions.parentNode.style.padding = "0 3rem";

      controls.addEventListener("click", function (e) {
        showSlide(e.target.closest("button").id, slides);
      });
    } else {
      Array.prototype.forEach.call(slides, function (s) {
        var img = s.querySelector("img");
        img.setAttribute("src", img.getAttribute("data-src"));
      });
    }
  }
})();
