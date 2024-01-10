
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to job applications!</title>
    <link rel="stylesheet" href="../main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="main-wrapper">
        <div class="image-wrapper">
            <img src="/audibook_logo.svg" id="logoImage" alt="audibook logo">
        </div>
        <div class="form-wrapper">
            <div>
                <h1>Prijava na delovno mesto</h1>
            </div>

            <div>
                <form>
                    <div class="input-group">
                        <label class="font-bold" for="nameInput">Ime in priimek</label>
                        <input type="text" id="nameInput" placeholder="Janez Novak" required>
                    </div>

                    <div class="input-group">
                        <label class="font-bold" for="genderSelect">Spol</label>
                        <select id="genderSelect">
                            <option value="male">Moški</option>
                            <option value="female">Ženski</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label class="font-bold" for="emailInput">Email address</label>
                        <input type="text" id="emailInput" placeholder="janez.novak@gmail.com" required>
                    </div>

                    <div class="input-group">
                        <label class="font-bold" for="dobInput">Datum rojstva</label>
                        <input type="date" id="dobInput" placeholder="15.06.1994" required>
                    </div>

                    <div class="input-group">
                        <label class="font-bold" for="linkInput">Življenjepis / LinkedIn profil</label>
                        <input type="text" id="linkInput" placeholder="https://www.linkedin.com/in/janez-novak" required>
                    </div>
                    <div id="errorContainer" style="text-align: start; color: red;"></div>
                    <div id="successContainer" style="text-align: start; color: green;"></div>
                    <button id="submitBtn">Pošlji</button>
                </form>
            </div>
        </div>
    </div>
</body>

<footer>
    <script>
        $('#submitBtn').on('click touch', function (e) {
            e.preventDefault();

            let payload = JSON.stringify({
                'name': $('#nameInput').val(),
                'gender': $('#genderSelect').val(),
                'email': $('#emailInput').val(),
                'date_of_birth': $('#dobInput').val(),
                'cv_link': $('#linkInput').val()
            })

            $.ajax({
                url: '/form.php',
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: payload,
                success: function (json) {
                    if (json.success) {
                        $('#successContainer').html(json.response);
                    } else {
                        $('#errorContainer').html(json.error);
                    }
                }
            });
        });
    </script>
</footer>
</html>
