if (document.querySelector("body").classList.contains("woocommerce-checkout")) {
  const map = L.map("map").setView(
    [zee_script_object.toko_lat, zee_script_object.toko_lng],
    13
  );

  const tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 16,
    attribution:
      '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  }).addTo(map);

  var routeControl = L.Routing.control({
    waypoints: [
      L.latLng(zee_script_object.toko_lat, zee_script_object.toko_lng),
      L.latLng(zee_script_object.toko_lat, zee_script_object.toko_lng),
    ],
  }).addTo(map);

  routeControl.on("routesfound", function (e) {
    var routes = e.routes;
    var summary = routes[0].summary;
    var distance = Math.floor(summary.totalDistance);
    var coor = routes[0].inputWaypoints[1].latLng;

    document.querySelector("#billing_coordinate").value =
      coor.lat + "," + coor.lng;
    document.querySelector("#billing_distance").value = distance;

    jQuery("body").trigger("update_checkout");
  });
}
