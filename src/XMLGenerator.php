<?php

namespace SaeidKhaleghi\PoliceReporter;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Responsable;
use SaeidKhaleghi\PoliceReporter\Tags\Transaction;
use SaeidKhaleghi\PoliceReporter\Contracts\Reportable;

class XMLGenerator implements Responsable, Renderable
{
    /** @var  Tags\Transaction[] */
    protected array $tags = [];

    public static function create(): static
    {
        return new static();
    }

    public function add(string | Transaction | Reportable | iterable $tag): static
    {
        if (is_object($tag) && array_key_exists(Reportable::class, class_implements($tag))) {
            $tag = $tag->toReportTransaction();
        }

        if (is_iterable($tag)) {
            foreach ($tag as $item) {
                $this->add($item);
            }

            return $this;
        }

        if (! in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function render(): string
    {
        $tags = collect($this->tags)->filter();

        return view('reporter::report')
            ->with(compact('tags'))
            ->render();
    }

    public function writeToFile(string $path): static
    {
        file_put_contents($path, $this->render());

        return $this;
    }

    public function writeToDisk(string $disk, string $path): static
    {
        Storage::disk($disk)->put($path, $this->render());

        return $this;
    }

    public function toResponse($request)
    {
        return Response::make($this->render(), 200, [
            'Content-Type' => 'text/xml',
        ]);
    }
}
