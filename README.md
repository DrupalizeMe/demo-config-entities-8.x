# demo-config-entities-8.x
Drupalize.Me demo repo for select tutorials in the [Configuration Management series](https://drupalize.me/series/configuration-system-drupal-8).

Each branch corresponds to a tutorial in the Drupalize.Me Configuration Management series. Instructions for which branch to use as starting and ending points are in the tutorials themselves.

### Installation

This master branch of this repo contains a Drupal 8 codebase. You will need to perform the following steps to get your site up and running before starting the tutorials. The following instructions assume that you already understand the concept of development environment and you have local development environment already up and running. See our [topic page on Development Environments](https://drupalize.me/topic/development-environments) for resources if you need to get up to speed first.

1. Copy _docroot/sites/default/default.settings.php_ to _sites/default/settings.php_. For example:

    ```
    > cd docroot
    > cp sites/default/default.settings.php sites/default/settings.php
    ```

2. Create _sites/default/files_ directory. For example:

    ```
    > mkdir sites/default/files
    ```

3. Change permissions of _sites/default/settings.php_ and _sites/default/files_ to permit Drupal installation. For example:

    ```
    > chmod 775 sites/default/settings.php
    > chmod 775 sites/default/files
    ```
    
4. Start up the [php web server](http://php.net/manual/en/features.commandline.webserver.php) or web server of your choice and optionally configure where to serve your files. Using the built-in php web server option (make sure you're in the _docroot_ directory):

    ```
    > php -S localhost:8000
    ```
    
    Which should output:
    
    ```
    PHP 7.1.9 Development Server started at Thu Feb 15 16:58:38 2018
    Listening on http://localhost:8000
    Document root is /Library/WebServer/Documents/demo-config-entities-8.x/docroot
    Press Ctrl-C to quit.
    ```
    
    **Open a new tab** in your Terminal or command line utility to continue and to keep the PHP web server running. To stop the web server, return to its tab and press Ctrl-C to quit the process.

5. Open your site in a browser and run the Drupal installer. You will need to create a database for the site and enter its credentials during this process. Follow the instructions in the installer and by the end you should have working Drupal development site up and running on your local machine.

6. Install Drupal Console. We'll be using Drupal Console commands throughout this tutorial series. To install it, change directories to the root of this repo and then install Drupal Console with Composer. See [Download Composer](https://getcomposer.org/download/) if you need to install Composer on your dev environment.

    ```
    > cd ../
    > ls
    README.md	composer.json	composer.lock	config		data		docroot
    > composer install
    ```
    
    This will download Drupal Console and its dependencies to a new _vendor_ directory.
    
    See our [topic page on Drupal Console](https://drupalize.me/topic/drupal-console) for more information and resources about this application.
    
7. Install Drush. See our [topic page on Drush](https://drupalize.me/topic/drush) and the [Drush installation page](http://docs.drush.org/en/master/install/) if you are new to Drush and/or need help getting it installed.


8. Your system should now be set up to walk-through any hands-on exercises in the  [Configuration Management](https://drupalize.me/series/configuration-management) tutorials.