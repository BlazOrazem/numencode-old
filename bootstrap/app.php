<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Create a new NumenCodeCMS application instance which serves as the "glue"
| for all the components, and is the IoC container for the system binding
| all of the various parts.
|
*/

$app = new App\Core\Bootstrap();

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
