<?php


?>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "ajax": {
                "url": "./getCalendarData.php",
                "dataSrc": ""
            },
            "columns": [{
                "data": "id"
            }, {
                "data": "typ_id"
            }, {
                "data": "day"
            }, {
                "data": "users_id"
            }, {
                "data": "text_short"
            }, {
                "data": "text_long"
            }]
        });
    });
</script>