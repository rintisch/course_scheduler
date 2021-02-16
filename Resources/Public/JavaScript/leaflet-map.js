function courseLeaflet() {
  let obj = {};

  let idOfMapElement = 'js-course__map';
  let idOfRecordsElement = 'js-course__records';
  let recordsElement = document.getElementById(idOfRecordsElement);

  obj.map = null;
  obj.markers = [];

  obj.run = function () {

    if(!(document.getElementById(idOfMapElement) && recordsElement && recordsElement.children)){
      return;
    }

    obj.map = L.map(idOfMapElement, {
      scrollWheelZoom: false
    }).setView([51.505, -0.09],16);

    let mapBounds = L.latLngBounds();
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      minZoom:7,
      attribution: 'Kartendaten &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> Mitwirkende, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Bilder © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox.streets'
    }).addTo(obj.map);

    var records = recordsElement.children;
    for (var i = 0; i < records.length; i++) {
      var item = records[i];

      var marker = L.marker([item.getAttribute('data-lat'), item.getAttribute('data-lng')]).addTo(obj.map)
        .bindPopup(document.getElementById('js-course__record-' + item.getAttribute('data-id')).innerHTML);
      obj.markers.push(marker);
    }
    var group = new L.featureGroup(obj.markers);

    obj.map.fitBounds(group.getBounds());

    // set zoom properly, depending on number of records
    if(records.length === 1){
      obj.map.setZoom(15);
    }
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

/** event listener on DOMContentLoaded does not work with scripts which are loaded async.
 * With TYPO3 this could e.g. happen with EXT:scriptmerger
 * Thus we listen only if document.readyState is loading, otherwise we can already fire as DOM is loaded already.
 **/
if (document.readyState === 'loading') {
  document.addEventListener("DOMContentLoaded", function () {
    courseMapOnload();
  });
} else {
  courseMapOnload();
}
