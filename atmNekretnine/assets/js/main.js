//buttons
let nekretnine_btn_block = document.querySelector(".filter_buttons");

//Navigation
let navigation = document.querySelector(".navigation");
let hb_menu = document.querySelector(".menu-btn");
let side_menu = document.querySelector(".side-menu");
let small_navigation_list = document.querySelector("#navSmall");

//header sections
let headerSection = document.querySelector(".index_header");
let nekretnineHeader = document.querySelector(".nekretnine_header");

//Blocks
let istaknuta_ponuda_wrapper = document.querySelector(".in_ponuda");

//Gallery lightbox
lightbox.option({
  alwaysShowNavOnTouchDevices: true,
});

//Intersection API
function stickyNavigation(entries) {
  const [entry] = entries;
  if (!entry.isIntersecting) {
    navigation.classList.add("sticky");
  } else {
    navigation.classList.remove("sticky");
  }
}
let headerObserver = new IntersectionObserver(stickyNavigation, {
  root: null,
  threshold: 0,
});

//Close side menu on click
small_navigation_list.addEventListener("click", function (e) {
  let btn = e.target;
  let btnClasses = Array.from(btn.classList);
  if (btnClasses.includes("nav_link")) {
    hb_menu.classList.toggle("open");
    side_menu.classList.toggle("none");
  }
});

//Hamburger Menu
hb_menu.addEventListener("click", function (e) {
  hb_menu.classList.toggle("open");
  side_menu.classList.toggle("none");
});

