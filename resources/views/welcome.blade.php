<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            font-family: 'Nunito', sans-serif;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map,
        #pano {
            float: left;
            height: 100%;
            width: 100%;
        }

    </style>
</head>
<body class="antialiased">
{{--banquet arbat--}}
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=ywyx7vWrvhN" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
{{--white diamond conference center--}}
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=4PLSVN6jJds" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
{{--banking hall--}}
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=UEpDGP5575W" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
{{--red barn wedding venue--}}
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=3sBLzeJpKgG" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
{{--bona dea wedding & function venue--}}
<iframe width="100%" height="480" frameborder="0" allowfullscreen="" allow="xr-spatial-tracking" src="https://my.matterport.com/show/?m=pDfrgsnQ5H3"></iframe>
{{--the ritz banquet--}}
<iframe width="100%" height="583" src="https://360virtualspace.in/fnbritz/tour.html" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true">
{{--the wedding wire--}}
</iframe><iframe width="100%" height="583" src="https://my.matterport.com/show/?m=zWWx8ZoiD8p" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
{{--the rosewood wedding sept 3rd --}}
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=n6Do9WCxYAS" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=9FB7n3Ezaji" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
{{--the sternwheeler --}}
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=26QEBqKb4S4" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=WtrYsyYjuDi" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>
<iframe width="100%" height="583" src="https://my.matterport.com/show/?m=F2bmxpKDcMs" frameborder="0" allowfullscreen=""
        allow="vr" data-uw-styling-context="true"></iframe>

<div id="pano"></div>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb1536j4SgMWd-4_2mbiyh-HTNp_26S6k&callback=initialize&v=weekly"
        async></script>
<script>
    function initialize() {
        const fenway = { lat: 24.863409, lng: 67.072298 };
        // const map = new google.maps.Map(document.getElementById("map"), {
        //     center: fenway,
        //     zoom: 14,
        // });
        const panorama = new google.maps.StreetViewPanorama(
            document.getElementById("pano"),
            {
                position: fenway,
                pov: {
                    heading: 34,
                    pitch: 10,
                },
            }
        );

        map.setStreetView(panorama);
    }
</script>
</body>
</html>
