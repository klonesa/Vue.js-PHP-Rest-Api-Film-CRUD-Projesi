<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vue.js, PHP, Rest Api, Film CRUD Projesi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="js/axios.min.js"></script>
</head>
<body>
	
	<div id="root">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="#">Vue.js, PHP, Rest Api, Film CRUD Projesi</a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<button class="btn btn-success" @click="showingaddModal = true;">Film Ekle</button>
				</li>
			</ul>
		</nav>

		<div class="container p-5">
			<div class="row">

				<div class="alert alert-danger col-md-12" id="alertMessage" role="alert" v-if="errorMessage">
					{{ errorMessage }}
				</div>

				<div class="alert alert-success col-md-12" id="alertMessage" role="alert" v-if="successMessage">
					{{ successMessage }}
				</div>

				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th>S/N</th>
							<th>Film Adı</th>
							<th>Film Yönetmeni</th>
							<th>Film Yapım Yılı</th>
							<th>Film Tür</th>
							<th>Düzenle</th>
							<th>Sil</th>
						</tr>
					</thead>
					<tbody class="tbody-custom">
						<tr v-for="film in filmler">
							<td>{{film.id}}</td>
							<td>{{film.film_adi}}</td>
							<td>{{film.film_yonetmen}}</td>
							<td>{{film.film_yapim_yili}}</td>
							<td>{{film.film_tur}}</td>
							<td><button @click="showingeditModal = true; filmiSec(film);" class="btn btn-warning">Düzenle</button></td>
							<td><button @click="showingdeleteModal = true; filmiSec(film);" class="btn btn-danger">Sil</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	<!-- Film Ekle Modal -->
		<div class="modal col-md-6" id="addmodal" v-if="showingaddModal">
				<div class="modal-head">
					<p class="p-left p-2">Film Ekle</p>
					<hr/>

					<div class="modal-body">
							<div class="col-md-12">
								<label for="uname">Film Adı</label>
								<input type="text" id="film_adi" class="form-control" v-model="yeniFilm.film_adi" required>

								<label for="email">Film Yönetmeni</label>
								<input type="text" id="film_yonetmen" class="form-control" v-model="yeniFilm.film_yonetmen" required>

								<label for="phn">Film Yapım Yılı</label>
								<input type="text" id="film_yapim_yili" class="form-control" v-model="yeniFilm.film_yapim_yili">

								<label for="phn">Film Türü</label>
								<input type="text" id="film_tur" class="form-control" v-model="yeniFilm.film_tur">
							</div>

						<hr/>
							<button type="button" class="btn btn-success"  @click="showingaddModal = false; filmEkle();">Filmi Ekle</button>
							<button type="button" class="btn btn-danger"   @click="showingaddModal = false;">Kapat</button>
					</div>
				</div>
			</div>


	<!-- Film Düzenle Modal -->
		<div class="modal col-md-6" id="editmodal" v-if="showingeditModal">
			<div class="modal-head">
				<p class="p-left p-2">{{secilenFilm.film_adi}} Filmi Düzenle</p>
				<hr/>

				<div class="modal-body">
						<div class="col-md-12">
							<label for="uname">Film Adı</label>
							<input type="text" id="film_adi" class="form-control" v-model="secilenFilm.film_adi">

							<label for="email">Film Yönetmeni</label>
							<input type="text" id="film_yonetmen" class="form-control" v-model="secilenFilm.film_yonetmen">

							<label for="phn">Film Yapım Yılı</label>
							<input type="text" id="film_yapim_yili" class="form-control" v-model="secilenFilm.film_yapim_yili">

							<label for="phn">Film Türü</label>
							<input type="text" id="film_tur" class="form-control" v-model="secilenFilm.film_tur">
						</div>

					<hr/>
						<button type="button" class="btn btn-success"  @click="showingeditModal = false; filmiGuncelle();">Kaydet</button>
						<button type="button" class="btn btn-danger"   @click="showingeditModal = false;">Kapat</button>
				</div>
			</div>
		</div>


		<!-- Film Sil -->
		<div class="modal col-md-6" id="deletemodal" v-if="showingdeleteModal">
			<div class="modal-head">
				<p class="p-left p-2">{{secilenFilm.film_adi}} Filmi Sil</p>
				<hr/>

				<div class="modal-body">
						<center>
							<p>Seçilen filmi silmek istediğinden emin misin?</p>
							<h3>{{secilenFilm.film_adi}}</h3>
						</center>
					<hr/>
						<button type="button" class="btn btn-danger"  @click="showingdeleteModal = false; filmiSil();">Evet</button>
						<button type="button" class="btn btn-warning"   @click="showingdeleteModal = false;">Hayır</button>
				</div>
			</div>
		</div>

	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/vue.min.js"></script>
	<script src="js/app.js"></script> 
</body>
</html>