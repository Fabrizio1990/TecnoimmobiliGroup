var GMap = null;





function MyMap(loaded){
    var that            = this;
    var loaded          = loaded;
    var address         = null;
    var map             = null;
    var marker          = null;
    var mapOptions      = null;
    var geocoderResult  = null;
    var latitude        = null;
    var longitude       = null;
    var goog_lat_long   = null;
    this.overlayBox      = null;
    this.mapTypes        = new Array("roadmap","satellite","hybrid","terrain");




    this.init = function(mapContainer,address,mapZoom,mapTypeId,marker,isStreetView,showMarker = true){
        that = this;
        that.loaded = true;
        that.address = address;
        that.createMap(mapContainer,mapTypeId,mapZoom,marker,showMarker);
    }
    this.geocode = function(address){
        if(address== null || address == "")
            retrun;

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( {'address': address}, function(results,status) {

            if (status == google.maps.GeocoderStatus.OK) {
                geocoderResult          = results;
                that.latitude           = results[0].geometry.location.lat();
                that.longitude          = results[0].geometry.location.lng();
                that.goog_lat_long      = results[0].geometry.location;
            }else {

                console.log("Problema nella ricerca dell'indirizzo: " + status);
                return null;
            }
        });
    }

    this.getLatitude = function(){
        return that.latitude;
    }
    this.getLongitude = function(){
        return that.longitude;
    }

    this.getLocation = function(){
        return that.geoLocation;
    }

    this.setOverlayBoxContent = function(content){
        that.overlayBox = content;
    }


    this.createMap = function(elId,mapTypeId,mapZoom,marker,showMarker = true){

        contentString = "<font size='2' style='font-family:verdana; width:auto;' family='verdana';height:auto; color='#003c81'><img style='border:0px; 'src='"+SITE_URL+"/images/icons/ico_tecnoimm_map.jpg'>&nbsp;L'immobile è ubicato QUI</font><br><font style='font-family:verdana;' family='verdana' size='2' color='#000000'>" + that.address + "</font>";

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( {'address': that.address}, function(results,status) {
            var infowindow = new google.maps.InfoWindow({content: contentString});
            if (status == google.maps.GeocoderStatus.OK) {
                geocoderResult          = results;
                that.latitude           = results[0].geometry.location.lat();
                that.longitude          = results[0].geometry.location.lng();
                that.goog_lat_long      = results[0].geometry.location;
                //console.log(mapTypeId);
                var mapType = that.mapTypes[mapTypeId];
                that.map = new google.maps.Map(document.getElementById(elId), {
                    center: that.goog_lat_long,
                    zoom: mapZoom,
                    mapTypeId: mapType,

                });
                if(showMarker){
                    that.setMarker(marker);
                    infowindow.open(that.map,that.marker);
                }
            }
        });
    };

    this.setMarker = function(icon = null){
        if(icon = null)
            icon = SITE_URL+"/images/icons/map_marker.png";
        that.marker = new google.maps.Marker({
            position: that.goog_lat_long,
            title: that.address,
            map: that.map,
            icon: icon,
            animation: google.maps.Animation.DROP
        });
        google.maps.event.addListener(that.marker, 'click',
            function() {
                if (that.marker.getAnimation() != null) {
                    that.marker.setAnimation(null);
                } else {
                    that.marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            });
    }

    this.addMarker = function(address,infoWindowContent = null,icon = null) {



        if(icon = null)
            icon = SITE_URL+"/images/icons/map_marker.png";

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address}, function (results, status) {
            var infowindow = new google.maps.InfoWindow({content: contentString});
            if (status == google.maps.GeocoderStatus.OK) {
                geocoderResult = results;
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();

                //console.log("ADDRESS = "+address);
                //var goog_lat_long = results[0].geometry.location;

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: that.map,
                    //icon: icon
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        if(infoWindowContent != null){
                            infowindow.setContent(address +" <br> "+ infoWindowContent);
                        }else{
                            infowindow.setContent();
                        }
                        infowindow.open(map, marker);
                    }
                })(marker));
            }
        });
    }

    this.refresh = function(){
        google.maps.event.trigger(that.map, 'resize');
    };


    this.changeMapType = function(mapId){
        that.map.setMapTypeId(mapTypes[mapId]);
    };
}


function createMap(address,town,country,defZoom = 2, defMapType = 2, showMarker = true){
    var zoom = defZoom;
    var fullAddress = address + " " +town +" " +country;
    // if full address is empty or is Italia  i set italia and put the zoom to 4
    if(fullAddress.trim() == "" || fullAddress.trim() == "Italia") {
        fullAddress = "Italia";
        zoom = 4;
    }
    GMap = new MyMap(true);
    GMap.init("map",fullAddress,zoom,defMapType,SITE_URL+"/images/icons/map_marker.png",false,showMarker);

    setTimeout(function(){
        $("#inp_latitude").val(GMap.getLatitude());
        $("#inp_longitude").val(GMap.getLongitude());
    },1000);
    return GMap;
}


