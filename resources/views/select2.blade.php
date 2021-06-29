<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.select2').select2();
});

window.addEventListener('tagsUpdated', event => {
    location.reload();
});
window.addEventListener('categoriesUpdated', event => {
    location.reload();
});
</script>
