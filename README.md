# level_up_task1
For running the project run `php ./public/index.html` at the root of the project. 
For running the test run `./vendor/bin/phpunit` at the root of the project and you can see the phpunit code coverage at tmp/coverage/html/index.html.

## Git Hooks
I've provided some hooks for checking code styles and error correction with Composer-git-hooks([Documentation](https://github.com/BrainMaestro/composer-git-hooks)
).

for adding hooks you shoud add your configuration in composer.json, extra field and then run `composer cghooks update`.

Refrences:

* [Composer git hooks](https://github.com/BrainMaestro/composer-git-hooks)
* [Php git hooks](https://github.com/bruli/php-git-hooks)
* [Git hooks in PHP](https://carlosbuenosvinos.com/write-your-git-hooks-in-php-and-keep-them-under-git-control/)