# OpenAgenda PHP SDK
![Home Image](git-header.jpg)

OpenAgendaSDK is a PHP wrapper for OpenAgenda API v2.
 
## Prerequisites
Composer is required as well as a PHP 7.1 or higher version running on your web server.
Composer installation instructions can be found at https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos.

## Installation
Install OpenAgendaSdk as a dependency to your project:
```
composer require openagenda/sdk-php
```

## Basic usage

### Creating an OpenAgendaSdk instance

First create an OpenAgendaSdk instance using your OpenAgenda publicKey as parameter:
```php
$public_key = 'mypublickey';
$oa = new \OpenAgendaSdk\OpenAgendaSdk($public_key);
```
Additionally, you can set some client options such as proxy settings:
```php
$oa = new \OpenAgendaSdk\OpenAgendaSdk($public_key, [RequestOptions::PROXY => '127.0.0.1:8888']);
```
As OpenAgenda uses Guzzle Client, read its documention to learn more about request options: https://docs.guzzlephp.org/en/stable/  

### Requesting OpenAgenda data

OpenAgendaSdk currently comes with 3 methods to get agenda configuration, agenda events or a single agenda event.
These methods return OpenAgenda API data as JSON. Decoding json or deserializing object(s) is up to you.

#### Get an agenda configuration
```php
$agendaUid = 123456;
$json = $oa->getAgenda($agendaUid);
```

#### Get the event list of an agenda
```php
$agendaUid = 123456;
$json = $oa->getEvents($agendaUid);
```
You can add some parameters to your request such as filters, sort, search, pagination. Read OpenAgenda API documentation to get the full list of options: https://developers.openagenda.com/10-lecture/ 
```php
$agendaUid = 123456;
$json = $oa->getEvents($agendaUid, ['search' => 'Concert']);
$newjson = $oa->getEvents($agendaUid, ['search' => 'Concert', 'sort' => 'timings.asc', 'feature' => 1]);
```

#### Get an agenda event
```php
$agendaUid = 123456;
$eventUid = 654321;
$json = $oa->getEvent($agendaUid, $eventUid);
```

## Tests

### Prerequisites
In order to run tests, you have to set OPENAGENDA_SDK_ENV value to 'test' in a PHP dotenv file (.env) or using command line. Methods depends on the framework you use.

PHP dotenv example:
```
OPENAGENDA_SDK_ENV='test'
```
Using command line:
```
export OPENAGENDA_SDK_ENV='test'
```
### Running tests
OpenAgendaSdk tests are based on JSON mocks.

Run tests:

```
./vendor/bin/phpunit ./vendor/openagenda/sdk-php/tests

Testing /your-project-folder/vendor/openagenda/sdk-php/tests
......                                                              6 / 6 (100%)

Time: 00:00.026, Memory: 10.00 MB

OK (6 tests, 11 assertions)

```
Reset to 'default' env to get back real API data when tests are over. 


## OpenAgenda API documention
OpenAgenda API v2 documention is available here: https://developers.openagenda.com
