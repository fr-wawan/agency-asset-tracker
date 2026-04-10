<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

#[Signature('make:dto {name : DTO name or path, e.g. UserData or User/StoreUserData}')]
#[Description('Create a new DTO class extending BaseData (Spatie Laravel Data)')]
class MakeDtoCommand extends Command
{
    public function handle(): int
    {
        $input = $this->argument('name');

        // Normalise separators -> forward slash
        $input = str_replace('\\', '/', $input);

        // Split into optional subfolder + class name
        // e.g. "User/StoreUserData" -> folder="User", class="StoreUserData"
        //      "UserData"           -> folder="",     class="UserData"
        $parts = explode('/', $input);
        $className = Str::studly(array_pop($parts));
        $subFolder = implode('/', array_map(fn($p) => Str::studly($p), $parts));

        // Ensure suffix
        if (! Str::endsWith($className, 'Data')) {
            $className .= 'Data';
        }

        $relativePath = $subFolder
            ? "{$subFolder}/{$className}.php"
            : "{$className}.php";

        $fullPath = app_path("Data/{$relativePath}");
        $namespace = $subFolder
            ? 'App\\Data\\' . str_replace('/', '\\', $subFolder)
            : 'App\\Data';

        if (file_exists($fullPath)) {
            $this->components->error("DTO [{$relativePath}] already exists.");

            return self::FAILURE;
        }

        if (! is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        file_put_contents($fullPath, $this->buildStub($namespace, $className));

        $this->newLine();
        $this->components->info("DTO <fg=cyan>{$className}</> created successfully.");
        $this->components->twoColumnDetail('File', "app/Data/{$relativePath}");
        $this->components->twoColumnDetail('Namespace', $namespace);
        $this->newLine();

        return self::SUCCESS;
    }

    private function buildStub(string $namespace, string $className): string
    {
        $nl = "\n";

        return "<?php{$nl}{$nl}"
            . "namespace {$namespace};{$nl}{$nl}"
            . "use App\\Data\\BaseData;{$nl}"
            . "use Spatie\TypeScriptTransformer\Attributes\TypeScript;{$nl}{$nl}"
            . "#[TypeScript()]{$nl}"
            . "class {$className} extends BaseData{$nl}"
            . "{{$nl}"
            . "    public function __construct({$nl}"
            . "        {$nl}"
            . "    ) {}{$nl}{$nl}"
            . "    public static function rules(): array{$nl}"
            . "    {{$nl}"
            . "        return [{$nl}"
            . "            {$nl}"
            . "        ];{$nl}"
            . "    }{$nl}"
            . "}{$nl}";
    }
}
