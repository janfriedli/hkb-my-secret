<html>
<head>
    <meta charset="UTF-8"/>
    <title>My Secret</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <style>
        #success, #failure {
            padding: 1rem;
            display: none;
            border-radius: 0.4rem;
        }

        #success {
            color: #3C763D;
            background-color: #DFF0D8;
            border: 1px solid #3C763D;
        }

        #failure {
            color: #A94442;
            background-color: #F2DEDE;
            border: 1px solid #A94442;
        }

        textarea {
            height: 25rem;
        }

        .navigation {
            background: #f4f5f6;
            border-bottom: .1rem solid #d1d1d1;
            display: block;
            height: 5.2rem;
            left: 0;
            max-width: 100%;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        .navigation .title {
            display: inline;
            font-size: 1.6rem;
            line-height: 5.2rem;
            padding: 0;
            text-decoration: none;
        }

        #mainContainer {
            margin-top: 8rem;
        }

        footer {
            position: fixed;
            bottom: 0px;
            right: 0px;
        }
    </style>
</head>

<body>
<main class="wrapper">
    <nav class="navigation">
        <section class="container">
            <i class="fa img fa-user-secret"></i>
            <a class="title" href="/">My Secret</a>
        </section>
    </nav>

    <div id="mainContainer" class="container">
        <div class="row">
            <div class="column">
                <h2>Mein Geheimnis</h2>
                <textarea id="secretText" rows="10" cols=" name=" secret"
                placeholder="Teile mir dein Geheimnis anonym mit"></textarea>
                <button id="sendSecret" class="button">Abschicken</button>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div id="success">Geheimnis gespeichert</div>
                <div id="failure">Ups, da hat was nicht geklappt</div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <section class="container">
            <p>
                by<a href="http://github.com/janfriedli" title="Jan Friedli" target="_blank"> Jan
                    Friedli</a>
            </p>
        </section>
    </footer>

    <script>
        $(function () {
            $("#sendSecret").click(function () {
                $('#success').css('display', 'none');
                $('#failure').css('display', 'none');

                var text = $('#secretText').val();
                $.post("send.php", {secret: text}, function (data, status) {
                    if (status == 'success') {
                        $('#success').css('display', 'block').text(data);
                        var text = $('#secretText').val('');
                    }
                });
            });

            $(document).ajaxComplete(function (event, xhr, settings) {
                if (xhr.status >= 400) {
                    $('#failure').css('display', 'block').text(data);
                }
            });
        });
    </script>
</main>
</html>