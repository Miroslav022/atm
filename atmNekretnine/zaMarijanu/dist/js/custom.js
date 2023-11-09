$(function () {
  "use strict";

  $(".preloader").fadeOut();
  // this is for close icon when navigation open in mobile view
  $(".nav-toggler").on("click", function () {
    $("#main-wrapper").toggleClass("show-sidebar");
    $(".nav-toggler i").toggleClass("ti-menu");
  });
  $(".search-box a, .search-box .app-search .srh-btn").on("click", function () {
    $(".app-search").toggle(200);
    $(".app-search input").focus();
  });

  // ==============================================================
  // Resize all elements
  // ==============================================================
  $("body, .page-wrapper").trigger("resize");
  $(".page-wrapper").delay(20).show();

  //****************************
  /* This is for the mini-sidebar if width is less then 1170*/
  //****************************
  var setsidebartype = function () {
    var width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;
    if (width < 1170) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  };
  $(window).ready(setsidebartype);
  $(window).on("resize", setsidebartype);
});

//custom js

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

window.addEventListener("load", function () {
  let page = window.location.pathname;
  let searchParams = window.location.search;
  if (page.includes("naselja")) {
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "naselja" },
      function (data) {
        ispisPodatakaUTabelu(data, "naselja");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (page.includes("karakteristike")) {
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "karakteristike" },
      function (data) {
        ispisPodatakaUTabelu(data, "karakteristike");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (page.includes("usluge")) {
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "tipovi_usluga" },
      function (data) {
        ispisPodatakaUTabelu(data, "tipovi_usluga");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (page.includes("tipovi-nekretnine")) {
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "tipovi_nekretnine" },
      function (data) {
        ispisPodatakaUTabelu(data, "tipovi_nekretnine");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (page.includes("drzave")) {
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "drzave" },
      function (data) {
        ispisPodatakaUTabelu(data, "drzave");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (page.includes("gradovi")) {
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "gradovi" },
      function (data) {
        ispisPodatakaUTabelu(data, "gradovi");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  } else if (page.includes("oglasi")) {
    //Pagination page
    let brojOglasa = 0;
    let page = 0;
    let pages = 0;

    ajaxCallBack(
      "../../logic/getLimitedNekretnine.php",
      "POST",
      { table: "nekretnine", step: page },
      function (data) {
        ispisPodatakaUTabelu(data.oglasi, "nekretnine");
        brojOglasa = data.brojOglasa;
        pages = Math.ceil(brojOglasa / 10);
      },
      function (xhr) {
        console.log(xhr);
      }
    );

    console.log(page, pages);
    //PAGINATION
    let next = this.document.querySelector(".next");
    let back = this.document.querySelector(".back");

    next.addEventListener("click", function (e) {
      e.preventDefault();
      if (page === pages - 1) return;
      page++;
      console.log(page, pages);
      ajaxCallBack(
        "../../logic/getLimitedNekretnine.php",
        "POST",
        { table: "nekretnine", step: page },
        function (data) {
          ispisPodatakaUTabelu(data.oglasi, "nekretnine");
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    });

    back.addEventListener("click", function (e) {
      e.preventDefault();
      page--;
      if (page < 0) {
        page = 0;
        return;
      }
      ajaxCallBack(
        "../../logic/getLimitedNekretnine.php",
        "POST",
        { table: "nekretnine", step: page },
        function (data) {
          ispisPodatakaUTabelu(data.oglasi, "nekretnine");
        },
        function (xhr) {
          console.log(xhr);
        }
      );
    });
  } else if (searchParams.includes("page=oglas")) {
    let id_oglasa = document.querySelector("#id_oglasa").value;
    ajaxCallBack(
      "../../logic/getAllImages.php",
      "POST",
      { table: "slike_nekretnine", id: id_oglasa },
      function (data) {
        ispisSlika(data);
      },
      function (xhr) {
        let galerijaWrapper = document.querySelector(".galerija");
        galerijaWrapper.innerHTML = ``;
        let wrapperErrorGalerija = document.querySelector(`#galerijaError`);
        wrapperErrorGalerija.innerHTML = `<div class="alert alert-danger" role="alert">
          Trenutno nemate slika u galeriji.
         </div>`;
      }
    );
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "nekretnina_karakteristika", id_og: id_oglasa },
      function (data) {
        ispisK(data);
      },
      function (xhr) {
        let errorWrapper = document.querySelector(".karakteristika_error");
        errorWrapper.innerHTML = `
        <div class="alert alert-danger" role="alert">
          Oglas nema karakteristika!
        </div>
        `;
      }
    );
  } else if (searchParams.includes("page=blog")) {
    tinymce.init({
      selector: "#content",
      plugins: [
        "checklist",
        "lists",
        "link",
        "charmap",
        "anchor",
        "searchreplace",
        "powerpaste",
        "formatpainter",
        "insertdatetime",
        "wordcount",
      ],
      toolbar:
        "undo redo | formatpainter casechange blocks | bold italic backcolor | " +
        "alignleft aligncenter alignright alignjustify | " +
        "bullist numlist checklist outdent indent | removeformat | a11ycheck table help",
    });
    if (this.document.querySelector(".galerija")) {
      let id_blog = document.querySelector("#id_blog").value;
      ajaxCallBack(
        "../../logic/getAllImages.php",
        "POST",
        { table: "blog_image", id: id_blog },
        function (data) {
          ispisSlika(data, "blogovi");
        },
        function (xhr) {
          let galerijaWrapper = document.querySelector(".galerija");
          galerijaWrapper.innerHTML = ``;
          let wrapperErrorGalerija = document.querySelector(`#galerijaError`);
          wrapperErrorGalerija.innerHTML = `<div class="alert alert-danger" role="alert">
            Trenutno nemate slika u galeriji.
          </div>`;
        }
      );
    }
  } else if (page.includes("blog")) {
    //dohvati podatke
    ajaxCallBack(
      "../../logic/getAllItems.php",
      "POST",
      { table: "blogovi" },
      function (data) {
        ispisPodatakaUTabelu(data, "blogovi");
      },
      function (xhr) {
        console.log(xhr);
      }
    );
  }
});

function ispisPodatakaUTabelu(data, tabela) {
  console.log(data);
  let tabelaBlock = document.querySelector(".table-body");
  let counter = 1;
  if (tabela === "naselja") {
    tabelaBlock.innerHTML = ``;
    data.forEach((naselje) => {
      tabelaBlock.innerHTML += `
        <tr>
          <th scope="row">${counter++}</th>
          <td>${naselje.naselje}</td>
          <td>${naselje.grad}</td>
          <td>${naselje.drzava}</td>
          <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=naselje&id=${
            naselje.id_naselja
          }" role="button">Edituj</a></td>
          <td><a class="btn btn-danger delete" data-tab='naselja' data-id="${
            naselje.id_naselja
          }" href="#" role="button">Izbriši</a></td>
        </tr>
    `;
    });
  } else if (tabela === "karakteristike") {
    tabelaBlock.innerHTML = ``;
    data.forEach((karakteristika) => {
      tabelaBlock.innerHTML += `
        <tr>
          <th scope="row">${counter++}</th>
          <td>${karakteristika.karakteristika}</td>
          <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=karakteristika&id=${
            karakteristika.id_karakteristike
          }" role="button">Edituj</a></td>
          <td><a class="btn btn-danger delete" data-tab='karakteristike'  data-id="${
            karakteristika.id_karakteristike
          }" href="#" role="button">Izbriši</a></td>
        </tr>
    `;
    });
  } else if (tabela === "tipovi_usluga") {
    tabelaBlock.innerHTML = ``;
    data.forEach((usluga) => {
      tabelaBlock.innerHTML += `
        <tr>
          <th scope="row">${counter++}</th>
          <td>${usluga.usluga}</td>
          <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=usluge&id=${
            usluga.id_tip_usluge
          }" role="button">Edituj</a></td>
          <td><a class="btn btn-danger delete" data-tab='tipovi_usluga' data-id="${
            usluga.id_tip_usluge
          }" href="#" role="button">Izbriši</a></td>
        </tr>
    `;
    });
  } else if (tabela === "tipovi_nekretnine") {
    tabelaBlock.innerHTML = ``;
    data.forEach((tip) => {
      tabelaBlock.innerHTML += `
        <tr>
          <th scope="row">${counter++}</th>
          <td>${tip.tip_nekretnine}</td>
          <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=tip-nekretnine&id=${
            tip.id_tip_nekretnine
          }" role="button">Edituj</a></td>
          <td><a class="btn btn-danger delete" data-tab='tipovi_nekretnine' data-id="${
            tip.id_tip_nekretnine
          }" href="#" role="button">Izbriši</a></td>
        </tr>
    `;
    });
  } else if (tabela === "gradovi") {
    tabelaBlock.innerHTML = ``;
    data.forEach((grad) => {
      tabelaBlock.innerHTML += `
        <tr>
          <th scope="row">${counter++}</th>
          <td>${grad.grad}</td>
          <td>${grad.drzava}</td>
          <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=grad&id=${
            grad.id_grad
          }" role="button">Edituj</a></td>
          <td><a class="btn btn-danger delete" data-tab='gradovi' data-id="${
            grad.id_grad
          }" href="#" role="button">Izbriši</a></td>
        </tr>
    `;
    });
  } else if (tabela === "drzave") {
    tabelaBlock.innerHTML = ``;
    data.forEach((drzava) => {
      tabelaBlock.innerHTML += `
      <tr>
        <th scope="row">${counter++}</th>
        <td>${drzava.drzava}</td>
        <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=drzava&id=${
          drzava.id_drzava
        }" role="button">Edituj</a></td>
        <td><a class="btn btn-danger delete" data-tab='drzave' data-id='${
          drzava.id_drzava
        }' href="#" role="button">Izbriši</a></td>
      </tr>
      `;
    });
  } else if (tabela === "nekretnine") {
    tabelaBlock.innerHTML = ``;
    data.forEach((oglas) => {
      tabelaBlock.innerHTML += `
      <tr>
        <th scope="row">${counter++}</th>
        <td>${oglas.naslov}</td>
        <td>${oglas.cena}</td>
        <td>${oglas.grad}</td>
        <td>${oglas.drzava}</td>
        <td>${oglas.naselje}</td>
        <td>${oglas.ulica}</td>
        <td>${oglas.tip_nekretnine}</td>
        <td>${oglas.usluga}</td>
        <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=oglas&id=${
          oglas.id_nekretnine
        }" role="button">Edituj</a></td>
        <td><a class="btn btn-danger delete" data-tab='nekretnine' data-id='${
          oglas.id_nekretnine
        }' href="#" role="button">Izbriši</a></td>
      </tr>
      `;
    });
  } else if (tabela === "blogovi") {
    tabelaBlock.innerHTML = ``;
    data.forEach((blog) => {
      tabelaBlock.innerHTML += `
        <tr>
          <th scope="row">${counter++}</th>
          <td>${blog.naslov}</td>
          <td>${blog.created_at}</td>
          <td><a class="btn btn-warning" href="../operationsPage/edituj.php?page=blog&id=${
            blog.id_blog
          }" role="button">Edituj</a></td>
          <td><a class="btn btn-danger delete" data-tab='blogovi'  data-id="${
            blog.id_blog
          }" href="#" role="button">Izbriši</a></td>
        </tr>
    `;
    });
  }
}

//Galerija Admin Panel
function ispisSlika(imgs, table = "oglas") {
  let galerijaWrapper = document.querySelector(".galerija");
  galerijaWrapper.innerHTML = ``;
  if (table === "oglas") {
    imgs.forEach((img) => {
      galerijaWrapper.innerHTML += `
        <div class="slika">
          <img src="../../../assets/images/oglasiSlike/${img.src}" alt="oglasSlika${img.id_slike}">
          <a href="#" class="btn btn-remove-img btn-danger" data-slika="${img.id_slike}" data-nek="${img.id_nekretnine}"  data-src='${img.src}'>Izbriši</a>
        </div>
      `;
    });
  } else {
    imgs.forEach((img) => {
      galerijaWrapper.innerHTML += `
        <div class="slika">
          <img src="../../../assets/images/blog/${img.src}" alt="oglasSlika${img.id_blog_img}">
          <a href="#" class="btn btn-remove-img btn-danger" data-slika="${img.id_blog_img}" data-blog="${img.id_blog}"  data-src='${img.src}'>Izbriši</a>
        </div>
      `;
    });
  }
}

//Dodaj novu Karakteristiku za jedan proizvod
function ispisKarakteristika(data, karakteristika) {
  // let alert = document.querySelector(".alert-noContent");
  // alert.classList.add("none");
  let errorWrapper = document.querySelector(".karakteristika_error");
  errorWrapper.innerHTML = ``;
  let formWrapper = document.querySelector(".single_karak");
  formWrapper.insertAdjacentHTML(
    "afterbegin",
    `
  <div class="form-group og_karak">
    <label for="${karakteristika}">${karakteristika}</label>
    <div class="karakteristika_block">
    <input type="text" class="form-control" id="${karakteristika}" name="karakteristika_${data.id_karakteristike}" value="${data.value}">
    <a href="#" class="btn btn-remove-karak btn-danger" data-nk="${data.id_nk}" data-og="${data.id_nekretnine}">Izbriši</a>
    </div>
    <input type="hidden" name="nk_num${data.id_karakteristike}" value="${data.id_nekretnine}" >
  </div>  
`
  );
}

function ispisK(dataKarakteristika) {
  let formWrapper = document.querySelector(".single_karak");
  formWrapper.innerHTML = ``;
  if (dataKarakteristika.length > 0) {
    dataKarakteristika.forEach((data) => {
      let html = `
      <div class="form-group og_karak">
        <label for="${data.karakteristika}">${data.karakteristika}</label>
        <div class="karakteristika_block">
        <input type="text" class="form-control" id="${data.karakteristika}" name="karakteristika_${data.id_kar}" value="${data.vrednost}">
  
        <a href="#" class="btn btn-remove-karak btn-danger" data-nk="${data.id_nk}" data-og="${data.id_nek}">Izbriši</a>
        </div>
        <input type="hidden" name="nk_num${data.id_kar}" value="${data.id_nk}" >
      </div> 
    `;
      formWrapper.insertAdjacentHTML("afterbegin", html);
    });
  }
}

//Validacija input polja
function ValidateField(id, operation = "dodaj") {
  // let textRegex = /^(?=.*[A-ZČĆŽŠĐ])|(?=.*[a-zčćžšđ])|(?=.*\s).+$/;
  let textRegex = /^[A-ZČĆŽŠĐa-zčćžšđ\s]+$/;
  let textNumRegex = /^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d ])[a-zčćžšđA-ZČĆŽŠĐ\d ]*$/;
  let opisRegex = /^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d.,!?]).*$/;
  if (id === "drzava") {
    let polje = document.querySelector(`#drzava`);
    let wrapper = document.querySelector(`#drzavaError`);
    if (!textRegex.test(polje.value)) {
      let html = `
      <div class="alert alert-danger" role="alert">
        Polje mora da sadrzi samo slova
      </div>`;
      wrapper.innerHTML = html;
      return false;
    } else {
      wrapper.innerHTML = ``;
      return true;
    }
  } else if (id === "grad") {
    let polje = document.querySelector(`#grad`);
    let wrapper = document.querySelector(`#gradError`);
    if (!textRegex.test(polje.value)) {
      let html = `
      <div class="alert alert-danger" role="alert">
        Polje mora da sadrzi samo slova
      </div>`;
      wrapper.innerHTML = html;
      return false;
    } else {
      wrapper.innerHTML = ``;
      return true;
    }
  } else if (id === "karakteristika") {
    let polje = document.querySelector(`#karakteristika`);
    let wrapper = document.querySelector(`#karakteristikaError`);
    if (!textRegex.test(polje.value)) {
      let html = `
      <div class="alert alert-danger" role="alert">
        Polje mora da sadrzi samo slova
      </div>`;
      wrapper.innerHTML = html;
      return false;
    } else {
      wrapper.innerHTML = ``;
      return true;
    }
  } else if (id === "naselje") {
    let polje = document.querySelector(`#naselje`);
    let wrapper = document.querySelector(`#naseljeError`);
    if (!textNumRegex.test(polje.value)) {
      let html = `
      <div class="alert alert-danger" role="alert">
        naselje moze da sadrzi samo slova i brojeve
      </div>`;
      wrapper.innerHTML = html;
      return false;
    } else {
      wrapper.innerHTML = ``;
      return true;
    }
  } else if (id === "usluge") {
    let polje = document.querySelector(`#usluga`);
    let wrapper = document.querySelector(`#uslugaError`);
    if (!textRegex.test(polje.value)) {
      let html = `
      <div class="alert alert-danger" role="alert">
        Polje mora da sadrzi samo slova
      </div>`;
      wrapper.innerHTML = html;
      return false;
    } else {
      wrapper.innerHTML = ``;
      return true;
    }
  } else if (id === "tip-nekretnine") {
    let polje = document.querySelector(`#tip_nekretnine`);
    let wrapper = document.querySelector(`#tip-nekretnineError`);
    if (!textRegex.test(polje.value)) {
      let html = `
      <div class="alert alert-danger" role="alert">
        Polje mora da sadrzi samo slova
      </div>`;
      wrapper.innerHTML = html;
      return false;
    } else {
      wrapper.innerHTML = ``;
      return true;
    }
  } else if (id === "oglas") {
    let naslov = document.querySelector("#naslov");
    let cena = document.querySelector("#cena");
    let opis = document.querySelector("#opis");
    let mapa_link = document.querySelector("#mapa_link");
    let ulica = document.querySelector("#ulica");
    let naslovna = document.querySelector("#naslovna");

    let flag = 0;

    let wrapperNaslov = document.querySelector(`#naslovError`);
    if (!textNumRegex.test(naslov.value)) {
      let html = `
        <div class="alert alert-danger" role="alert">
          Polje naslov moze da samo sadrzi slova i brojeve
        </div>`;
      wrapperNaslov.innerHTML = html;
      flag = 1;
    } else {
      wrapperNaslov.innerHTML = ``;
    }

    let cenaRegex = /\d+/g;
    let wrapperCena = document.querySelector(`#cenaError`);
    if (cena.value.length === 0 || !cenaRegex.test(cena.value)) {
      let html = `
        <div class="alert alert-danger" role="alert">
          Polje cena ne sme biti prazna i mora da sadrzi samo brojeve nekretnine ne sme biti prazno
        </div>`;
      wrapperCena.innerHTML = html;
      flag = 1;
    } else {
      wrapperCena.innerHTML = ``;
    }

    let wrapperOpis = document.querySelector(`#opisError`);
    if (!opisRegex.test(opis.value)) {
      let html = `
        <div class="alert alert-danger" role="alert">
          Polje opis moze da sadrzi samo: velika, mala slova, brojeve i simbole kao sto su (. , ! ? -) 
        </div>`;
      wrapperOpis.innerHTML = html;
      flag = 1;
    } else {
      wrapperOpis.innerHTML = ``;
    }

    let wrapperLink = document.querySelector(`#mapaError`);
    if (mapa_link.value.length === 0) {
      let html = `
        <div class="alert alert-danger" role="alert">
          Polje Link Google mape ne sme biti prazno
        </div>`;
      wrapperLink.innerHTML = html;
      flag = 1;
    } else {
      wrapperLink.innerHTML = ``;
    }

    let wrapperUlica = document.querySelector(`#ulicaError`);
    if (!textNumRegex.test(ulica.value)) {
      let html = `
        <div class="alert alert-danger" role="alert">
          Polje ulica može da sadrži samo slova i brojeve
        </div>`;
      wrapperUlica.innerHTML = html;
      flag = 1;
    } else {
      wrapperUlica.innerHTML = ``;
    }
    if (operation === "dodaj") {
      let wrapperNaslovna = document.querySelector(`#naslovnaError`);
      if (naslovna.files.length === 0) {
        let html = `
          <div class="alert alert-danger" role="alert">
           Morate staviti naslovnu sliku
          </div>`;
        wrapperNaslovna.innerHTML = html;
        flag = 1;
      } else {
        wrapperNaslovna.innerHTML = ``;
      }
    }

    if (flag) {
      return false;
    } else return true;
  } else if (id === "slike_nekretnine") {
    let flag = 0;
    let galerija = document.querySelector("#galerija");
    let wrapperGalerija = document.querySelector(`#galerijaError`);
    if (galerija.files.length === 0) {
      let html = `
        <div class="alert alert-danger" role="alert">
         Morate staviti barem jednu sliku za galeriju
        </div>`;
      wrapperGalerija.innerHTML = html;
      flag = 1;
    } else {
      wrapperGalerija.innerHTML = ``;
    }
    if (flag) {
      return false;
    } else return true;
  }
}

//Ispisi gresku
function ispisGreske(id, poruka) {
  let html = `
  <div class="alert alert-danger" role="alert">
    ${poruka}
  </div>`;
  let wrapper = document.querySelector(`#${id}`);
  wrapper.innerHTML = html;
}

function ukloniGresku(id) {
  let wrapper = document.querySelector(`#${id}`);
  wrapper.innerHTML = ``;
}

//Obrisi Karakteristiku
$(document).on("click", ".btn-remove-karak", function (e) {
  e.preventDefault();
  let id_og = e.target.dataset.og;
  let id_nk = e.target.dataset.nk;
  ajaxCallBack(
    "../../logic/deleteItem.php",
    "POST",
    { table: "nekretnina_karakteristika", id: id_nk },
    function (data) {
      //Load data
      ajaxCallBack(
        "../../logic/getAllItems.php",
        "POST",
        { table: "nekretnina_karakteristika", id_og },
        function (data) {
          ispisK(data);
        },
        function (xhr) {
          let formWrapper = document.querySelector(".single_karak");
          formWrapper.innerHTML = "";

          let errorWrapper = document.querySelector(".karakteristika_error");
          errorWrapper.innerHTML = `
          <div class="alert alert-danger" role="alert">
            Oglas nema karakteristika!
          </div>
          `;
        }
      );
      //Message
      console.log(data);
    },
    function (xhr) {
      console.log(xhr);
    }
  );
});

//Remove image from gallery
$(document).on("click", ".btn-remove-img", function (e) {
  e.preventDefault();
  let id_slike = e.target.dataset.slika;
  let id_blog = e.target.dataset.blog;
  let src = e.target.dataset.src;
  ajaxCallBack(
    "../../logic/deleteItem.php",
    "POST",
    { table: "blog_image", id: id_slike, src },
    function (data) {
      //Load data
      ajaxCallBack(
        "../../logic/getAllImages.php",
        "POST",
        { table: "blog_image", id: id_blog },
        function (data) {
          ispisSlika(data);
        },
        function (xhr) {
          let galerijaWrapper = document.querySelector(".galerija");
          galerijaWrapper.innerHTML = ``;
          let wrapperErrorGalerija = document.querySelector(`#galerijaError`);
          wrapperErrorGalerija.innerHTML = `<div class="alert alert-danger" role="alert">
          Trenutno nemate slika u galeriji.
         </div>`;
        }
      );
      //Message
      console.log(data);
    },
    function (xhr) {
      console.log(xhr);
    }
  );
});

//Remove image from oglasa
$(document).on("click", ".btn-remove-img", function (e) {
  e.preventDefault();
  let id_slike = e.target.dataset.slika;
  let id_oglasa = e.target.dataset.nek;
  let id = document.querySelector("#id_og").value;
  let src = e.target.dataset.src;
  ajaxCallBack(
    "../../logic/deleteItem.php",
    "POST",
    { table: "slike_nekretnine", id: id_slike, src },
    function (data) {
      //Load data
      ajaxCallBack(
        "../../logic/getAllImages.php",
        "POST",
        { table: "slike_nekretnine", id: id },
        function (data) {
          ispisSlika(data);
        },
        function (xhr) {
          let galerijaWrapper = document.querySelector(".galerija");
          galerijaWrapper.innerHTML = ``;
          let wrapperErrorGalerija = document.querySelector(`#galerijaError`);
          wrapperErrorGalerija.innerHTML = `<div class="alert alert-danger" role="alert">
          Trenutno nemate slika u galeriji.
         </div>`;
        }
      );
      //Message
      console.log(data);
    },
    function (xhr) {
      console.log(xhr);
    }
  );
});

//Add karakteristiku
$(document).on("click", ".btn-add-kar", function (e) {
  e.preventDefault();
  let karakteristikaDDL = document.querySelector("#add-karakteristika");

  let selectedIndex = karakteristikaDDL.selectedIndex;
  let karakteristika = karakteristikaDDL.options[selectedIndex].innerHTML;

  let karakteristika_id = karakteristikaDDL.value;
  let karak = document.querySelector("#karak-value");
  let karak_value = karak.value;
  let id_oglasa = document.querySelector("#id_og").value;
  ajaxCallBack(
    "../../adminpages/operationsPage/logic/add.php",
    "POST",
    {
      table: "nekretnina_karakteristika",
      id_oglasa,
      karakteristika_id,
      value: karak_value,
    },
    function (data) {
      //Load data
      ispisKarakteristika(data, karakteristika);
      console.log(data);
      //Message
    },
    function (xhr) {
      console.log(xhr);
    }
  );
  karak.value = "";
});

//Delete oglas
$(document).on("click", ".delete", function (e) {
  e.preventDefault();
  let id = e.target.dataset.id;
  let table = e.target.dataset.tab;
  ajaxCallBack(
    "../../logic/deleteItem.php",
    "POST",
    { table: table, id: id },
    function (data) {
      //Load data
      if (table === "nekretnine") {
        ajaxCallBack(
          "../../logic/getLimitedNekretnine.php",
          "POST",
          { table: "nekretnine", step: 0 },
          function (data) {
            ispisPodatakaUTabelu(data.oglasi, "nekretnine");
          },
          function (xhr) {
            console.log(xhr);
          }
        );
      } else {
        ajaxCallBack(
          "../../logic/getAllItems.php",
          "POST",
          { table },
          function (data) {
            ispisPodatakaUTabelu(data, table);
          },
          function (xhr) {
            console.log(xhr);
          }
        );
      }

      //Message
      console.log(data);
    },
    function (xhr) {
      console.log(xhr);
    }
  );
});
