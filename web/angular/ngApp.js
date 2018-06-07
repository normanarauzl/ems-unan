var app = angular.module('ngApp',[])

function SolicitudController($scope, $http)
{

    var IdEquipo = null
    CargarDetalleSolicitud()

    function BuscarEquipo(IdEquipo, Id)
    {
        var equipo = {Id:'',IdEquipo:'',Descripcion:'',Marca:'',Color:'',Modelo:'',NoSerie:''}

        angular.forEach($scope.equipos, function(value, key){
            if (value.Id == IdEquipo)
            {
                equipo.Id = Id,
                equipo.IdEquipo = value.Id,
                equipo.Descripcion = value.Descripcion,
                equipo.Marca = value.Marca,
                equipo.Color = value.Color,
                equipo.Modelo = value.Modelo,
                equipo.NoSerie = value.NoSerie
            }
        })
        return equipo
    }

    function CargarDetalleSolicitud()
    {
        oldDetalle = $scope.detalleSolicitud
        $scope.detalleSolicitud = []

        angular.forEach(oldDetalle,function (value, key) {

            $scope.detalleSolicitud.push(BuscarEquipo(value.IdEquipo, value.Id))
        })
    }

    $scope.add = function()
    {
        var bandera = false
        var Descripcion = $('#select2-Descripcion-container').text()

        angular.forEach($scope.detalleSolicitud,function (value, key) {
            if(value.IdEquipo == IdEquipo)
            {
                alertify.error('El equipo ya existe en la lista')
                bandera = true
            }
        })

        if (IdEquipo == null)
        {
            alertify.error('Debe seleccionar un equipo de la lista')
        }
        else if (!bandera)
        {
            var equipo = {
                IdEquipo:IdEquipo,
                Descripcion:Descripcion,
                Marca:$scope.Marca,
                Color:$scope.Color,
                Modelo:$scope.Modelo,
                NoSerie:$scope.NoSerie
            }

            $scope.detalleSolicitud.push(equipo)
        }
    }

    $scope.del = function(index){
        $scope.detalleSolicitud.splice(index, 1)
    }

    $scope.SetEquipo = function()
    {
        IdEquipo = $scope.IdEquipo
        $http({
            method : 'GET',
            url : 'datos-equipo',
            params: {IdEquipo:IdEquipo},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        }).then(function OnSuccess(response) {
            if(response.data.length == 0)
                alertify.success('No hay informacion para mostrar')
            else {
                    $scope.IdEquipo = response.data.IdEquipo,
                    $scope.Marca = response.data.Marca,
                    $scope.Modelo = response.data.Modelo,
                    $scope.Color = response.data.Color,
                    $scope.NoSerie = response.data.NoSerie
            }
        }, function OnError(response) {
            console.log(response.data)
        })
    }

}


//AQUI AGREGO CONTROLADOR PARA LOS MANTENIMIENTOS --- ERICK----
function MantenimientoController($scope, $http)
{
    var IdEquipo = null
    CargarMovimientoMantenimiento()

    function BuscarEquipo(IdEquipo, Id)
    {
        var equipo = {Id:'',IdEquipo:'',Descripcion:'',Marca:'',Color:'',Modelo:'',NoSerie:''}

        angular.forEach($scope.equipos, function(value, key){
            if (value.Id == IdEquipo)
            {
                equipo.Id = Id,
                    equipo.IdEquipo = value.Id,
                    equipo.Descripcion = value.Descripcion,
                    equipo.Marca = value.Marca,
                    equipo.Color = value.Color,
                    equipo.Modelo = value.Modelo,
                    equipo.NoSerie = value.NoSerie
            }
        })
        return equipo
    }

    function CargarMovimientoMantenimiento()
    {
        oldDetalle = $scope.movimientoMantenimiento
        $scope.movimientoMantenimiento = []

        angular.forEach(oldDetalle,function (value, key) {

            $scope.movimientoMantenimiento.push(BuscarEquipo(value.IdEquipo, value.Id))
        })
    }

    $scope.add = function()
    {
        var bandera = false
        var Descripcion = $('#select2-Descripcion-container').text()

        angular.forEach($scope.movimientoMantenimiento,function (value, key) {
            if(value.IdEquipo == IdEquipo)
            {
                alertify.error('El equipo ya existe en la lista')
                bandera = true
            }
        })

        if (IdEquipo == null)
        {
            alertify.error('Debe seleccionar un equipo de la lista')
        }
        else if (!bandera)
        {
            var equipo = {
                IdEquipo:IdEquipo,
                Descripcion:Descripcion,
                Marca:$scope.Marca,
                Color:$scope.Color,
                Modelo:$scope.Modelo,
                NoSerie:$scope.NoSerie
            }

            $scope.movimientoMantenimiento.push(equipo)
        }
    }

    $scope.del = function(index){
        $scope.movimientoMantenimiento.splice(index, 1)
    }

    $scope.SetEquipo = function()
    {
        IdEquipo = $scope.IdEquipo
        $http({
            method : 'GET',
            url : 'datos-equipo',
            params: {IdEquipo:IdEquipo},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        }).then(function OnSuccess(response) {
            if(response.data.length == 0)
                alertify.success('No hay informacion para mostrar')
            else {
                $scope.IdEquipo = response.data.IdEquipo,
                    $scope.Marca = response.data.Marca,
                    $scope.Modelo = response.data.Modelo,
                    $scope.Color = response.data.Color,
                    $scope.NoSerie = response.data.NoSerie
            }
        }, function OnError(response) {
            console.log(response.data)
        })
    }

}

app.controller('SolicitudController', SolicitudController)

app.controller('MantenimientoController', MantenimientoController)