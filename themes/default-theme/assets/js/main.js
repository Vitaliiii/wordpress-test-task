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

  function booksRating() {
    const rating = document.querySelector(".post-rating");

    if (!rating) {
      return;
    }

    jQuery('.post').each(function () {
      const thisRate = jQuery(this).find('.post-rating');

      if (!thisRate) {
        return;
      }

      const thisPlus = jQuery(this).find('.rate-plus');
      const thisMinus = jQuery(this).find('.rate-minus');
      const thisNum = jQuery(this).find('.rate-number').text();
      const bookId = jQuery(this).data('id');

      let newthisRate = parseInt(thisNum);
      thisPlus.on('click', function () {
        newthisRate++;
        updateNumber(bookId, newthisRate);
      });
      thisMinus.on('click', function () {
        newthisRate--;
        updateNumber(bookId, newthisRate);
      });
    });

    function updateNumber(postId, rateNumber) {
      jQuery.ajax({
        type: "POST",
        url: my_ajax_object.ajax_url,
        data: {
          action: "books_rating_ajax",
          post_id: postId,
          rating: rateNumber,
        },
        success: function (response) {
          jQuery(`#rate-${postId}`).text(response);
        },
        error: function (xhr, status, error) {
          console.log(error);
        },
      });
    }
  }

  booksRating();
  toggleMobileMenu();
  stickyHeader();
});
