<div id="regionGenerico">
    <div class="well">
        <div class="row">
            <label class="col-sm-1 control-label">Ciudad:</label>
            <div class="col-xs-2">
                <select>
                    <option>Ciudad</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>Valparaiso</option>
                    <option>Viña del Mar</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                </select>
            </div>
            <label class="col-sm-2 control-label">Filtrado por:</label>
            <div class="col-xs-3" id="filtrado1">
                <select id="selectFiltradoRegional" onchange="desbloquearRegionalOpcional()">
                    <option>Seleccione</option>
                    <option>Genero</option>
                    <option>Alfabeticamente</option>
                </select>
            </div>
            <div class="col-xs-2" id="filtradoOpcionalRegional">
                <select disabled="disabled">
                    <option>Todo</option>
                    <option>Genero1</option>
                    <option>Genero2</option>
                </select>
            </div>
            <div class="col-xs-1">
                <button id="botonRegion" class="glyphicon glyphicon-search" onclick="actualizarRegion()"></button>
            </div>
        </div>
    </div>
</div>

<div id="nacionalGenerico">
    <div class="well">
        <div class="row">
            <label class="col-sm-1 control-label">Region:</label>
            <div class="col-xs-2">
                {!! Form::select('region', $regiones, null,['id'=>'region','class' => 'form-control', 'placeholder' => 'Seleccione una región..','required']) !!}

            </div>
            <label class="col-sm-2 control-label">Filtrado por:</label>
            <div class="col-xs-3">
                <select id="selectFiltradoNacional" onchange="desbloquearNacionalOpcional()">
                    <option>Seleccione Filtrado</option>
                    <option>Region</option>
                    <option>Genero</option>
                    <option>Alfabeticamente</option>
                </select>
            </div>
            <div class="col-xs-2" id="filtradoOpcionalNacional">
                <select disabled="disabled">
                    <option>Todo</option>
                    <option>Genero1</option>
                    <option>Genero2</option>
                </select>
            </div>
            <div class="col-xs-1">
                <button id="botonNacional" class="glyphicon glyphicon-search" onclick="actualizarNacional()"></button>
            </div>
        </div>
    </div>
</div>

<div class="well" id="busquedaNacionalRegion">
    <table id="tablaNacionalRegion" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Region</th>
            <th>Genero</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>RegionTiger Nixon</td>
            <td>RegoinSystem Architect</td>
            <td>Edinburgh</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td><a href="#">Ver</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="well" id="busquedaNacionalGenero">
    <table id="tablaNacionalGenero" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Genero</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>GeneroNixon</td>
            <td>GeneroSystem Architect</td>
            <td>Edinburgh</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td><a href="#">Ver</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="well" id="busquedaNacionalAlfabeticamente">
    <table id="tablaNacionalAlfa" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Genero</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>ATiger Nixon</td>
            <td>BSystem Architect</td>
            <td>CEdinburgh</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td><a href="#">Ver</a></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="well" id="busquedaRegionalGenero">
    <table id="tablaRegionalGenero" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Genero</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>GeneroEdinburgh</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>Generoan Francisco</td>
            <td><a href="#">Ver</a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="well" id="busquedaRegionalAlfabeticamente">
    <table id="tablaRegionalAlfa" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Genero</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>AAAATiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td><a href="#">Ver</a></td>
        </tr>
        <tr>
            <td>AAAAshton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td><a href="#">Ver</a></td>
        </tr>
        </tbody>
    </table>
</div>
