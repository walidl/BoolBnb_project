@extends ('layout.homelayout')

@section('content')
  <div class="serch__section">
    <div class="serching ">
      <h1>trova alloggi in tutto il mondo</h1>
      <h5>scopri l'alloggio perfetto per ogni ocasione</h5>
      <div class="container">

        <!-- dove -->

        <div class="serch__component col_12">
          <span>dove</span>
          <div class="row">

            <div class="serch__button col-12">
              Roma
            </div>
          </div>
        </div>

        <!-- check-in check-out -->

        <div class="row">
          <div class="serch__component col-6">
            <span>dove</span>
            <div class="row">
              <div class="serch__button col-12 ">
                dd-mm-aaaa
              </div>
            </div>
          </div>
          <div class="serch__component col-6">
            <span>dove</span>
            <div class="row">
              <div class="serch__button col-12 ">
                dd-mm-aaaa
              </div>
            </div>
          </div>
        </div>

        <!-- adulti bambini -->

        <div class="row">
          <div class="serch__component col-6">
            <span>adulti</span>
            <div class="row">
              <div class="serch__button col-12 ">
                2
              </div>
            </div>
          </div>
          <div class="serch__component col-6">
            <span>bambini</span>
            <div class="row">
              <div class="serch__button col-12 ">
                0
              </div>
            </div>
          </div>
        </div>

        <!-- cerca -->

        <div class="serch__component  col_12">

          <div class="row">

            <div class="serch__button serch col-12">
              <span>serch</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



  <!-- fine serch section -->

  <div class="sponsored__section container_fluid">
    <h1>dai un occhiata alle nostre migliori lacation</h1>
    <div class="row">
      <div class="col-2 offset-1 room__card__small">
        <div class="room__card__small__img">
          <img src="https://source.unsplash.com/collection/3759609/400x300" alt="">
        </div>
        <div class="room__card__small__text">

            <span class="adress__appartament">Firenze via del commercio 6</span>
            <span class="specification__misur">24m²</span>
            <span class="specification__adult">2 <i class="fas fa-user"></i> </span>

          <h4 class="name__appartament">florence dream</h4>
        </div>
      </div>
      <div class="col-2 room__card__small">
        <div class="room__card__small__img">
          <img src="https://source.unsplash.com/collection/1862377/400x300" alt="">
        </div>
        <div class="room__card__small__text">
          <span class="adress__appartament">Firenze via del commercio 6</span>
          <span class="specification__misur">24m²</span>
          <span class="specification__adult">2 <i class="fas fa-user"></i> </span>
          <h4 class="name__appartament">florence dream</h4>
        </div>
      </div>
      <div class="col-2  room__card__small">
        <div class="room__card__small__img">
          <img src="https://source.unsplash.com/collection/3832136/400x300" alt="">
        </div>
        <div class="room__card__small__text">
          <span class="adress__appartament">Firenze via del commercio 6</span>
          <span class="specification__misur">24m²</span>
          <span class="specification__adult">2 <i class="fas fa-user"></i> </span>
          <h4 class="name__appartament">florence dream</h4>
        </div>
      </div>
      <div class="col-2  room__card__small">
        <div class="room__card__small__img">
          <img src="https://source.unsplash.com/collection/4706605/400x300" alt="">
        </div>
        <div class="room__card__small__text">
          <span class="adress__appartament">Firenze via del commercio 6</span>
          <span class="specification__misur">24m²</span>
          <span class="specification__adult">2 <i class="fas fa-user"></i> </span>
          <h4 class="name__appartament">florence dream</h4>
        </div>
      </div>
      <div class="col-2  room__card__small">
        <div class="room__card__small__img">
          <img src="https://source.unsplash.com/collection/2292143/400x300" alt="">
        </div>
        <div class="room__card__small__text">
          <span class="adress__appartament">Firenze via del commercio 6</span>
          <span class="specification__misur">24m²</span>
          <span class="specification__adult">2 <i class="fas fa-user"></i> </span>
          <h4 class="name__appartament">florence dream</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="container organization__section ">
    <h1>organizza viaggi per te o per gli altri</h1>
    <div class="row">
      <div class="col-3 offset-3">
        <span>trova alloggi</span>
        <div class="organization__button col-12">
          <span>esplora</span>
        </div>
      </div>
      <div class="col-3">
        <span>diventa host</span>
        <div class="organization__button col-12">
          <span>ospita</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card__city_section">

    <h1>consigliati per te</h1>
    <div class="section">
      <div class=" card__city  ">
        <span>london</span>
        <img src="https://source.unsplash.com/collection/656615/600x800" alt="" class="">
      </div>
      <div class=" card__city">
        <span>paris</span>
        <img src="https://source.unsplash.com/collection/1203498/600x800" alt="" class="">
      </div>
      <div class=" card__city">
        <span>berlin</span>
        <img src="https://source.unsplash.com/collection/2145666/600x800" alt="" class="">
      </div>
      <div class=" card__city">
        <span>rome</span>
        <img src="https://source.unsplash.com/collection/2082503/600x800" alt="" class="">
      </div>
      <div class=" card__city">
        <span>new york</span>
        <img src="https://source.unsplash.com/collection/1847877/600x800" alt="" class="">
      </div>

    </div>
  </div>
  <div class="reference__section container-fluid">
    <h1>viaggia con boolb&b </h1>
    <div class="row">
      <div class="col-2 offset-2 reference__section__item">
      <i class="fas fa-phone"></i>
      <h2>Assisitenza clienti h24</h2>
      <p>Siamo a tua disposizione giorno e notte. Contatta il nostro team di assistenza da qualunque parte del mondo, a ogni ora del giorno. </p>

      </div>
      <div class="col-2  offset-1 reference__section__item">
        <i class="fas fa-home"></i>
        <h2>Standard di ospitalità globali</h2>
        <p>Dopo ogni soggiorno, gli ospiti lasciano una recensione sui propri host. Per continuare a restare su Airbnb, tutti gli host devono ottenere una valutazione minima e garantire i nostri standard di ospitalità.</p>

      </div>
      <div class="col-2 offset-1 reference__section__item">
        <i class="fas fa-user"></i>
        <h2>Host da <br> 5 stelle</h2>
        <p>Dalle lenzuola stirate di fresco ai consigli sui ristoranti migliori, i nostri host sono modelli di ospitalità locale.</p>

      </div>
    </div>
  </div>

@stop
