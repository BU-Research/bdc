!function($){function e(e){var o=e.find(".marker"),r={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP,styles:[{elementType:"geometry",stylers:[{color:"#d8eee6"}]},{elementType:"labels.text.stroke",stylers:[{color:"#133353"}]},{elementType:"labels.text.fill",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"labels.text.fill",stylers:[{visibility:"off"}]},{featureType:"poi",elementType:"geometry",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"#ffffff"}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{visibility:"off"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{visibility:"off"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{visibility:"off"}]},{featureType:"road.highway",elementType:"labels.text.fill",stylers:[{color:"#1B4670"}]},{featureType:"transit",elementType:"geometry",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#b3b0e9"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{color:"#1B4670"}]},{featureType:"water",elementType:"labels.text.stroke",stylers:[{visibility:"off"}]}]},a=new google.maps.Map(e[0],r);return a.markers=[],o.each(function(){t($(this),a)}),l(a),a}function t(e,t){var l=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),o=new google.maps.Marker({position:l,map:t});if(t.markers.push(o),e.html()){var r=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(o,"click",function(){r.open(t,o)})}}function l(e){var t=new google.maps.LatLngBounds;$.each(e.markers,function(e,l){var o=new google.maps.LatLng(l.position.lat(),l.position.lng());t.extend(o)}),1==e.markers.length?(e.setCenter(t.getCenter()),e.setZoom(16)):e.fitBounds(t)}var o=null;$(document).ready(function(){$(".acf-map").each(function(){o=e($(this))})})}(jQuery);