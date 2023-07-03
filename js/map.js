// JS IS JUST TO SHOW THE MAP
// and plus a little Easter Egg ;)

const myApp = Object.create(null)

// ======================= MAP =========================

var lat = 0;  
var long = 0;
var zoom = 4;

function drawRectInCenter(x, y, width, height) {
  return [x - width / 2, y - height / 2, width, height]
}

function initmap(lat, long, zoom){
  var stamen =     L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}.{ext}', {
	attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
	subdomains: 'abcd',
	minZoom: 1,
	maxZoom: 16,
	ext: 'png'});
  
  return L.map('map-id', {layers: [stamen]}).setView([lat, long], zoom);
}


L.Canvas.FPCanvas = L.Canvas.extend({
  options: {
    width: 1,
    height: 1
  },
  initialize: function(name, options) {
    this.name = name;
    L.setOptions(this, options);
    L.Canvas.prototype.initialize.call(this, { padding: 0.5 })
  },
  _draw: function () {
		var layer, bounds = this._redrawBounds;
		this._ctx.save();
		if (bounds) {
			var size = bounds.getSize();
			this._ctx.beginPath();
			this._ctx.rect(bounds.min.x, bounds.min.y, size.x, size.y);
			this._ctx.clip();
		}

		this._drawing = true;

		for (var order = this._drawFirst; order; order = order.next) {
			layer = order.layer;
			if (!bounds || (layer._pxBounds && layer._pxBounds.intersects(bounds))) {
				layer._updatePath();
			}
		}
		this._drawing = false;
		this._ctx.restore();  // Restore state before clipping.
	},
});
L.canvas.fpCanvas = function(id, options) {
  return new L.Canvas.FPCanvas(id, options)
}

// ==================== ON LOAD ======================

var loaded = function(){
   console.clear()
  var myRenderer = L.canvas({ padding: 0.5 });
  // Handler when the DOM is fully loaded
  myApp.map = initmap(lat, long, zoom);

  var fpRender = L.canvas.fpCanvas({ padding: 0.5} )
  var circle = L.circle( [0,0], { color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 50000, renderer: fpRender } ).addTo(myApp.map).bindPopup("Ahoy! From <a alt=Null Island target=_blank href=https://en.wikipedia.org/wiki/Null_Island>Null Island</a>");
};

if (document.readyState === "complete" ||
    (document.readyState !== "loading" && !document.documentElement.doScroll)
) {
  callback();
} else {
  document.addEventListener("DOMContentLoaded", loaded);
}
// =========================================================
