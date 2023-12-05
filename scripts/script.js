document.querySelector('#archive').addEventListener('click', function() {
    fetch('./scripts/archiveJSON.php').then(function (response) {
        response.json().then(function (archives) {
            document.querySelector('#archive').style.display = 'none';
            archives.forEach(element => {
                document.querySelector('div.archives').innerHTML += `<a href="./index.php?page=1&id=`+ element.id_billet +`" class="lienBillet">
                <div class="titreFlex">
                    <h3>`
                        + element.titre +
                    `</h3>
                    <p>`
                        + element.date_post +
                    `</p>
                </div>
                <p>`
                    + element.contenu_post.replaceAll('<br>','') +
                `</p>
                <p class="signature">Par `+ element.pseudo +`</p>
            </a>`
            });
        });
    });
});