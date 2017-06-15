<?php

namespace Tests\Feature;

use contactApp\Contact;
use contactApp\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ContactTest extends TestCase
{
    use DatabaseMigrations;

    function setUp()
    {
        parent::setUp();
        $user = new User([
            'name'     => 'Test User',
            'email'    => 'testuser@example.com',
            'password' => 'secret',
        ]);
        $user->save();

        $contact = new Contact([
            'user_id'             => 1,
            'contact_type'        => 'friend',
            'name'                => 'Test Contact',
            'email_address'       => 'testcontact@example.com',
            'address'             => '123 Any St',
            'city'                => 'Salt Lake City',
            'state'               => 'UT',
            'postal_code'         => '84101',
            'phone_number_1'      => '801-555-1212',
            'phone_number_1_type' => 'mobile'
        ]);

        $user->contacts()->save($contact);

    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }

    /**
     * Check for existence of user record
     */
    public function testUserRecord()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com'
        ]);
    }

    /**
     * Check for existence of contact record
     */
    public function testContactRecord()
    {
        $this->assertDatabaseHas('contacts', [
            'email_address' => 'testcontact@example.com'
        ]);
    }

    /**
     * Return contact in JSON format
     */
    public function testGetContactByJSON()
    {

        $response = $this->json('GET', '/get-contact', ['name' => 'Text Contact']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * Return contact in JSON format
     */
    public function testPostContactByJSON()
    {
        $response = $this->json('POST', '/post-contact', [
            "user_id"                      => 1,
            "name"                         => "John Smith",
            "email_address"                => "js@mail.com",
            "address"                      => "123 My St",
            "city"                         => "Salt Lake City",
            "state"                        => "UT",
            "postal_code"                  => "84101",
            "contact_type"                 => "lead",
            "contact_type_additional_info" => "10",
            "phone_number_1"               => "801-555-1212",
            "phone_number_1_type"          => "mobile"
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
