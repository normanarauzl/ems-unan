var app = angular.module('ngApp',[])

function SolicitudController($scope, $http)
{

    $scope.add = function()
    {
        var Id_Equipo = $scope.IdEquipo

        var bandera = false

        angular.forEach($scope.detalleSolicitud,function (value, key) {
            if(value.Id_Equipo == Id_Equipo)
            {
                alertify.error('El equipo ya existe en la lista')
                bandera = true
            }
        })
        if (isNaN($scope.IdEquipo))
        {
            alertify.error('Debe seleccionar un profesor de la lista')
        }
        else if (!bandera)
        {
            var equipo = {
                Id_Equipo:Id_Equipo,
                Marca:$scope.Marca,
                Color:$scope.Color,
                Modelo:$scope.Modelo,
                No_Serie:$scope.Serie
            }

            $scope.detalleSolicitud.push(equipo)
        }
    }

    $scope.del = function(index){
        $scope.detalleSolicitud.splice(index, 1)
    }

    $scope.SetEquipo = function()
    {
        var Id_Equipo = $scope.IdEquipo


        $http({
            method : 'GET',
            url : 'datos-equipo',
            params: {Id_Equipo:Id_Equipo},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        }).then(function OnSuccess(response) {
            if(response.data.length == 0)
                alertify.success('No ha informacion para mostrar')
            else {
                    $scope.IdEquipo = response.data.Id_Equipo,
                    $scope.Marca = response.data.Marca,
                    $scope.Modelo = response.data.Modelo,
                    $scope.Color = response.data.Color,
                    $scope.Serie = response.data.No_Serie
            }
        }, function OnError(response) {
            console.log(response.data)
        })
    }
}

app.controller('SolicitudController', SolicitudController)