<?php
namespace Deployer;
require 'recipe/laravel.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@github.com:daniiltserin/laravel-snippets.git');

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);

// Servers

server('production', '134.0.117.92')
    ->user('root')
    ->identityFile()
    ->set('deploy_path', '/var/www/laravel')
    ->pty(true);


// Tasks

// desc('Restart PHP-FPM service');
// task('php-fpm:restart', function () {
//     // The user must have rights for restart service
//     // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
//     run('sudo systemctl restart php-fpm.service');
// });
// after('deploy:symlink', 'php-fpm:restart');

// // [Optional] if deploy fails automatically unlock.
// after('deploy:failed', 'deploy:unlock');

// // Migrate database before symlink new release.

// before('deploy:symlink', 'artisan:migrate');
