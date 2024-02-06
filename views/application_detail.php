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
            <div class="col-12">
                <h1>Prošnja za zaposlitev</h1>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-8 mx-auto">
                <div class="row">
                    <div class="col-3 text-start fw-bold border-bottom border-dark">Ime in priimek:</div>
                    <div class="col-6 text-start border-bottom border-dark"><?php echo $full_name ?></div>
                </div>
            </div>

            <div class="col-8 mx-auto mt-4">
                <div class="row">
                    <div class="col-3 text-start fw-bold border-bottom border-dark">Datum rojstva:</div>
                    <div class="col-6 text-start border-bottom border-dark"><?php echo date('d.m.Y', strtotime($date_of_birth)) ?></div>
                </div>
            </div>

            <div class="col-8 mx-auto mt-4">
                <div class="row">
                    <div class="col-3 text-start fw-bold border-bottom border-dark">Spol:</div>
                    <div class="col-6 text-start border-bottom border-dark"><?php echo ucfirst($gender) ?></div>
                </div>
            </div>

            <div class="col-8 mx-auto mt-4">
                <div class="row">
                    <div class="col-3 text-start fw-bold border-bottom border-dark">Email:</div>
                    <div class="col-6 text-start border-bottom border-dark"><?php echo $email ?></div>
                </div>
            </div>

            <div class="col-8 mx-auto mt-4">
                <div class="row">
                    <div class="col-3 text-start fw-bold border-bottom border-dark">Link do profila:</div>
                    <div class="col-6 text-start border-bottom border-dark"><a href="<?php echo $cv_link ?>" target="_blank"><?php echo $cv_link ?></a></div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-8">
                <a class="btn btn-primary" href="/applications">Nazaj na vse prijave</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>