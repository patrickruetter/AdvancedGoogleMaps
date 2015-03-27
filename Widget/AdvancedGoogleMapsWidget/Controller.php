<?php
namespace Plugin\AdvancedGoogleMaps\Widget\AdvancedGoogleMapsWidget;

class Controller extends \Ip\WidgetController
{
    public function getTitle()
    {
        return __('Advanced Google Maps Widget', 'ipAdmin');
    }

    public function update($widgetId, $postData, $currentData) {
        if (isset($postData['method'])) {
            switch ($postData['method']) {
                case 'saveOptions':
                    if (isset($postData['address'])) {
                        $currentData['options']['address'] = $postData['address'];
                    }
                    if (isset($postData['zoom'])) {
                        $currentData['options']['zoom'] = $postData['zoom'];
                    }
                    if (isset($postData['scrollWheel'])) {
                        $currentData['options']['scrollWheel'] = $postData['scrollWheel'];
                    }
                    if (isset($postData['zoomControl'])) {
                        $currentData['options']['zoomControl'] = $postData['zoomControl'];
                    }
                    if (isset($postData['mapType'])) {
                        $currentData['options']['mapType'] = $postData['mapType'];
                    }
                    return $currentData;
                break;
                default:
                    throw new \Ip\Exception('Unknown command');
            }
        }

        return $currentData;
    }

    public function adminHtmlSnippet() {
        $variables = array(
            'optionsForm' => $this->optionsForm(),
        );
        return ipView('snippet/menu.php', $variables)->render();
    }

    protected function optionsForm() {
      $form = new \Ip\Form();
      $form->setEnvironment(\Ip\Form::ENVIRONMENT_ADMIN);

      $field = new \Ip\Form\Field\Text(
          array(
              'name' => 'address',
              'label' => __('Address', 'AdvancedGoogleMaps', false)
          )
      );
      $form->addField($field);

      $field = new \Ip\Form\Field\Number(
          array(
              'name' => 'zoom',
              'label' => __('Zoom', 'AdvancedGoogleMaps', false)
          )
      );
      $form->addField($field);

      $field = new \Ip\Form\Field\Checkbox(
          array(
              'name' => 'scrollWheel',
              'label' => __('Scroll Wheel', 'AdvancedGoogleMaps', false)
          )
      );
      $form->addField($field);

      $field = new \Ip\Form\Field\Checkbox(
          array(
              'name' => 'zoomControl',
              'label' => __('Zoom Control', 'AdvancedGoogleMaps', false),
              'checked' => true
          )
      );
      $form->addField($field);

      $values = array(
          array('ROADMAP', 'Roadmap'),
          array('SATELLITE', 'Satellite'),
          array('HYBRID', 'Hybrid'),
          array('TERRAIN', 'Terrain')
      );
      $field = new \Ip\Form\Field\Select(
          array(
              'name' => 'mapType',
              'label' => __('Map Type', 'AdvancedGoogleMaps', false),
              'values' => $values,
              'value' => 'MapTypeId.HYBRID'
          )
      );
      $form->addField($field);

      return $form; // Output a string with generated HTML form
  }

}
