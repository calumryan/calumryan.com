import "leaflet/dist/leaflet";
import "leaflet.markercluster/dist/leaflet.markercluster.js";

function initMap() {
  const mqMobile = window.matchMedia("(max-width: 600px)");
  const initialZoom = mqMobile.matches ? 2 : 3;

  const map = L.map("mapcontainer", {
    minZoom: 5,
    scrollWheelZoom: false,
  }).setView([51.505, -0.09], initialZoom);

  const mapdataScript = document.getElementById("mapdata");
  const mapData = mapdataScript ? JSON.parse(mapdataScript.textContent) : {};

  const tileSrc =
    "https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.png";
  const tileAttribution =
    '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, <a href="https://maps.stamen.com/">Stamen</a>';

  const markerIcon = L.icon({
    ...L.Icon.Default.prototype.options,
    iconUrl: "/assets/images/map/marker-icon.png",
    iconRetinaUrl: "/assets/images/map/marker-icon-2x.png",
    shadowUrl: "/assets/images/map/marker-shadow.png",
  });
  const makeMarkers = (feature, latlng) =>
    L.marker(latlng, { icon: markerIcon });

  const makePopup = (feature, layer) => {
    if (feature.properties && feature.properties.name) {
      layer.bindPopup(
        `<a class="link" href="${feature.properties.url}">${feature.properties.name}</a>`
      );
    }
  };

  L.tileLayer(tileSrc, { attribution: tileAttribution, noWrap: true }).addTo(
    map
  );

  let markers = L.markerClusterGroup();

  const geoJsonLayer = L.geoJSON(mapData.features, {
    pointToLayer: makeMarkers,
    onEachFeature: makePopup,
  });

  markers.addLayer(geoJsonLayer);
  map.addLayer(markers);
}

const mapElement = document.getElementById("mapcontainer");

if (mapElement) {
  window.addEventListener("load", initMap);
}
