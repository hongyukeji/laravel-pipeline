# LaravelPipeline

> LaravelPipeline composer package.

## Install

```shell
$ composer require hongyukeji/laravel-pipeline:*@dev
```

```shell
$ php artisan vendor:publish --provider="Hongyukeji\LaravelPipeline\PipelineServiceProvider"
```

## Usage

```
$data = ['name'=>'test','password'=>'123456'];
$pipeline = pipeline("pipeline::example", $data);
print_r($pipeline);
```
