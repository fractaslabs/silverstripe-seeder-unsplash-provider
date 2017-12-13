# SilverStripe Seeder Unsplash provider [WIP]
[![Latest Stable Version](https://poser.pugx.org/fractaslabs/silverstripe-seeder-unsplash-provider/v/stable)](https://packagist.org/packages/fractaslabs/silverstripe-seeder-unsplash-provider)
[![Latest Unstable Version](https://poser.pugx.org/fractaslabs/silverstripe-seeder-unsplash-provider/v/unstable)](https://packagist.org/packages/fractaslabs/silverstripe-seeder-unsplash-provider)
[![Total Downloads](https://poser.pugx.org/fractaslabs/silverstripe-seeder-unsplash-provider/downloads)](https://packagist.org/packages/fractaslabs/silverstripe-seeder-unsplash-provider)
[![License](https://poser.pugx.org/fractaslabs/silverstripe-seeder-unsplash-provider/license)](https://packagist.org/packages/fractaslabs/silverstripe-seeder-unsplash-provider)

## Overview
This is a [SilverStripe Seeder](https://github.com/littlegiant/silverstripe-seeder/) Unsplash provider which grabs "random" beautiful photos from Unsplash API.

*Note: this branch is under-development* 

## Requirements
 * SilverStripe Framework 4+
 * SilverStripe Seeder


## Installation
  * Install via Composer
  ```
  composer require fractaslabs/silverstripe-seeder-unsplash-provider
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
 See [Licence](https://github.com/fractaslabs/silverstripe-seeder-unsplash-provider/blob/3.0/LICENSE)
