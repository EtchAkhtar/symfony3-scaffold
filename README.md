# Symfony3 Scaffold

This codebase is a framework to use for starting a Symfony3 project.

### Version

1.0.0

---

## Usage

### Configurations

* Routing/Security/Parameters is done via YAML
* Entity validation is done via annotations
* The routing config is moved to the src bundle and split into multiple files depending on site function

### Choose frontend frameworks

You can choose whether to use foundation, bootstrap, angular.  Instructions below.

### Layout included

If using Bootstrap, a layout template is already included.

### Features

#### Debug Toolbar refresh on AJAX

The debug toolbar will reload on an AJAX request if in dev mode (see site_dev.js)

#### Popup notifications on AJAX responses

A popup will show in the top-right of the screen for any success/failure messages.

##### Returning a success

```
		return $utility->generateResponse(['content' => 'json'],
			json_encode(
				[
					'msg' => $this->renderView('AppBundle:Demo:modal.html.twig', [
					])
				]
			)
		);
```

![Success](readme/success.png?raw=true)

##### Returning a failure

```
	$utility->generateError($errString);
```

This will return the message with a response code 403.  There is a JavaScript event listener on AJAX responses that will look for this HTTP code and if found, display the error message in a friendly manner.

![Failure](readme/failure.png?raw=true)

#### Testing

PHPUnit is part of the Symfony3 framework by default.

QUnit has been added for JavaScript development.

![QUnit](readme/qunit.png?raw=true)

#### Validation code

Three types of validation are in place to ensure data sanitization:

* HTLML5
* BootstrapValidator
* Symfony assertions

#### Twig extension

Any twig filters or functions can be placed in 'src\AppBundle\Extensions\Twig\TwigExtension.php'

#### Utility service

A service called 'utility' has been provided to access commonly shared functions.  Add your function into 'src\AppBundle\Providers\Utility.php'

#### Separate routing configurations for site function

For easy maintenance the primary routing file is under 'src\AppBundle\Resource\routing\_index.yml'.

All routes related to a subsection of the site can be placed into its own file.

## Setup

### Required

CodeKit - https://incident57.com/codekit/

### Installation

1. Copy this locally and manage it with CodeKit
2. Install this into a web server and setup a vhost for it
3. Create your database and update app/config/parameters.yml
4. Run 'composer install' or 'composer update' if you wish to update to latest versions (check composer.json for package info).
5. Add to your own git repo for versioning.

### Adding IP

By default Symfony requires you to explicity call app_dev.php for dev environments.  The .htaccess file has been modified to detect your local IP and automatically server app_dev.php or app.php depending on the host.

For this to work, please add your IP into .htaccess

### Activating a frontend responsive framework

This skeleton has the ability to work with both foundation and bootstrap.

#### Activating Foundation

1. Open web/bundles/app/js/vendor.js and ensure the lines are as follows:

```
// @dont=codekit-prepend "partials/framework/_bootstrap.js"
// @codekit-prepend "partials/framework/_foundation.js"
```

2. Open web/bundles/app/scss/partials/_base.scss and uncomment the following:

```
@import 'framework_foundation';
```

3. Open web/bundles/app/less/partials/_base.less and comment the following:

```
//@import '_framework_bootstrap';
```

4. Modify partials/_foundation_settings.scss with any custom settings
5. Comment out all components that aren't required in partials/_foundation_includes.css

#### Activating Bootstrap

1. Open web/bundles/app/js/vendor.js and ensure the lines are as follows:

```
// @codekit-prepend "partials/framework/_bootstrap.js"
// @dont-codekit-prepend "partials/framework/_foundation.js"
```

2. Open web/bundles/app/less/partials/_base.less and uncomment the following:

```
@import '_framework_bootstrap';
```

3. Open web/bundles/app/scss/partials/_base.scss and comment the following:

```
//@import 'framework_foundation';
```

#### Activating Angular JS

1. Open web/bundles/app/js/vendor.js and ensure the line is as follows:

```
// @codekit-prepend "partials/framework/_angular.js"
```

#### Activating Compass

1. Open web/bundles/app/scss/partials/_base.scss and uncomment the following:

```
@import 'compass';
```

#### CodeKit Setup

* Update bower components then lock dependencies in bower.json
* Ensure CodeKit set to compress sass/js with sourcemap (and exclude 3rd party js files with many warnings).
* Enable autoprefixer/bless globally.
* Add server url for live browser refreshing on port 5757.

#### Deleting demo code

There is demo code to help you get started.  If you don't want this:

Delete files in 'src':

* Controller\DemoController
* Entity\DemoPerson
* Resources\views\Demo
* Resources\config\routing\demo.yml

Delete function from 'web/bundle' in the following files:

* js\partials\_modals.js
* js\partials\_forms.js
* js\partials\_formvalidation.js


## Directory Structure

The files/directories installed by Symfony3 will not be discussed, only additions and modification

### root

* .bowerrc - Where to store bower components 
* .editorconfig - Rules for saving source files
* .gitattributes - Normalize line endings for versioning
* .gitignore - What to remove from git
* bower.json - The packages/dependencies installed from bower
* composer.json / composer.lock - The packages/dependencies installed from packagist
* config.codekit - CodeKit is used as the build tool / task runner / watcher
* config.rb - compass configuration should you wish to activate it
* README.md - this file (also converted to HTML)

### web

* bundles/app - the assets for this app
* bundles/vendorunmanaged - any frontend libraries not found in bower
* browserconfig.xml - Configuration for handling MS tile icons
* crossdomain.xml - Cross-domain policy file
* humans.txt - Meet the team and the technologies used
* robots.txt - Crawler configuration
* favicon and other icons
