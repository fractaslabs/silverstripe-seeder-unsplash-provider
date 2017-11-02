# SilverStripe Seeder Unsplash provider
[![Build Status](https://scrutinizer-ci.com/g/fractaslabs/silverstripe-seeder-unsplash-provider/badges/build.png?b=3.0)](https://scrutinizer-ci.com/g/fractaslabs/silverstripe-seeder-unsplash-provider/build-status/3.0)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fractaslabs/silverstripe-seeder-unsplash-provider/badges/quality-score.png?b=3.0)](https://scrutinizer-ci.com/g/fractaslabs/silverstripe-seeder-unsplash-provider/?branch=3.0)

## Overview
This is a [SilverStripe Seeder](https://github.com/littlegiant/silverstripe-seeder/) Unsplash provider which grabs "random" beautiful photos from Unsplash API.


## Requirements
 * SilverStripe Framework 3.1+
 * SilverStripe CMS 3.1+
 * SilverStripe Seeder 2.0+


## Installation
  * Install via Composer
 ```
 composer require fractas/silverstripe-seeder-unsplash-provider
 ```
  * Run dev/build
  * Add to your configuration:
 ```yaml
---
Name: seeder-config
---
Seeder\Seeder:
 create:
   Page:
     count: 100
     fields:
       Image: 'unsplashimage(1024,768)'
 ```
  * Change to project root and run
 ``` bash
 (unix)      $ framework/sake seed flush=1
 (windows)   > php framework/cli-script.php seed flush=1
 ```


 ## Bugtracker
 Bugs are tracked on [github.com](https://github.com/fractaslabs/silverstripe-seeder-unsplash-provider/issues)


 ## Licence
  * See [Licence](https://github.com/fractaslabs/silverstripe-seeder-unsplash-provider/blob/3.0/LICENSE)
