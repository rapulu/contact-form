<?php

namespace Tests\Feature;

use App\Models\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test  */
    public function contact_forms_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('contact_forms', [
                'name', 'email', 'message', 'file'
            ],)
        );
    }

    /** @test */
    public function add_new_contact_form(){

        $contactForm = ContactForm::factory()->create();

        $this->post(route('send.form'), $contactForm->toArray());

        $this->assertDatabaseHas('contact_forms', [
            'name' => $contactForm->name,
            'email' => $contactForm->email,
            'message' => $contactForm->message,
            'file' => $contactForm->file
        ]);
    }

    /** @test  */
    public function name_is_required_when_form_is_submitted()
    {
        $response = $this->post(route('send.form'), [
            'name' => null,
            'email' => 'a.rapulu@gmail.com',
            'message' => 'Hello world',
            'file' => null
        ]);
        $response->assertSessionHasErrors([
            'name' => 'The name field is required.'
        ]);
    }

    /** @test  */
    public function email_is_required_when_form_is_submitted()
    {
        $response = $this->post(route('send.form'), [
            'name' => 'Paul',
            'email' => null,
            'message' => 'Hello world',
            'file' => null
        ]);
        $response->assertSessionHasErrors([
            'email' => 'The email field is required.'
        ]);
    }

    /** @test  */
    public function email_is_valid_when_form_is_submitted()
    {
        $response = $this->post(route('send.form'), [
            'name' => 'Paul',
            'email' => 'a.rapulu',
            'message' => null,
            'file' => null
        ]);
        $response->assertSessionHasErrors([
            'email' => 'The email must be a valid email address.'
        ]);
    }

    /** @test  */
    public function message_is_required_when_form_is_submitted()
    {
        $response = $this->post(route('send.form'), [
            'name' => 'Paul',
            'email' => 'a.rapulu@gmail.com',
            'message' => null,
            'file' => null
        ]);
        $response->assertSessionHasErrors([
            'message' => 'The message field is required.'
        ]);
    }

}
