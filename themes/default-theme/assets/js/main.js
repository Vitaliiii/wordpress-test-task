jQuery(document).on("ready", function () {
  function openMenu() {
    if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
      document.addEventListener("touchmove", preventScroll, { passive: false });
    }
  }
  function closeMenu() {
    if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
      document.removeEventListener("touchmove", preventScroll);
    }
  }

  function stickyHeader() {
    const header = document.querySelector("#masthead");
    let oldScrollY = window.scrollY;

    if (!header) {
      return;
    }

    const sticky = header.offsetTop;

    function scrollHeader() {
      if (window.scrollY > sticky) {
        header.classList.add("header-scroll");
      } else {
        header.classList.remove("header-scroll");
        header.classList.remove("header-scroll-top");
      }
    }

    function scrollHeaderTop() {
      if (oldScrollY < window.scrollY) {
        header.classList.remove("header-scroll-top");
      } else {
        header.classList.add("header-scroll-top");
      }
      oldScrollY = window.scrollY;

      scrollHeader();
    }

    scrollHeader();

    window.addEventListener("scroll", scrollHeaderTop);
  }

  function toggleMobileMenu() {
    const header = document.querySelector("#masthead");

    if (!header) {
      return;
    }

    const toggler = header.querySelector(".menu-toggle");
    const mobileMenu = header.querySelector(".menu-wrapper");

    if (!toggler && !mobileMenu) {
      return;
    }

    let scrollDistance = 0;

    toggler.addEventListener("click", function () {
      scrollDistance = window.scrollY;
      toggler.classList.toggle("active");
      mobileMenu.classList.toggle("active");
      document.body.classList.toggle("lock");

      if (mobileMenu.classList.contains("active")) {
        mobileMenu.style.top = scrollDistance * -1;
        openMenu();
      } else {
        mobileMenu.style.top = "";
        window.scrollTo(0, scrollDistance);
        closeMenu();
      }
    });
  }

  function faqAnimation() {
    jQuery(".faq__item").each(function () {
      const thisItem = jQuery(this);
      const thisButton = thisItem.find(".faq__item-button");
      const thisText = thisItem.find(".faq__item-text");

      thisButton.click(function () {
        thisItem.toggleClass("active");
        thisText.slideToggle();
      });
    });
  }

  function jsonDisplayFAQ() {
    const acfTemplate = document.querySelector("#faq-acf");

    if (!acfTemplate) {
      return;
    }

    const protocol = window.location.protocol;
    const hostname = window.location.hostname;
    let counter = 0;

    document.querySelectorAll(".faq__item").forEach(function (element, index, array) {
      const faqId = element.getAttribute("data-id");
      const fetchLink = `${protocol}//${hostname}/wp-json/wp/v2/faq/${faqId}`;

      fetch(fetchLink)
        .then((response) => response.json())
        .then((post) => {
          const postContent = element.querySelector(".faq__item-content");
          postContent.innerHTML = `<button class="faq__item-button h4">${post.title.rendered}</button><article class="faq__item-text h4">${post.content.rendered}</article>`;

          counter++;
          if (counter === array.length) {
            setTimeout(function(){
              faqAnimation();
            }, 500);
          }
        })
        .catch((error) => console.error("Error fetching post:", error));
      

    });
  }

  function faqAjax() {
    const ajaxTemplate = document.querySelector("#faq-ajax");

    if (!ajaxTemplate) {
      return;
    }

    jQuery('#show-faq').click(function () {
      jQuery('.faq__list').addClass('loading');
      updateNumber();
    });
    function updateNumber() {
      jQuery.ajax({
        type: "POST",
        url: my_ajax_object.ajax_url,
        data: {
          action: "ajax_faq",
        },
        success: function (response) {
          jQuery('.faq__list').html(response);

          jQuery( document ).on( "ajaxComplete", function() {
            jQuery(".faq__list").removeClass('loading');
            setTimeout(function(){
              faqAnimation();
            }, 300);
          } );
        },
        error: function (xhr, status, error) {
          console.log(error);
        },
      });
    }
  }

  faqAjax();
  faqAnimation();
  jsonDisplayFAQ();
  toggleMobileMenu();
  stickyHeader();
});
