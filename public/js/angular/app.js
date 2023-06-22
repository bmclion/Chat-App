var app = angular.module('PracticalTaskApp',
    [
        'ngRoute'
    ], function ($interpolateProvider, $locationProvider, $routeProvider)
    {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');

        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        });

    });

//Used to get the main absolute path.
var main_path = location.pathname;

if (main_path.indexOf("/public") == -1)
{
    var url = '';
    var prod_url = window.location.origin + '/';
} else
{
    var url = main_path.substr(0, main_path.indexOf("/public") + 8);
    var prod_url = url;
}

app.filter('rawHtml', [
    '$sce',
    function ($sce)
    {
        return function (val)
        {
            return $sce.trustAsHtml(val);
        };
    }
]);
