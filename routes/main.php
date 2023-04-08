<?php 

use core\app;
// ([0-9a-zA-Z-_]+)
// ([0-9a-zA-Z-_]+)
// ([0-9a-zA-Z-_\?\=\&\+]+)
// ([0-9]+)

app::get('/', '/home/index', 'main');
app::get('/home', '/home/index', 'main');
app::get('/dd', '/dd/dd', 'main');

/*error*/
app::get('/404', '/error/PageNotFound', 'main');
app::get('/error/type/([0-9a-zA-Z-_]+)', 
	'/error/errorType/([0-9a-zA-Z-_]+)', 'main');


