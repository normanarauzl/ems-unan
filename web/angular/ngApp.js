var app = angular.module('ngApp',[])

function SolicitudController($scope, $http)
{
    $scope.add = function()
    {
        var NoSerie = $scope.NoSerie
        var Descripcion = $('#select2-IdEquipo-container').text()
        var bandera = false

        angular.forEach($scope.detalleSolicitud,function (value, key) {
            if(value.NoSerie == NoSerie)
        angular.forEach($scope,function (value, key) {
            if(value.IdEquipo == IdEquipo)
            {
                alertify.error('El equipo ya existe en la lista')
                bandera = true
            }
        })

        if ($scope.Modelo == null)
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
        var IdEquipo = $scope.IdEquipo
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

    $scope.add = function()
    {
        var IdEquipo = $scope.IdEquipo
        var Descripcion = $('#select2-IdEquipo-container').text()
        var bandera = false
        angular.forEach($scope.movimientoMantenimiento,function (value, key) {
            if(value.IdEquipo == IdEquipo)
            {
                alertify.error('El equipo ya existe en la lista')
                bandera = true
            }
        })

        if ($scope.Modelo == null)
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
        var IdEquipo = $scope.IdEquipo
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