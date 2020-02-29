## Official Whatspie client for PHP
[![CircleCI](https://circleci.com/gh/tarikhagustia/whatspie-php-client.svg?style=shield)](https://circleci.com/gh/circleci/circleci-docs)
### Installation
```
composer require whatspie\php-client
```

### Usage
To get `API_KEY` goto Profile page on [Whatspie Dashboard](https://app.whatspie.com)
```php
$client = new \Whatspie\Client('YOUR_API_KEY', 'YOUR DEVICE');

// Sending Message
$client->to('628561112233')->message('Hi there!')->send();

// Get Messages
$client->getMessages();
```

[Whatspie Dashboard]: https://app.whatspie.com