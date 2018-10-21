<!DOCTYPE html>
<html>
    <head>
        <title>Error!!</title>
        <style>
            html, body {height: 100%;}
            body {margin: 0; padding: 0; width: 100%; color: #99A5AA; display: table; font-weight: 100; }
            .container {text-align: center; display: table-cell; vertical-align: middle;}
            .content {text-align: center; display: inline-block;}
            .title {font-size: 80px; margin-bottom: 40px;font-weight: bold}
            .content p {font-size: 24px;}
            a {text-decoration: none;}
            .btn {
                padding: 10px 20px;
                border: 1px solid #ccc;
                text-align: center;
                color: #767E82;
                background-color: #fafafa;
                display: inline-block;
            }
            .btn:hover{background-color:#e6e6e6}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Error!!</div>
                <p>
                    Lo sentimos pero no tiene acceso a este módulo.
                </p>
                <p>
                    <a href="#" class="btn" onclick="goBack()">Ir atrás</a> | <a href="{!! url('/') !!}" class="btn">Iniciar Sesión</a>
                </p>
            </div>
        </div>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</html>