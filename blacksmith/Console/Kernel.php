<?php

namespace Blacksmith\Console;

use Pluma\Console\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    /**
     * Array of registered commands.
     *
     * @var array
     */
    public $commands = [
        // Key
        Commands\Key\KeyGenerateCommand::class,

        // Blacksmith
        Commands\DB\DBDropCommand::class,
        Commands\DB\DBEmptyCommand::class,
        Commands\DB\DBMigrateCommand::class,
        Commands\Furnace\ForgeAccountCommand::class,
        Commands\Furnace\ForgeControllerCommand::class,
        Commands\Furnace\ForgeModelCommand::class,
        Commands\Furnace\ForgeModuleCommand::class,
        Commands\Furnace\ForgeObserverCommand::class,
        Commands\Furnace\ForgePermissionsCommand::class,
        Commands\Furnace\ForgeWeaponCommand::class,
        Commands\Furnace\PurgeCacheCommand::class,
        Commands\Furnace\PurgeModuleCommand::class,
        Commands\Furnace\PurgeStorageCommand::class,
        Commands\Phinx\PhinxMigrateCreateCommand::class,
        Commands\Phinx\PhinxMigrateRunCommand::class,
        Commands\Phinx\PhinxSeedCreateCommand::class,
        Commands\Phinx\PhinxSeedRunCommand::class,

        // Misc
        Commands\Misc\FurnaceCommand::class,

        // vendor
        \Phinx\Console\Command\Init::class,
        \Phinx\Console\Command\Create::class,
        \Phinx\Console\Command\Migrate::class,
        \Phinx\Console\Command\Rollback::class,
        \Phinx\Console\Command\Status::class,
        \Phinx\Console\Command\Breakpoint::class,
        \Phinx\Console\Command\Test::class,
        \Phinx\Console\Command\SeedCreate::class,
        \Phinx\Console\Command\SeedRun::class,
    ];

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        parent::commands();
        $this->load(base_path('blacksmith/routes/console.php'));
    }

    /**
     * Require a file.
     *
     * @param  string $command
     * @return void
     */
    public function load($command)
    {
        require $command;
    }
}
