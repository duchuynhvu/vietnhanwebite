<script>
    jwplayer('video').setup({
        type: "mp4",
        file: <?php echo json_encode($video) ?>,
        width: "100%",
        height: "100%"
    });
</script>