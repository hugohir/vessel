L.Control.Layers.TogglerIcon = L.Control.Layers.extend({
    options: {
        // Optional base CSS class name for the toggler element
        togglerClassName: undefined
    },

    _initLayout: function(){
        L.Control.Layers.prototype._initLayout.call(this);
        if (this.options.togglerClassName) {
            L.DomUtil.addClass(this._layersLink, togglerClassName);
        }
    }
});