let path = window.location.pathname;
window.addEventListener("load", function () {
  if (path.includes("index.php") || path === "/atmNekretnine/") {
    //Intersection API
    let headerObserver = new IntersectionObserver(stickyNavigation, {
      root: null,
      threshold: 0,
    });
    headerObserver.observe(headerSection);

    //HeroSlider
    autoSlide();

    let nekretnine = this.document.querySelectorAll(".nekretnina");
    let btns_wrapper = this.document.querySelector(".filter_buttons");
    let btns = [];
    nekretnine.forEach((n) => {
      btns.push(n.dataset.type);
    });
    btns = new Set(btns);
    btns_wrapper.innerHTML = `<a href="#" class="filter-nek-btn active" data-type='svi'>Svi oglasi</a>`;
    btns.forEach((btn) => {
      btns_wrapper.innerHTML += `
        <a href="#" class="outline-btn filter-nek-btn" data-type='${btn}'>${btn}</a>
      `;
    });
    $(document).on("click", ".filter_buttons", function (e) {
      e.preventDefault();
      let allBtns = document.querySelectorAll(".filter-nek-btn");
      allBtns.forEach((btn) => {
        btn.classList.remove("active");
        btn.classList.add("outline-btn");
      });
      let btn = e.target;

      let btnClasses = Array.from(btn.classList);
      if (!btnClasses.includes("filter-nek-btn")) return;
      let btnType = btn.dataset.type;
      btn.classList.remove("outline-btn");
      btn.classList.add("active");
      nekretnine.forEach((nekretnina) => {
        nekretnina.classList.add("dsp_none");
        if (btnType === "svi") {
          nekretnina.classList.remove("dsp_none");
        }
        if (nekretnina.dataset.type === btnType) {
          nekretnina.classList.remove("dsp_none");
        }
      });
    });
    //Load newest data

    // ajaxCallBack(
    //   "models/oglasi/najnovijiOglasi.php",
    //   "GET",
    //   false,
    //   function (data) {
    //     ispisOglasa(data, 1);
    //   },
    //   function (xhr) {
    //     console.log(xhr);
    //   }
    // );

    //Home page filter

    // nekretnine_btn_block.addEventListener("click", function (e) {
    //   e.preventDefault();
    //   let flag = 0;

    //   let btn = e.target;
    //   let btnClasses = Array.from(btn.classList);
    //   if (!btnClasses.includes("filter-nek-btn")) return;

    //   let btnType = btn.dataset.type;
    //   nekretnine.forEach((nekretnina) => {
    //     nekretnina.classList.add("dsp_none");
    //     if (nekretnina.dataset.type === btnType) {
    //       console.log(nekretnina);
    //       flag = 1;
    //       nekretnina.classList.remove("dsp_none");
    //     }
    //   });
    // });
  } else if (path.includes("nekretnine.php")) {
    //Header observer
    headerObserver.observe(nekretnineHeader);

    //Broj oglasa
    let ukupanBrojOglasa = 0;
    let pages = Math.ceil(ukupanBrojOglasa / 6);

    //Fast search from hero or load everything
    let searchUrl = decodeURIComponent(
      window.location.search.substring(1, window.location.search.length)
    );
    searchUrl = searchUrl.split("&");
    let fastSearchParams = {};
    if (searchUrl.length !== 0) {
      searchUrl.forEach((param) => {
        let key = param.split("=")[0];
        let value = param.split("=")[1];
        //Validation
        let id_regex = /^\d+$/;
        if (!id_regex.test(value)) return;

        fastSearchParams[key] = value;
      });
      ajaxCallBack(
        "models/oglasi/getLimited.php",
        "POST",
        { step: 0, params: fastSearchParams },
        function (data) {
          ispisOglasa(data.oglasi);
          ukupanBrojOglasa = data.brojOglasa;
          pages = Math.ceil(ukupanBrojOglasa / 6);
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    } else {
      ajaxCallBack(
        "models/oglasi/getAll.php",
        "GET",
        false,
        function (data) {
          ispisOglasa(data.oglasi);
          ukupanBrojOglasa = data.brojOglasa.broj;
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    }

    //Filter Sort
    let filteri = this.document.querySelector(".filteri");
    let sort = this.document.querySelector(".sort_search");
    //filter parametars
    let drzava = document.querySelector("#drzava");
    let grad = document.querySelector("#grad");
    let naselja = document.querySelector("#naselja");
    let tip_nekretnine = document.querySelector("#tip_nekretnine");
    let tip_usluge = document.querySelector("#usluga");
    let min_cena = document.querySelector("#min_cena");
    let max_cena = document.querySelector("#max_cena");

    //Sort params
    let sortparam = this.document.querySelector("#sortiraj");

    //Mobile version filter
    let openFilter = this.document.querySelector(".openFilterBtn");
    let filterBlock = this.document.querySelector(".filters");
    let closeFilter = this.document.querySelector(".close");

    //Search
    let search = this.document.querySelector("#search");
    let search_btn = this.document.querySelector(".search-btn");
    //Pagination
    let step = 0;
    let next = this.document.querySelector(".next");
    let back = this.document.querySelector(".back");

    search_btn.addEventListener("click", (e) => {
      // if (search.value === "") return;
      params = {
        search: search.value,
      };
      let searchRegex = /^[a-zA-Z0-9\s]+$/;
      if (searchRegex.test(params.search)) {
        ajaxCallBack(
          "models/oglasi/getLimited.php",
          "POST",
          { step: 0, params },
          function (data) {
            ispisOglasa(data.oglasi);
          },
          function (xhr) {
            console.log(xhr);
          }
        );
      } else return;
    });

    //Regex
    let priceRegex = /^\d+$/;

    next.addEventListener("click", function (e) {
      let params = {
        drzava: drzava.value,
        grad: grad.value,
        naselja: naselja.value,
        tip_nekretnine: tip_nekretnine.value,
        tip_usluge: tip_usluge.value,
        min_cena: min_cena.value,
        max_cena: max_cena.value,
        sort: sortparam.value,
      };

      if (step === pages - 1) return;
      step++;
      ajaxCallBack(
        "models/oglasi/getLimited.php",
        "POST",
        { step, params },
        function (data) {
          ispisOglasa(data.oglasi);
        },
        function (xhr) {
          console.log(xhr);
        }
      );
      scroll();
    });
    back.addEventListener("click", function (e) {
      let params = {
        drzava: drzava.value,
        grad: grad.value,
        naselja: naselja.value,
        tip_nekretnine: tip_nekretnine.value,
        tip_usluge: tip_usluge.value,
        min_cena: min_cena.value,
        max_cena: max_cena.value,
        sort: sortparam.value,
      };
      step--;
      if (step < 0) {
        step = 0;
        return;
      }
      ajaxCallBack(
        "models/oglasi/getLimited.php",
        "POST",
        { step, params },
        function (data) {
          ispisOglasa(data.oglasi);
        },
        function (xhr) {
          console.log(xhr);
        }
      );
      scroll();
    });

    filteri.addEventListener("submit", (e) => {
      e.preventDefault();
      let params = {
        drzava: drzava.value,
        grad: grad.value,
        naselja: naselja.value,
        tip_nekretnine: tip_nekretnine.value,
        tip_usluge: tip_usluge.value,
        min_cena: min_cena.value,
        max_cena: max_cena.value,
        sort: sortparam.value,
      };
      let isCorrect = 0;
      if (
        (priceRegex.test(params.min_cena) || params.min_cena.length === 0) &&
        (priceRegex.test(params.max_cena) || params.max_cena.length === 0)
      ) {
        isCorrect = 1;
      }

      if (isCorrect) {
        ajaxCallBack(
          "models/oglasi/getLimited.php",
          "POST",
          { step: 0, params },
          function (data) {
            ispisOglasa(data.oglasi);
            ukupanBrojOglasa = data.brojOglasa;
            pages = Math.ceil(ukupanBrojOglasa / 6);
          },
          function (xhr) {
            console.log(xhr);
          }
        );
        filterBlock.classList.remove("openFilter");
      }
    });

    sort.addEventListener("submit", (e) => {
      e.preventDefault();
    });
    sortparam.addEventListener("change", (e) => {
      let params = {
        drzava: drzava.value,
        grad: grad.value,
        naselja: naselja.value,
        tip_nekretnine: tip_nekretnine.value,
        tip_usluge: tip_usluge.value,
        min_cena: min_cena.value,
        max_cena: max_cena.value,
        sort: sortparam.value,
      };
      ajaxCallBack(
        "models/oglasi/getLimited.php",
        "POST",
        { step: 0, params },
        function (data) {
          ispisOglasa(data.oglasi);
          ukupanBrojOglasa = data.brojOglasa;
          pages = Math.ceil(ukupanBrojOglasa / 6);
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    });

    //Open filter modal

    openFilter.addEventListener("click", (e) => {
      e.preventDefault();
      filterBlock.classList.add("openFilter");
    });
    closeFilter.addEventListener("click", (e) => {
      e.preventDefault();
      filterBlock.classList.remove("openFilter");
    });
  } else if (path.includes("oglas.php")) {
    //Header observer
    headerObserver.observe(nekretnineHeader);

    let type = this.document.querySelector(".type");
    type = type.dataset.type;
    ajaxCallBack(
      "models/oglasi/slicniOglasi.php",
      "GET",
      { type },
      function (data) {
        ispisOglasa(data);
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (path.includes("kontakt.php")) {
    //Header observer
    headerObserver.observe(nekretnineHeader);
  } else if (path.includes("blog.php")) {
    //Header observer
    // ajaxCallBack(
    //   "models/blog/getAllBlog.php",
    //   "GET",
    //   false,
    //   function (data) {
    //     ispisBlogova(data.blogovi);
    //   },
    //   function (xhr) {
    //     console.log("usao");
    //     console.log(xhr);
    //   }
    // );
    headerObserver.observe(nekretnineHeader);

    //Pagination
    let page = 0;
    let maxPage = 0;
    let next = document.querySelector(".next");
    let back = document.querySelector(".back");
    ajaxCallBack(
      "models/blog/getBlogsPagination.php",
      "POST",
      { step: page },
      function (data) {
        maxPage = Math.ceil(data.brojBlogova.broj / 6);
      },
      function (xhr) {
        console.log(xhr);
      }
    );
    next.addEventListener("click", (e) => {
      e.preventDefault();
      if (page === maxPage - 1) return;
      page++;
      ajaxCallBack(
        "models/blog/getBlogsPagination.php",
        "POST",
        { step: page },
        function (data) {
          ispisBlogova(data.blogovi);
          maxPage = Math.ceil(data.brojBlogova.broj / 6);
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    });
    back.addEventListener("click", (e) => {
      page--;
      if (page < 0) {
        page = 0;
        return;
      }
      ajaxCallBack(
        "models/blog/getBlogsPagination.php",
        "POST",
        { step: page },
        function (data) {
          ispisBlogova(data.blogovi);
          maxPage = Math.ceil(data.brojBlogova / 6);
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    });
  } else if (path.includes("blogPost.php")) {
    //Header observer
    headerObserver.observe(nekretnineHeader);
  }
});

const swiper = new Swiper(".swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});

// slick

$(".responsive").slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".slider-nav",
});
$(".slider-nav").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: true,
  centerMode: true,
  focusOnSelect: true,
});

//Ispis Blogova
function ispisBlogova(blogovi) {
  let container = document.querySelector(".blog_container");
  container.innerHTML = "";
  blogovi.forEach((blog) => {
    container.innerHTML += `
      <div class="single_blog">
          <div class="img_blog_holder"><img src="assets/images/blog/${blog.main_blog_img}" alt="${blog.naslov} image"></div>
          <div class="date_ct">
              <i class="fi fi-rr-calendar"></i>
              <div class="date">${blog.created_at}</div>
          </div>
          <h3 class="blog_heading">${blog.naslov}</h3>
          <a href="blogPost.php?id=${blog.id_blog}" class="underline_btn red_btn">Pročitaj Više</a>
      </div>
    `;
  });
}

//Ispis oglasa
function ispisOglasa(data, is_home = 0) {
  let oglasiWrapper = document.querySelector(".in_ponuda");
  oglasiWrapper.innerHTML = ``;
  let buttons = [];
  if (data.length > 0) {
    data.forEach((oglas) => {
      let shorterDesc = oglas.opis.substring(0, 120);
      shorterDesc = shorterDesc + "...";
      let shorterNaslov = oglas.naslov.substring(0, 30);
      shorterNaslov += "...";
      buttons.push(oglas.tip_nekretnine);
      oglasiWrapper.innerHTML += `
          <div class="nekretnina" data-type='${oglas.tip_nekretnine}'>
            <div class="slika">
                <img src="assets/images/naslovneSlikeOglas/${
                  oglas.naslovna_slika
                }" alt="${shorterNaslov}">
            </div>
            <div class="nek_blok_info">
                <div class='oglas-card-header'>
                  <p class="naziv_nek">${shorterNaslov}</p>
                  <p class='tip_oglasa ${oglas.usluga.toLowerCase()}'>${
        oglas.usluga
      }</p>
                </div>
                <div class='info'>
                ${ispisKarakteristika(oglas.id_nekretnine)}
                </div>
                
                <p class="cena">cena: <span class="cena-bold">${formatPrice(
                  oglas.cena
                )} &euro;</span></p>
                <p class="kratak_opis">${shorterDesc}</p>
                <a href="oglas.php?oglas=${
                  oglas.id_nekretnine
                }" class="outline-btn nek_btn">Pogledaj Detalnije</a>
            </div>
          </div>
      `;
    });
  } else {
    oglasiWrapper.innerHTML = `
    <div class="alert alert-danger" role="alert">
    Žao nam je ali trenutno nemamo oglas sa ovim filterima!
    </div>
    `;
  }
}
function ispisKarakteristika(id) {
  let karakteristike_oglasa = dohvatiKarakteristike(id);
  let html = "";
  let potrebne_karakteristike = ["povrsina", "broj kupatila", "broj soba"];
  for (let i = 0; i < karakteristike_oglasa.length; i++) {
    if (
      !potrebne_karakteristike.includes(
        karakteristike_oglasa[i].karakteristika.toLowerCase()
      )
    ) {
      continue;
    }

    html += `
    <div class='s_karak'>
    ${
      karakteristike_oglasa[i].karakteristika.toLowerCase() === "povrsina"
        ? '<i class="fa-solid fa-chart-area"></i>'
        : ""
    }
    ${
      karakteristike_oglasa[i].karakteristika.toLowerCase() === "broj soba"
        ? '<i class="fa-solid fa-house"></i>'
        : ""
    }
    ${
      karakteristike_oglasa[i].karakteristika.toLowerCase() === "broj kupatila"
        ? '<i class="fa-solid fa-toilet"></i>'
        : ""
    }
    
    <p class="nek_karak">${karakteristike_oglasa[i].vrednost} ${
      karakteristike_oglasa[i].karakteristika.toLowerCase() === "povrsina"
        ? "m²"
        : ""
    }</p>
    </div>
    `;
  }
  return html;
}

function dohvatiKarakteristike(id) {
  const params = {
    id: id,
  };
  let karakteristike;
  $.ajax({
    url: "models/oglasi/getAll.php",
    async: false,
    method: "POST",
    dataType: "json",
    data: params,
    success: function (data) {
      karakteristike = data;
    },
    error: function (xhr) {
      console.log(xhr);
    },
  });
  return karakteristike;
}

//scroll into view
function scroll() {
  document.documentElement.scrollTop = 0;
}
//Ajax function
function ajaxCallBack(url, method, data = false, result, error) {
  $.ajax({
    url: url,
    method: method,
    dataType: "json",
    data: data,
    success: result,
    error: error,
  });
}

// Slider functions
function autoSlide() {
  setInterval(() => {
    slide(getItemActiveIndex() + 1);
  }, 5000); // slide speed = 3s
}

function slide(toIndex) {
  const itemsArray = Array.from(document.querySelectorAll(".carousel_item"));
  const itemActive = document.querySelector(".carousel_item__active");

  // check if toIndex exceeds the number of carousel items
  if (toIndex >= itemsArray.length) {
    toIndex = 0;
  }

  const newItemActive = itemsArray[toIndex];

  // start transition
  newItemActive.classList.add("carousel_item__pos_next");
  setTimeout(() => {
    newItemActive.classList.add("carousel_item__next");
    itemActive.classList.add("carousel_item__next");
  }, 20);

  // remove all transition class and switch active class
  newItemActive.addEventListener(
    "transitionend",
    () => {
      itemActive.className = "carousel_item";
      newItemActive.className = "carousel_item carousel_item__active";
    },
    {
      once: true,
    }
  );
}

function getItemActiveIndex() {
  const itemsArray = Array.from(document.querySelectorAll(".carousel_item"));
  const itemActive = document.querySelector(".carousel_item__active");
  const itemActiveIndex = itemsArray.indexOf(itemActive);
  return itemActiveIndex;
}

//price formating
function formatPrice(price) {
  price = Number(price).toFixed(0);
  return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

//Validate form
function ValidateField() {
  let regex_email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  let regex_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*@).*$/;

  let errorWrapper = document.querySelector(".error");
  errorWrapper.innerHTML = "";

  let email = document.querySelector("#email");
  let password = document.querySelector("#password");
  let flag = 1;
  if (!regex_email.test(email.value)) {
    flag = 0;
  }
  if (!regex_password.test(password.value)) {
    flag = 0;
  }

  if (flag) return true;
  else {
    errorWrapper.innerHTML = `<div class='alert alert-danger' role='alert'>
      Email ili password nisu u dobrom formatu: email->marijana@gmail.com
      <h5>Pasword mora da sadrzi:</h5>
      <ul>
        <li>Barem jedno veliko slovo</li>
        <li>Barem jedno malo slovo</li>
        <li>Barem jedan broj</li>
        <li>Barem jedan specijalan karakter</li>
      </ul>
    </div>`;
    return false;
  }
}
