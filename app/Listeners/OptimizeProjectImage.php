<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OptimizeProjectImage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event)
    {
        // throw new\Exception("error optimizando la imagen", 1);
        //creamos la instancia para poder usar los metodos que nos provee intervention image
        //metodo widen (redimensiona el ancho de la imagen) encode vuelve a codificar la extension que trae la imagen
        $image = Image::make(Storage::disk('public')->get($event->project->image))
        ->widen(600)
        ->limitColors(255)
        ->encode();

        Storage::disk('public')->put($event->project->image, (string) $image);

    }
}
