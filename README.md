# Ultipro SDK for PHP (Unofficial)

[![Latest Stable Version](https://poser.pugx.org/brianfreytag/ultipro-sdk-php/v/stable)](https://packagist.org/packages/brianfreytag/ultipro-sdk-php)
[![Total Downloads](https://poser.pugx.org/brianfreytag/ultipro-sdk-php/downloads)](https://packagist.org/packages/brianfreytag/ultipro-sdk-php)

This is an unofficial library to allow seamless connections to Ultipro's REST API via PHP.

This library was created because Ultimate Software does not have any SDK and none of their documentation lays out how to
use PHP for any of it. 

## Installation

```
composer require brianfreytag/ultipro-sdk-php
```

## Usage

### Authentication

You can authenticate in the Client in one of two ways: 1) Authentication Object, 2) Array

#### Authentication Object:

```php
use Ultipro\Authentication;
use Ultipro\Client;

$username = 'my-username';
$password = 'my-password';
$customerApiKey = 'XY0XY';

$authorization = new Authentication($username, $password, $customerApiKey);

$client = new Client($authorization);
```

#### Array:

```php
use Ultipro\Client;

$username = 'my-username';
$password = 'my-password';
$customerApiKey = 'XY0XY';

$authorization = [
    'username'         => $username,
    'password'         => $password,
    'customer_api_key' => $customerApiKey
];

$client = new Client($authorization);

```
### Client Arguments

The client takes three arguments:
1) `$auth` - Authentication (see above)
2) `$baseURi` - Found in Ultipro -> Configuration -> Security -> Web Services (Defaults to https://service5.ultipro.com)
3) `$options` - Guzzle Request Options to overwrite defaults (http://docs.guzzlephp.org/en/stable/request-options.html)

### Choosing a Client

You can use the default `UltiproClient` to manually do `GET` and `POST` requests, or you can utilize 
alternate clients for each Ultipro API endpoint "groups". This version includes clients for the following
endpoints:

```
const ENDPOINT_CONFIG_ORG_LEVELS            = '/configuration/v1/org-levels';
const ENDPOINT_PERSONNEL_PERSON_DETAIL      = '/personnel/v1/person-details';
const ENDPOINT_PERSONNEL_EMPLOYMENT_DETAIL  = '/personnel/v1/employment-details';
const ENDPOINT_PERSONNEL_EMPLOYEE_ID_LOOKUP = '/personnel/v1/employee-ids';
```

For endpoints with `PERSONNEL`, use the `PersonnelClient`. For the endpoints with `CONFIG` use 
the `ConfigurationClient`. 

### Using a Client

For `Personnel` queries, utilize the `Ultipro\Personnel\PersonnelClient` client.

Each client method accepts a `Request` object that implements the `RequestInterface` interface.

The `RequestInterface` receives query parameters from classes that extend the base `Query`. Nearly
every endpoint accepts different query parameters, so under the various endpoint namespaces, there are
different `*Query` classes under the `Query` directory that will accept different data to search the endpoints. 

Here is a simple example of pulling Person Detail API data utilizing an Employee ID (as defined from Ultipro):

```php
use Ultipro\Personnel\Personnel;
use Ultipro\Authentication;
use Ultipro\Personnel\Query\PersonDetailQuery;
use Ultipro\Personnel\Model\PersonDetail;
use Ultipro\Personnel\PersonnelResponse;
use Ultipro\Request;

$username = 'my-username';
$password = 'my-password';
$customerApiKey = 'XY0XY';

$authorization = new Authentication($username, $password, $customerApiKey);

$personnelClient = new Personnel($authorization);

$request = new Request();

$query = new PersonDetailQuery();
$query->setEmployeeId('BM410003');

$request->setQueryParameters($query);

/** @var PersonnelResponse $response */
$response = $personnelClient->getPersonDetails($request);

/** @var PersonDetail $personDetail */
foreach ($response->getContent() as $personDetail) {
    $firstName = $personDetail->getFirstName();
}

```

## Todo

There is still a lot of work to do in this library, including many endpoints to implement.

### Configuration
- [ ] Add Code Tables API (https://connect.ultipro.com/documentation#/api/361)
- [ ] Add Company Details API (https://connect.ultipro.com/documentation#/api/1711)
- [ ] Add Organization Levels (https://connect.ultipro.com/documentation#/api/136)\
- [ ] Add Jobs Configuration API (https://connect.ultipro.com/documentation#/api/196)
- [ ] Add Locations Configuration API (https://connect.ultipro.com/documentation#/api/202)
- [ ] Add `POST`, `PUT`, and `PATCH` for Organization Levels API (https://connect.ultipro.com/documentation#/api/136)

### Personnel
- [ ] Add Compensation Details API (https://connect.ultipro.com/documentation#/api/823)
- [ ] Add Employee Changes API (https://connect.ultipro.com/documentation#/api/199)
- [ ] Add Employee Contracts API (https://connect.ultipro.com/documentation#/api/1465)
- [ ] Add Employee Education API (https://connect.ultipro.com/documentation#/api/1444)
- [ ] Add Employee Job History API (https://connect.ultipro.com/documentation#/api/1468)
- [ ] Add Employee National Documents API (https://connect.ultipro.com/documentation#/api/1453)
- [ ] Add Global Employee Direct Deposit API (https://connect.ultipro.com/documentation#/api/1462)
- [ ] Add Global Employee Localization Details API (https://connect.ultipro.com/documentation#/api/1456)
- [ ] Add Global Employee Payments and Deductions API (https://connect.ultipro.com/documentation#/api/1459)
- [ ] Add International Employee API (https://connect.ultipro.com/documentation#/api/1447)
- [ ] Add PTO Plans API (https://connect.ultipro.com/documentation#/api/721)

### Onboarding
- [ ] Add Onboarding client namespace for `/onboarding/` endpoints
- [ ] Add Onboarding New Hire API (https://connect.ultipro.com/documentation#/api/1531)

### Simple Schedule
- [ ] Add Simple Schedule client namespace for `/services/ws/mob/simpleschedule` endpoints
- [ ] Add Time and Attendance Schedule Import API (https://connect.ultipro.com/documentation#/api/337)

### Time
- [ ] Add Time client namespace for `/time/uta/v1/time` endpoints
- [ ] Add UTA Time Clock API (https://connect.ultipro.com/documentation#/api/1240)

### Other Items
- [ ] Add Unit Tests
- [ ] Add SOAP Services (https://connect.ultipro.com/documentation#/api/979)
- [ ] Update Todo list as stuff comes up
