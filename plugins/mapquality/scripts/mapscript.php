<script type="text/javascript">
    const map = tt.map({
    key: "<?php echo($key) ?>",
    container: "map",
    style: 'tomtom://vector/1/basic-main',
    center: [<?php echo($current_lon) ?>, <?php echo($current_lat) ?>],
    zoom: 15,
    theme: {
        style: 'main',
        layer: 'basic',
        source: 'vector'
    }

});

var maker = new tt.Marker().setLngLat([<?php echo($current_lon) ?>, <?php echo($current_lat) ?>]).addTo(map);
map.addControl(new tt.FullscreenControl());
map.addControl(new tt.NavigationControl());
</script>