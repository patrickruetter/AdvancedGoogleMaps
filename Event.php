<?php

namespace Plugin\AdvancedGoogleMaps;

class Event {

    public static function ipBeforeController() {
        if( ipIsManagementState() ) {
          ipAddJs('assets/js/plugin.js');
        }

        ipAddJs('https://maps.googleapis.com/maps/api/js?v=3.exp');
        ipAddJs('assets/js/map.js');

        ipAddCss('assets/css/map.css');

        if( !ipIsManagementState() ) {
        }
    }

}
