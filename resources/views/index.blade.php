<!DOCTYPE html>
<html lang="en">
<head>
    <title>TaberMus Chile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        .flotar {
            position: fixed;
            top: 50px;
            left: 0;
            padding: 0;
            background-color: #5e5e5e;
            border: 2px solid;
            z-index: 1;
            width: 25px;
        }


        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
    @yield('css')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('scripts')
    {{ Html::style('css/barraLateral.css') }}
    {{ Html::style('css/plantilla.css') }}
    {{ Html::style('css/app.css') }}
    {{ Html::script('js/scriptBarraLateral.js') }}
    {{ Html::script('js/scriptFacebook.js') }}
    {{ Html::script('js/dropdown.js') }}
    {{ Html::script('js/integrantes.js') }}
    {{ Html::script('js/scriptsBandaAgregarEliminarElementos.js') }}
    {{ Html::script('js/scriptBusqueda.js') }}

</head>

<body>

<img src="/public/img/mapa-Chile-web.png">

<div class="row">
    <label class="col-sm-1 control-label">Region:</label>
    <div class="col-xs-2">
        <select>
            <option>Region</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>Valparaiso</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
        </select>
    </div>

    <div class="col-xs-1">
        <button id="botonNacional" onclick="">Entrar</button>
    </div>
</div>
</body>
</html>
