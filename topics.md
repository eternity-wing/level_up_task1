# level_up_task1


## Clean Code And Design Patterns
As you know design patterns and clean coding are in most cases language independent, and the diffrences are in the implementation. I've found [PHP The Right Way](https://phptherightway.com) quite useful for improving code quality in php and if you are looking for a good implementation and example of design patterns in php you can find them [here](https://github.com/jupeter/clean-code-php).

useful links:
* [Pear Naming Conventions](https://pear.php.net/manual/en/standards.naming.php)
* [PHP Figs](https://www.php-fig.org/)
* [Modern PHP Without a Framework](https://kevinsmith.io/modern-php-without-a-framework)
* [Visual Studio Code prettier package](https://github.com/prettier/plugin-php)


## Git Hooks
I've provided some hooks for checking code styles and error correction with Composer-git-hooks([Documentation](https://github.com/BrainMaestro/composer-git-hooks)
).

for adding hooks you shoud add your configuration in composer.json, extra field and then run `composer cghooks update`.

Refrences:

* [Composer git hooks](https://github.com/BrainMaestro/composer-git-hooks)
* [Php git hooks](https://github.com/bruli/php-git-hooks)
* [Git hooks in PHP](https://carlosbuenosvinos.com/write-your-git-hooks-in-php-and-keep-them-under-git-control/)


## Code Style
I've found these packages useful for code styling:

* [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHP Coding Standards Fixer](https://cs.symfony.com/)

## Unit testing
I haven't found any full featured package for testing but based on
 [automated-php-test](https://www.hongkiat.com/blog/automated-php-test/) and
 [php-testing-framework-tools](https://www.softwaretestinghelp.com/php-testing-framework-tools/)
 I've found these packages for majority of testing purposes.

* [PHPUnit](https://phpunit.de/getting-started/phpunit-8.html)
* [Behat](https://docs.behat.org/en/latest/)
* [PHP Spec](http://www.phpspec.net/en/stable/)
* [Codeception](https://codeception.com/)
* [Selenium](https://selenium.dev/)

### What Is The Double Test?
The generic term he uses is a Test Double (think stunt double).
 Test Double is a generic term for any case where you replace a production object for testing purposes.
 There are various kinds of double that Gerard lists:

* **Dummy**: objects are passed around but never actually used. Usually they are just used to fill parameter lists.
* **Fake**: objects actually have working implementations, but usually take some shortcut which makes them not suitable for production (an InMemoryTestDatabase is a good example).
* **Stubs**: provide canned answers to calls made during the test, usually not responding at all to anything outside what's programmed in for the test.
* **Spies**: are stubs that also record some information based on how they were called. One form of this might be an email service that records how many messages it was sent.
* **Mocks**: are pre-programmed with expectations which form a specification of the calls they are expected to receive. They can throw an exception if they receive a call they don't expect and are checked during verification to ensure they got all the calls they were expecting.

for more information take a look at [What is test double](https://martinfowler.com/bliki/TestDouble.html).