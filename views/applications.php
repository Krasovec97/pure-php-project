<!doctype html>
<html lang="en">
<?php include 'includes/head.php'?>
<body>
<div class="main-wrapper">
    <div class="image-wrapper">
        <a href="/"><img src="../public/audibook_logo.svg" id="logoImage" alt="audibook logo"></a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <h1>Vse prijave</h1>
        </div>

        <div class="row mt-4">
            <div class="col-8 mx-auto">
                <div class="row bg-primary text-white py-3 rounded">
                    <div class="col-2">Ime in priimek</div>
                    <div class="col-2">Email</div>
                    <div class="col-1">Spol</div>
                    <div class="col-2">Datum rojstva</div>
                    <div class="col-5">Profil</div>
                </div>
            </div>
            <div class="col-8 mx-auto" id="application_table_rows"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        getApplications();
    })

    function getApplications() {
        $.ajax({
            url: '/user/applications',
            method: 'GET',
            contentType: 'application/json',
            dataType: 'json',
            success: function (json) {
                console.log(json);
                if (json.success) {
                    let html = '';
                    json.response.forEach(function (application) {
                        html += `
                        <div class="row py-3 rounded border-bottom">
                            <div class="col-2"><a href="/application/${application.id}">${application.full_name}</a></div>
                            <div class="col-2">${application.email}</div>
                            <div class="col-1">${application.gender}</div>
                            <div class="col-2">${application.date_of_birth}</div>
                            <div class="col-5">${application.cv_link}</div>
                        </div>
                        `
                    })

                    $('#application_table_rows').append(html);
                }
            }
        });
    }
</script>
</body>
</html>