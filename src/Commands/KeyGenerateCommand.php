<?php
/**
 * author: Lucas Vinicius
 * Date: 7/17/2020
 */

namespace Lucasviniciusdev\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class KeyGenerateCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $name = 'key:generate';
  protected $signature = 'key:generate {--show : Display the key and do not modify the file}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Set the application key';

  /**
   * Execute the console command.
   *
   * @return void
   */
  public function handle()
  {
    $key = $this->generateRandomKey();
    $appKey = 'base64:' . $key;

    if($this->option('show'))
    {
      $this->comment($key);
      exit();
    }

    $path = base_path('.env');

    if(file_exists($path))
    {
      file_put_contents(
        $path,
        preg_replace('/(APP_KEY=)(\s|.*)\n/', ("APP_KEY=${appKey}\n"), file_get_contents($path))
      );
    }

    $this->info("Application key [$key] set successfully.");
  }

  /**
   * Generate a random key for the application.
   *
   * @return string
   */
  protected function generateRandomKey() : string
  {
    return Str::random(32);
  }
}
