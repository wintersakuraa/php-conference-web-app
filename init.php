<?php

require_once 'App/Core/Controller.php';

require_once 'App/Core/Router.php';

require_once 'App/Core/Validator.php';

require_once 'App/DAL/DbContext.php';

require_once 'App/DAL/Interfaces/BaseRepositoryInterface.php';

require_once 'App/DAL/Repositories/ConferenceRepository.php';

require_once 'App/Service/Interfaces/BaseServiceInterface.php';

require_once 'App/Service/Implementations/ConferenceService.php';

require_once 'config.php';

$actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
if ($actual_link == BASE_ROUTE . '/init.php') die ("Direct access not permitted");
