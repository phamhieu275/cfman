<?php 

define('ROWS_PER_PAGE', 3);
define('ITEM_IMAGE_PATH', WWW_ROOT.'img'.DS.'menu');
define('USER_IMAGE_PATH', WWW_ROOT.'img'.DS.'user');
/*================ Role ===============*/
define('GROUP_ADMINISTRATOR', 1);
define('GROUP_STAFF', 2);
define('GROUP_WAITER', 3);

/*================ Status =============*/
define('STATUS_ACTIVE', 1);
define('STATUS_DISABLE', 0);

define('STATUS_ORDER_ORDERING', 0);
define('STATUS_ORDER_WAITING', 1);
define('STATUS_ORDER_SERVICED', 2);
define('STATUS_ORDER_CLOSE', 3);

define('STATUS_ORDER_ITEM_REGISTER', 0);
define('STATUS_ORDER_ITEM_BRINGING', 1);
define('STATUS_ORDER_ITEM_RECEIVED', 2);
define('STATUS_ORDER_ITEM_CANCELED', 3);

Configure::write('user_group', array(
	GROUP_STAFF => 'Quản lý',
	GROUP_WAITER => 'Nhân viên phục vụ',
))


?>