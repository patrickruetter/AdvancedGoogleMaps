<div class="map"
  <?php
    foreach ($options as $option => $value) {
        echo 'data-'.strtolower($option).'="'.$value.'" ';
    }
  ?>
>
</div>
