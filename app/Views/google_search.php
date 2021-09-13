<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The tiny framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codeigniter 4 Google Autocomplete Address Search Box Example - XpertPhp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
        max-width: 500px;
      }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="form-group mb-3">
           <h3 class="mb-3"> Find Address or Location</h3>
           <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Choose Location">
        </div>
        <div class="form-group mb-3" id="latitudeArea">
           <label>Latitude</label>
           <input type="text" class="form-control" name="latitude" id="latitude">
        </div>
        <div class="form-group mb-3" id="longtitudeArea">
           <label>Longitude</label>
           <input type="text" class="form-control" name="longitude" id="longitude">
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=your-api-key&libraries=places&callback=initAutocomplete"></script>
    <script>
        $(document).ready(function() {
            $("#latitudeArea").addClass("d-none");
            $("#longtitudeArea").addClass("d-none");
        }); 
        
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
                
                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });
        } 
    </script>
</body>
</html>