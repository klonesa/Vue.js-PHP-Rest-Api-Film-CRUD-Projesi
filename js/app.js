var app = new Vue({

  el: "#root",
  data: {
    showingaddModal: false,
    showingeditModal: false,
    showingdeleteModal: false,
    errorMessage: "",
    successMessage: "",
    filmler: [],
    yeniFilm: {film_adi: "", film_yonetmen: "", film_yapim_yili: "", film_tur: ""},
    secilenFilm: {},
  },

  mounted: function () {
    console.log("Vue.js is running...");
    this.filmleriListele();
  },

  methods: {
    filmleriListele: function () {
      axios.get('http://localhost/film-crud/api/v1.php?action=read')
      .then(function (response) {
        console.log(response);

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.filmler = response.data.filmler;
        }
      })
    },

    filmEkle: function () {
      var formData = app.toFormData(app.yeniFilm);
      axios.post('http://localhost/film-crud/api/v1.php?action=create', formData)
      .then(function (response) {
        console.log(response);
        app.yeniFilm = {film_adi: "", film_yonetmen: "", film_yapim_yili: "", film_tur: ""};

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.successMessage = response.data.message;
          app.filmleriListele();
        }
      });
    },

    filmiGuncelle: function () {
      var formData = app.toFormData(app.secilenFilm);
      axios.post('http://localhost/film-crud/api/v1.php?action=update', formData)
      .then(function (response) {
        console.log(response);
        app.secilenFilm = {};

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.successMessage = response.data.message;
          app.filmleriListele();
        }
      });
    },

    filmiSil: function () {
      var formData = app.toFormData(app.secilenFilm);
      axios.post('http://localhost/film-crud/api/v1.php?action=delete', formData)
      .then(function (response) {
        console.log(response);
        app.secilenFilm = {};

        if (response.data.error) {
          app.errorMessage = response.data.message;
        } else {
          app.successMessage = response.data.message;
          app.filmleriListele();
        }
      })
    },

    filmiSec(film) {
      app.secilenFilm = film;
    },

    toFormData: function (obj) {
      var form_data = new FormData();
      for (var key in obj) {
        form_data.append(key, obj[key]);
      }
      return form_data;
    },

    clearMessage: function (argument) {
      app.errorMessage   = "";
      app.successMessage = "";
    },


  }
});