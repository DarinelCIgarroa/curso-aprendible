<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProjectsTest extends TestCase
{
    use RefreshDatabase; //con esto cada test va a comenzar con la estructura correcta
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {
        $this->withoutExceptionHandling(); //con este codigo nos muestra informacion más detallada del error

        $project = factory(Project::class)->create();

        $response = $this->get(route('projects.index')); //con esto hacemos el request a la ruta index

        $response->assertStatus(200); // Con esto indicamos que esperamos un codigo 200 que es un código de exito

        $response->assertViewIs('projects.index'); //con esto indicamos que esperamos la vista projects.index

        $response->assertViewHas('projects'); //con esto indicamos la variable que queremos recibir en la vista

        $response->assertSee($project->title); //Esperamos que en la vista se muestre el titulo del proyecto

    }

    public function test_can_see_individual_projects()
    {
        $project =  factory(Project::class)->create();

        $project2 = factory(Project::class)->create();


        $response = $this->get(route('projects.show', $project));

        $response->assertSee($project->title);
        $response->assertDontSee($project2->title);

        $response->assertStatus(200);

    }
}
