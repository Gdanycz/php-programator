$(document).ready(function() {
    $('table tbody tr').click(function() {
        $(this).toggleClass('table-primary');
    });
});
