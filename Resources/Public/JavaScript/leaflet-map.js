function courseLeaflet() {
  var obj = {};

  obj.map = null;
  obj.markers = [];

  obj.run = function () {

    obj.map = L.map('js-course__map').setView([51.505, -0.09], 13);
    var mapBounds = L.latLngBounds();
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox.streets'
    }).addTo(obj.map);

    var records = document.getElementById("js-course__records").children;
    for (var i = 0; i < records.length; i++) {
      var item = records[i];

      var marker = L.marker([item.getAttribute('data-lat'), item.getAttribute('data-lng')]).addTo(obj.map)
        .bindPopup(document.getElementById('js-course__record-' + item.getAttribute('data-id')).innerHTML);
      obj.markers.push(marker);
    }
    var group = new L.featureGroup(obj.markers);

    obj.map.fitBounds(group.getBounds());
  };

  obj.openMarker = function (markerId) {
    obj.markers[markerId].openPopup();
  };

  return obj;
}

function courseMapOnload() {
  var ttAddressMapInstance = courseLeaflet();
  ttAddressMapInstance.run();
}
