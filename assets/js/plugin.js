IpWidget_AdvancedGoogleMapsWidget = function() { 
    this.$widgetObject = null;
    this.data = null;
    this.$controls = null;
    this.$widgetControls = null;

    this.init = function($widgetObject, data) {
        var options = {};
        if( typeof data.options !== 'undefined' ) {
          options.address = data.options.address;
          options.zoom = parseInt(data.options.zoom);
          options.scrollWheel = data.options.scrollWheel;
          options.zoomControl = data.options.zoomControl;
          options.mapType = data.options.mapType;
        }

        this.$widgetObject = $widgetObject;
        this.data = data;

        this.$widgetControls = $('#ipWidgetAdvancedGoogleMapsControls');

        this.$widgetObject.on( 'mouseenter', $.proxy(this.mouseenter, this) );
    };
 
    this.onAdd = function () {
      $.proxy(optionsPopup, this)();
    }

    var optionsPopup = function (index) {
        var data = this.data;
        var context = this;
        this.optionsPopup = $('#ipWidgetAdvancedGoogleMapsOptionsPopup');
        this.confirmButton = this.optionsPopup.find('.ipsConfirm');
        this.address = this.optionsPopup.find('input[name=address]');
        this.zoom = this.optionsPopup.find('input[name=zoom]');
        this.scrollWheel = this.optionsPopup.find('input[name=scrollWheel]');
        this.zoomControl = this.optionsPopup.find('input[name=zoomControl]');
        this.mapType = this.optionsPopup.find('select[name=mapType]');

        if( typeof data.options !== 'undefined' ) {
            if( typeof data.options.address !== 'undefined' ) {
                this.address.val(data.options.address);
            }
            if( typeof data.options.zoom !== 'undefined' ) {
                this.zoom.val(data.options.zoom);
            }
            if( typeof data.options.scrollWheel !== 'undefined' ) {
                this.scrollWheel.prop('checked', ( data.options.scrollWheel === 'true' ? true : false ) );
            }
            if( typeof data.options.zoomControl !== 'undefined' ) {
                this.zoomControl.prop('checked', ( data.options.zoomControl === 'true' ? true : false ) );
            }
            if( typeof data.options.mapType !== 'undefined' ) {
                this.mapType.val(data.options.mapType);
            }
        }

        this.optionsPopup.modal();

        this.confirmButton.off().on('click', $.proxy(saveOptions, context));
    };

    var saveOptions = function () {
        var data = {
            method: 'saveOptions',
            address: this.address.val(),
            zoom: this.zoom.val(),
            scrollWheel: this.scrollWheel.is(':checked'),
            zoomControl: this.zoomControl.is(':checked'),
            mapType: this.mapType.val(),
        };
        this.$widgetObject.save(data, 1);
        this.optionsPopup.modal('hide');
    };

    this.mouseenter = function() {
        var thisContext = this;
        var $widgetControls = this.$widgetControls;
        var $widgetObject = this.$widgetObject;
        $widgetControls.removeClass('hidden');
        $widgetControls.css('left', $widgetObject.offsetLeft);
        $widgetControls.css('top', $widgetObject.offsetTop);
        $widgetControls.css('position', 'absolute');
        $widgetControls.css('left', $widgetObject.offset().left);
        $widgetControls.css('top', $widgetObject.offset().top - $widgetControls.height() - 5);
        $widgetControls.find('.ipsOptions').off().on('click', function (e) {
            e.preventDefault();
            $.proxy(optionsPopup, thisContext)($(e.currentTarget).index()-1);
        });
    }

 
};
