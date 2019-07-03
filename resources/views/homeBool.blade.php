@extends ('layouts.app')

@section('content')
  <div class="search__section">
    <div class="searching  col-md-12 col-lg-6 col-xl-4">
      <h1>Find unique places to stay all around the world.</h1>
      <h5>Find a top-rated home with amenities you need.</h5>
      <div class="container">

        <!--where-->
        <div class="search__component col_12">
          <span>WHERE</span>
          <div class="row">

            <div class="search__button col-12">
              Roma
            </div>
          </div>
        </div>

        <!-- check-in check-out -->
        <div class="row">
          <div class="search__component col-6">
            <span>CHECK-IN</span>
            <div class="row">
              <div class="search__button col-12 ">
                dd-mm-aaaa
              </div>
            </div>
          </div>
          <div class="search__component col-6">
            <span>CHECK-OUT</span>
            <div class="row">
              <div class="search__button col-12 ">
                dd-mm-aaaa
              </div>
            </div>
          </div>
        </div>

        <!--rooms guests -->
        <div class="row">
          <div class="search__component col-6">
            <span>ROOMS</span>
            <div class="row">
              <div class="search__button col-12 ">
                2
              </div>
            </div>
          </div>
          <div class="search__component col-6">
            <span>GUESTS</span>
            <div class="row">
              <div class="search__button col-12 ">
                0
              </div>
            </div>
          </div>
        </div>

        <!-- search -->
        <div class="search__component  col_12">
          <div class="row">
            <div class="search__button search col-12">
              <span>Search</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- fine search section -->
  <div class="sponsored__section container">
    <h1>Get a look to our best homes.</h1>
    <div class="row ">

       @foreach($rentals as $rental)
        <div class="col-4 room__card__small">
          <a href="{{route('show.rental',$rental->id)}}" class="stretched-link"></a>

          <div class="room__card__small__img ciao" style="background-image:url({{asset('storage/images/'.$rental->image)}})">
            <div class="filter">
              <a href="{{route('show.rental',$rental->id)}}" class="stretched-link"></a>

            </div>
            <div class="sponsor-stamp">
              SPONSOR
            </div>
          </div>
          <div class="room__card__small__text">
            <h4 class="name__appartament">{{ $rental -> title }}</h4>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="container organization__section ">
    <h1>Plan your trip</h1>
    <div class="row">
      <div class="col-8 col-md-3 offset-2 offset-md-3">
        <div class="organization__button col-12">
          <span>Find homes</span>
        </div>
      </div>
      <div class="col-8 col-md-3 offset-2 offset-md-0">
        <div class="organization__button col-12">
          <span>Become a host</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card__city_section  container">
    {{-- <h1>Recommended for you</h1> --}}
    <div class="section ">
      <div class="card__city col-6 col-md-3" style="background-image:url('https://images.unsplash.com/photo-1508711046474-2f4c2d3d30ca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2550&q=80')">
        <span>London</span>
      </div>
      <div class="card__city col-6 col-md-3" style="background-image:url('https://images.unsplash.com/photo-1511739001486-6bfe10ce785f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80')">
        <span>Paris</span>
      </div>
      <div class="card__city col-6 col-md-3" style="background-image:url('https://images.unsplash.com/photo-1540224485413-4c7939106f3a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2069&q=80')">
        <span>Berlin</span>
      </div>
      <div class="card__city col-6 col-md-3" style="background-image:url('https://images.unsplash.com/photo-1531572753322-ad063cecc140?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2555&q=80')">
        <span>Rome</span>
      </div>
      <div class="card__city col-6 col-md-3" style="background-image:url('https://images.unsplash.com/photo-1500916434205-0c77489c6cf7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1233&q=80')">
        <span>New York</span>
      </div>
    </div>
  </div>
  <div class="reference__section container-fluid">
    <h1>Travel with BoolBnb</h1>
    <div class="row">
      <div class="col-8 col-lg-2 offset-2 offset-lg-2 reference__section__item">
        <i class="fas fa-phone"></i>
        <h2>Customer service</h2>
        <p>We are at your disposal night and day. <br> Contact our support team from anywhere in the world, anytime. </p>
      </div>
      <div class="col-8 col-lg-2 offset-2 offset-lg-1 reference__section__item">
        <i class="fas fa-home"></i>
        <h2>Ospitality standard</h2>
        <p>After each stay, guests leave a review on thier host. To continue to stay on BoolBnb, all hosts must obtain a minimum rating and guarantee our hospitality standards. </p>
      </div>
      <div class="col-8 col-lg-2 offset-2 offset-lg-1 reference__section__item">
        <i class="fas fa-user"></i>
        <h2>Five stars hosts</h2>
        <p>From freshly pressed sheets to advice on the best restaurants, our hosts are models of local hospitality.</p>
      </div>
    </div>
  </div>
@stop
