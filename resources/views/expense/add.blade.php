@extends('expense.layouts')

@section('title', 'Yeni Gider Ekle')

@section('extras')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=KEY&libraries=places">
</script>

<style>
    #map-canvas {
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('content')


<div class="row">
    <div class="col-md-10">
        <h3>Yeni Gider Ekle</h3>
    </div>
</div>

<form class="row border mb-3 p-2" action="{{ route('storex') }}" method="POST" id="form" name="form">
    @csrf
  <div class="col-12 mb-2">
    <label for="description" class="form-label">Gider Açıklaması *</label>
    <textarea class="form-control" id="description" name="description" required autofocus></textarea>
  </div>
  <div class="col-md-4">
    <label for="spent_money" class="form-label">Tutar *</label>
    <input type="number" class="form-control" id="spent_money" name="spent_money" required>
  </div>
  <div class="col-md-4">
    <label for="event_date" class="form-label">Tarih *</label>
    <input type="date" class="form-control" id="event_date" name="event_date" required>
  </div>
  <div class="col-md-4">
    <label for="cat_id" class="form-label">Kategori *</label>
    <select class="form-control" id="cat_id" name="cat_id">
        @foreach($categories as $c)
                    <option value="{{$c->cat_id}}">{{$c->cat_name}}</option>
        @endforeach
    </select>
  </div>

   <div class="col-md-8 mt-2">
            <h5>Konum</h5>
            <input type="text" class="form-control" name="searchMap" id="searchMap">
            <div id="map-canvas" class="mt-1"></div>
    </div>
    <div class="col-md-4">
    <input type="hidden" name="lat" id="lat">
    <input type="hidden" name="lng" id="lng">
    </div>

  <div class="col-12 mt-2">
    <button type="submit" class="btn btn-success">Kaydet</button>
  </div>


</form>

* ilgili alanların doldurulması zorunludur


<script>
var map = new google.maps.Map(document.getElementById("map-canvas"),{
center:{
    lat: 38.00,
    lng: 38.00
},
zoom:15
});

var marker = new google.maps.Marker({
    position: {
    lat: 38.00,
    lng: 38.00
},
map:map,
draggable: true,
});

var searchBox = new google.maps.places.SearchBox(document.getElementById("searchMap"));

google.maps.event.addListener(searchBox,'places_changed', function(){
  var places = searchBox.getPlaces();
  var bounds = new google.maps.LatLngBounds();
  var i, place;

  for (i=0; place = places[i];i++){
    bounds.extend(place.geometry.location);
    marker.setPosition(place.geometry.location);
  }
  map.fitBounds(bounds);
  map.setZoom(15);
});

google.maps.event.addListener(marker,'position_changed', function(){
  var lat = marker.getPosition().lat();
  var lng = marker.getPosition().lng();
  $('#lat').val(lat);
  $('#lng').val(lng);
});
</script>
@endsection
