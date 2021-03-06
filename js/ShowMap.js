function mapa(longitud,latitud){
	var map = new ol.Map({
							layers: [new ol.layer.Tile({source: new ol.source.OSM()})],
							target: 'map',
							view: new ol.View({
												projection: 'EPSG:4326',
												center: [longitud, latitud],
												zoom: 16
											})
						});
	var myFullScreenControl = new ol.control.FullScreen();
    map.addControl(myFullScreenControl);
}
