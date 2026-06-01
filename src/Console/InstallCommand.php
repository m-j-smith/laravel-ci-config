<?php

namespace MJSmith\LaravelCiConfig\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ci:install';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Install the GitHub Actions CI workflow and Pint config into your project';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->installWorkflow();
        $this->installPintConfig();

        $this->newLine();
        $this->info('CI config installed successfully.');
        $this->newLine();
        $this->comment('Next steps:');
        $this->line('  1. Ensure DB_CONNECTION=sqlite is set in your .env.example');
        $this->line('  2. Ensure phpunit.xml has DB_CONNECTION=sqlite and is uncommented');
        $this->line('  3. Ensure phpunit.xml has DB_DATABASE=:memory: and is uncommented');
        $this->line('  4. Push to GitHub and check the Actions tab');
        $this->newLine();
    }

    private function installWorkflow(): void
    {
        $destination = base_path('.github/workflows/ci.yml');

        if (file_exists($destination) && ! $this->confirm('ci.yml already exists. Overwrite?')) {
            $this->line('  Skipped .github/workflows/ci.yml');

            return;
        }

        if (! is_dir(base_path('.github/workflows'))) {
            mkdir(base_path('.github/workflows'), recursive: true);
        }

        copy($this->stubPath('workflows/ci.yml'), $destination);

        $this->line('  Installed .github/workflows/ci.yml');
    }

    private function installPintConfig(): void
    {
        $destination = base_path('pint.json');

        if (file_exists($destination) && ! $this->confirm('pint.json already exists. Overwrite?')) {
            $this->line('  Skipped pint.json');

            return;
        }

        copy($this->stubPath('pint.json'), $destination);

        $this->line('  Installed pint.json');
    }

    private function stubPath(string $path): string
    {
        return __DIR__.'/../../stubs/'.$path;
    }
}