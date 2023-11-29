document.querySelector('#archive').addEventListener('click', function() {
    fetch('./scripts/archiveJSON.php').then(function (response) {
        response.json().then(function (archives) {
            
        });
    });
});