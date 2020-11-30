<p align="center">
 <img src="https://platform.quuu.co/base/images/hero.png" width="250">
</p>
<p align="center">
    The Quuu API for PHP based applications
</p>

# Installation
The Quuu API requires the use of Composer package manager and at least PHP 7.1 in order to work correctly. These requirements may change down the line so please ensure all software you wish to use Quuu with is up-to-date utilising the most modern stable version of software possible.

Whilst the Quuu API can work with a Base PHP installation, It is compatible with frameworks such as Laravel & Symfony.

To install the Quuu API PHP Client, run the following command at your project's root
```
composer require quuulimited/api-php
```
This will install the client as well as any required composer packages.

You will then be able to import the API client into your controllers / scripts via use of
```
use Quuu\QuuuClient;
```

Once installed, you should authenticate to the API as all requests that are made to the Quuu API should be authenticated utilising any key-pairs provided to you by Quuu Ltd.

# Authentication
Authentication can be achieved by creating a new instance of the `QuuuClient` class. Information may be passed to the constructor as an object like so:
```
$client = new QuuuClient((object)[
    'key' => 'xxxxx-xxxxx-xxxxx-xxxxx-xxxxx', // required
    'secret' => 'xxxxx-xxxxx-xxxxx-xxxxx-xxxxx', // required if planning to POST data
]);
```
In addition to the authentication object, You may also pass a secondary object as a parameter with extra configuration pairs like so:
```
$client = new QuuuClient((object)[
    'key' => 'xxxxx-xxxxx-xxxxx-xxxxx-xxxxx', // required
    'secret' => 'xxxxx-xxxxx-xxxxx-xxxxx-xxxxx', // required if planning to POST data
],(object)[
    'version' => 'v2', // The API version to use
    'shouldThrowException' => true // Whether or not to throw an exception if a success:false response is recieved
]);
```

# Categories
More info coming soon...

# Hand curated content
More info coming soon...

# Full documentation
Our full API documentation can be found at https://api.quuu.co along with examples in different languages to help integrate Quuu's API into your project. Access to the Quuu API is currently closed to the general public but requests may be made at https://api.quuu.co

# Having issues?
Whilst we can't devote a huge amount of time to fully maintaining this package we are always open to Pull requests for those who are interested in helping to improve the quality of this composer package.

For Quuu support that does not fit the discussion of this PHP Package, Please visit https://answers.quuu.co 