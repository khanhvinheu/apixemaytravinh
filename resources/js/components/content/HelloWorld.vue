<template>
  <div>
    <!-- <h1>Hello World</h1> -->
    <div id="map"></div>
  </div>
</template>
<script>
export default {
  mounted() {
    var map = L.map("map").setView([9.810341201806297, 106.31095290184022], 13);
    L.tileLayer("http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
      maxZoom: 20,
      subdomains: ["mt0", "mt1", "mt2", "mt3"],
    }).addTo(map);
    // map.on("click", function (e) {
    //   var popLocation = e.latlng;
    //   console.log(popLocation.lat);
    //   var popup = L.popup()
    //     .setLatLng(popLocation)
    //     .setContent("Nguyen Van A")
    //     .openOn(map);
    // });
    //  var drawnItems = new L.FeatureGroup();
    //  map.addLayer(drawnItems);
    //  var drawControl = new L.Control.Draw({
    //      edit: {
    //          featureGroup: drawnItems
    //      }
    //  });
    //  map.addControl(drawControl);
    
  },
};
</script>

<style scoped>
#map {
  height: calc(100vh - 120px) ;
}
a.leaflet-control-zoom-in {
    background-color: #545c64 !important;
    color: #fff !important;
}
</style>