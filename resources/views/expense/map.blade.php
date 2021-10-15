@extends('expense.layouts')

@section('title', 'Haritada Göster')

@section('extras')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUcDuhA3sF0SsvlI9MTbFzYR98mH3xyMM&libraries=places">
</script>

<style type="text/css">
    #map-canvas {
        border: 1px solid red;
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('content')<div id="map-canvas"></div>


<script type="text/javascript">
    var locations = <?php echo $locations ?>;


    var mymap = new google.maps.Map(document.getElementById("map-canvas"), {
        center: {
            lat: 39.00,
            lng: 35.00
        },
        zoom: 6
    });

    var marker, i;

        var infoWindow = new google.maps.InfoWindow({
        content: name
        });

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
            map: mymap
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(locations[i]['event_date']
                + ' tarihinde <br>' +
                locations[i]['spent_money']
                + ' liralık <br>' +
                locations[i]['description']
                +' ödemesi yapıldı. ');
                infoWindow.open(mymap, marker);
            }
        })(marker, i));
    }

</script>


@endsection
