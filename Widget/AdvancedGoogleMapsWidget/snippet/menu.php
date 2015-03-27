<div class="ip advancedGoogleMaps">
    <div class="hidden" id="ipWidgetAdvancedGoogleMapsMenu">
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group">
                <button class="btn btn-default ipsEdit" role="button"><i class="fa fa-edit"></i></button>
                <button class="btn btn-default ipsLink" role="button"><i class="fa fa-link"></i></button>
                <button class="btn btn-default ipsSettings" role="button"><i class="fa fa-gears"></i></button>
                <button class="btn btn-default ipsDelete" role="button"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>
    </div>
    <div class="hidden" id="ipWidgetAdvancedGoogleMapsControls">
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group">
                <button type="button"  class="btn btn-default ipsOptions"><?php _e('Options', 'AdvancedGoogleMaps'); ?></button>
            </div>
        </div>
    </div>

    <div id="ipWidgetAdvancedGoogleMapsOptionsPopup" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php _e('Map options', 'AdvancedGoogleMaps'); ?></h4>
                </div>
                <div class="modal-body">
                    <?php echo $optionsForm ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Cancel', 'AdvancedGoogleMaps'); ?></button>
                    <button type="button" class="btn btn-primary ipsConfirm"><?php _e('Confirm', 'AdvancedGoogleMaps'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
