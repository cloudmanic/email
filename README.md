# Overview 

We really liked the email library offered by Codeigniter but of course this library is not composer / packagist ready. So we made our own version. Here are the things we changed.

* We added a wrapper class so we can call this via a static function call (see below).

* We hardcoded the charset to 'utf-8' in a few places.

* We stripped out all the local lang. support.

* We stripped out all the CI logging stuff.

* We set html as the default email type.

* We set the default useragent to "Cloudmaic"

* We set the defaul newline to "\r\n"

# How To Use

All the function calls are documented here: [http://ellislab.com/codeigniter/user-guide/libraries/email.html](http://ellislab.com/codeigniter/user-guide/libraries/email.html)


```php
Cloudmanic\Email\Message::initialize(array(
  'smtp_host' => '',
  'smtp_port' => '',
  'smtp_user' => '',
  'smtp_pass' => ''
));

Cloudmanic\Email\Message::from('support@cloudmanic.com', 'Cloudmanic Support');
Cloudmanic\Email\Message::to('user@example.com'); 
Cloudmanic\Email\Message::subject('Email Test');
Cloudmanic\Email\Message::message('My Message');	
Cloudmanic\Email\Message::send();
echo Cloudmanic\Email\Message::print_debugger();
```
