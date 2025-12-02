
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">

    <style>
        body {
            width: 100%;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            background: linear-gradient(to bottom, #16a085, #f4d03f);
        }

        h1 {
            margin-top: 40px;
            font: 400 48px 'Roboto Slab', serif;
            color: white;
            text-align: center;
        }

        .form__contact {
            max-width: 600px;
            width: 100%;
            margin-top: 40px;
            border-left: 30px solid white;
            border-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSI0MS44NnB4IiBoZWlnaHQ9IjUyLjMyNnB4IiB2aWV3Qm94PSIwIDAgNDEuODYgNTIuMzI2IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA0MS44NiA1Mi4zMjYiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0wLDB2MjUuMTYzaDcuMDk3YzAuNTAxLTQuOTg5LDQuNzEyLTguODg0LDkuODMzLTguODg0YzUuNDU4LDAsOS44ODQsNC40MjUsOS44ODQsOS44ODRzLTQuNDI1LDkuODg0LTkuODg0LDkuODg0Yy01LjEyMSwwLTkuMzMyLTMuODk1LTkuODMzLTguODg0SDB2MjUuMTYzaDQxLjg2VjBIMHoiLz48L3N2Zz4=) 5% 100% repeat;
            border-image-width: 0 0 0 30px;
        }

        fieldset {
            border: none;
            padding: 40px 40px 60px 80px;
            background: #fff linear-gradient(rgba(0,0,0,.1) 1px, transparent 0) 0 20px / 100% 40px;
            font: 26px 'Shadows Into Light', cursive;
            border-radius: 0 20px 20px 0;
            position: relative;
        }

        fieldset:after {
            position: absolute;
            top: 0;
            left: 50px;
            content: '';
            height: 100%;
            width: 1px;
            border-left: double #E08183;
        }

        p {
            margin: 0 0 40px 0;
            line-height: 40px;
            color: #333;
        }

        h2, h3 {
            font-family: 'Shadows Into Light', cursive;
            margin-bottom: 20px;
            color: #E08183;
        }

        a {
            color: #2980b9;
            font-size: 24px;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>

    <h1>Confirmation</h1>

    <form class="form__contact">
        <fieldset>

            <h2>Merci !</h2>

            <p>Votre demande a bien été enregistrée.</p>

            <p><strong>Voici votre code de suivi :</strong></p>

            <h3><?= $le_code ?></h3>

            <p>
                <a href="https://obiwan.univ-brest.fr/~e22204613/index.php/message/suivre/<?= $le_code ?>">
                    Cliquez ici pour suivre votre demande
                </a>
            </p>

            <p>Gardez ce code pour vérifier l’avancement de votre demande.</p>

        </fieldset>
    </form>

</body>
</html>
