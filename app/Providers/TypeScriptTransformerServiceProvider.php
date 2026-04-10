<?php

namespace App\Providers;

use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Optional;
use Spatie\LaravelTypeScriptTransformer\LaravelTypeScriptTransformerExtension;
use Spatie\LaravelTypeScriptTransformer\TypeScriptTransformerApplicationServiceProvider as BaseTypeScriptTransformerServiceProvider;
use Spatie\TypeScriptTransformer\Formatters\PrettierFormatter;
use Spatie\TypeScriptTransformer\Transformers\AttributedClassTransformer;
use Spatie\TypeScriptTransformer\Transformers\EnumTransformer;
use Spatie\TypeScriptTransformer\TypeScriptTransformerConfigFactory;
use Spatie\TypeScriptTransformer\Writers\GlobalNamespaceWriter;

class TypeScriptTransformerServiceProvider extends BaseTypeScriptTransformerServiceProvider
{
    protected function configure(TypeScriptTransformerConfigFactory $config): void
    {
        $config
            ->extension(new LaravelTypeScriptTransformerExtension)
            ->transformer(AttributedClassTransformer::class)
            ->transformer(EnumTransformer::class)
            ->replaceType(Lazy::class, 'never')
            ->replaceType(Optional::class, 'never')
            ->transformDirectories(app_path())
            ->writer(new GlobalNamespaceWriter(
                config('typescript-gen.generated_output')
            ))
            ->outputDirectory('.')
            ->formatter(PrettierFormatter::class);
    }
}
