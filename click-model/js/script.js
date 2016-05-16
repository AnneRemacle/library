/* hepl-mmi/meet-gmap
 *
 * /js/script.js - discover Google Map
 *
 * coded by leny@flatLand!
 * started at 01/03/2016
 */

( function() {

    "use strict";

    var $gmap,
        gMap,
        fInitGMap,
        fAddMarkerFromServer,
        fAddCircularZone;

    fInitGMap = function() {
        gMap = new google.maps.Map( $gmap[ 0 ], {
            "center": new google.maps.LatLng( 50.83, 4.35 ),
            "disableDefaultUI": true,
            "scrollwheel": false,
            // see https://snazzymaps.com for ready-to-use styles
            "zoomControl": true,
            "zoom": 7
        } );
    };

    fAddMarkerFromServer = function( oEvent ) {
        oEvent.preventDefault();

        // 1. perform AJAX request
        $.ajax( {
            "url": "./",
            "method": "GET",
            "dataType": "json",
            "error": function( oXHR, sError ) {
                console.error( sError );
            },
            "success": function( oResponse ) {
                var gMarker;

                // 2. generate marker at position
                gMarker = new google.maps.Marker( {
                    "map": gMap,
                    "position": new google.maps.LatLng( oResponse.latitude, oResponse.longitude ),
                    "title": "lat: " + oResponse.latitude + ", long: " + oResponse.longitude
                } );

                // 3. (temporary) center map on marker
                // gMap.setZoom( 13 ); // Google désactive l'animation quand le niveau de zoom est trop important
                // gMap.panTo( gMarker.getPosition() );
            }
        } );
    };

    fAddCircularZone = function( oEvent ) {
        oEvent.preventDefault();

        $.ajax( {
            "url": "./",
            "method": "POST",
            "dataType": "json",
            "error": function( oXHR, sError ) {
                console.error( sError );
            },
            "success": function( oResponse ) {
                var gMarker,
                    gShape,
                    answer;

                // 2. generate marker at position
                gMarker = new google.maps.Marker( {
                    "map": gMap,
                    "position": new google.maps.LatLng( oResponse.latitude, oResponse.longitude ),
                    "title": "lat: " + oResponse.latitude + ", long: " + oResponse.longitude
                } );

                answer = parseInt( prompt( "Quel est le diamètre de la zone? (Entre 1 et 50)" ) );

                if( answer < 1 || answer > 50 || isNaN( answer ) ) {
                    gShape[ "radius" ] = 25;
                }

                gShape = new google.maps.Circle({
                  "strokeColor": '#FF0000',
                  "strokeOpacity": 0.8,
                  "strokeWeight": 2,
                  "fillColor": '#FF0000',
                  "fillOpacity": 0.35,
                  "map": gMap,
                  "center": gMarker.getPosition(),
                  "radius": answer * 1000
                });
            }
        } );
    };


    $( function() {

        $gmap = $( "#gmap" );

        fInitGMap();

        $( "#add-marker" ).on( "click", fAddMarkerFromServer );

        $( "#add-zone" ).on( "click", fAddCircularZone );

    } );

} )();
