const routes = {
            routeNames : {
    "employees:index": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "api/employee/index",
        "name": "employees:index",
        "action": "App\\Http\\Controllers\\Api\\EmployeeController@index"
    },
    "employee:store": {
        "domain": null,
        "method": "POST",
        "uri": "api/employee/store",
        "name": "employee:store",
        "action": "App\\Http\\Controllers\\Api\\EmployeeController@store"
    },
    "employee:update": {
        "domain": null,
        "method": "POST",
        "uri": "api/employee/update/{employee}",
        "name": "employee:update",
        "action": "App\\Http\\Controllers\\Api\\EmployeeController@update"
    },
    "employee:upload_image": {
        "domain": null,
        "method": "POST",
        "uri": "api/employee/upload-image/{employee}",
        "name": "employee:upload_image",
        "action": "App\\Http\\Controllers\\Api\\EmployeeController@uploadImage"
    },
    "employee:show": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "api/employee/show/{employee}",
        "name": "employee:show",
        "action": "App\\Http\\Controllers\\Api\\EmployeeController@show"
    },
    "employee:delete": {
        "domain": null,
        "method": "POST",
        "uri": "api/employee/delete/{employee}",
        "name": "employee:delete",
        "action": "App\\Http\\Controllers\\Api\\EmployeeController@delete"
    },
    "department:index": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "api/department/index",
        "name": "department:index",
        "action": "App\\Http\\Controllers\\Api\\DepartmentController@index"
    },
    "department:store": {
        "domain": null,
        "method": "POST",
        "uri": "api/department/store",
        "name": "department:store",
        "action": "App\\Http\\Controllers\\Api\\DepartmentController@store"
    },
    "department:delete": {
        "domain": null,
        "method": "POST",
        "uri": "api/department/delete/{department}",
        "name": "department:delete",
        "action": "App\\Http\\Controllers\\Api\\DepartmentController@delete"
    },
    "countries:index": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "api/countries/index",
        "name": "countries:index",
        "action": "App\\Http\\Controllers\\Api\\CountryController@index"
    },
    "states:index": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "api/states/index/{country}",
        "name": "states:index",
        "action": "App\\Http\\Controllers\\Api\\StateController@index"
    },
    "cities:index": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "api/cities/index/{state}",
        "name": "cities:index",
        "action": "App\\Http\\Controllers\\Api\\CityController@index"
    },
    "login": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "login",
        "name": "login",
        "action": "App\\Http\\Controllers\\Auth\\LoginController@showLoginForm"
    },
    "logout": {
        "domain": null,
        "method": "POST",
        "uri": "logout",
        "name": "logout",
        "action": "App\\Http\\Controllers\\Auth\\LoginController@logout"
    },
    "register": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "register",
        "name": "register",
        "action": "App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm"
    },
    "password.request": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "password/reset",
        "name": "password.request",
        "action": "App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm"
    },
    "password.email": {
        "domain": null,
        "method": "POST",
        "uri": "password/email",
        "name": "password.email",
        "action": "App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail"
    },
    "password.reset": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "password/reset/{token}",
        "name": "password.reset",
        "action": "App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm"
    },
    "password.update": {
        "domain": null,
        "method": "POST",
        "uri": "password/reset",
        "name": "password.update",
        "action": "App\\Http\\Controllers\\Auth\\ResetPasswordController@reset"
    },
    "password.confirm": {
        "domain": null,
        "method": "GET|HEAD",
        "uri": "password/confirm",
        "name": "password.confirm",
        "action": "App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm"
    }
}
,
            baseUrl: 'http://vue-tailwind.test/',
            baseProtocol: 'http',
            baseDomain: 'vue-tailwind.test',
            basePort: false,
        }
export default {
    install(Vue) {
        Vue.mixin({
            methods: {
                route(routeName, params) {
                    let routeUrl = routes.routeNames[routeName]['uri'];
                    $.each(params, function (param, value) {
                        routeUrl = routeUrl.replace('{' + param + '?}', value);
                        routeUrl = routeUrl.replace('{' + param + '}', value);
                    });
                    return routes.baseUrl+routeUrl;
                },
            }
        })
    }
};