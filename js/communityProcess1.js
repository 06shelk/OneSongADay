document.addEventListener('DOMContentLoaded', function() {
    var sortSelect = document.getElementById('sortSelect');

    sortSelect.addEventListener('change', function() {
        var selectedValue = sortSelect.value;
        if (selectedValue === '2') {
            window.location.href = 'communityProcess1.php?sort=popular';
        } else {
            window.location.href = 'communityProcess1.php?sort=latest';
        }
    });
});
