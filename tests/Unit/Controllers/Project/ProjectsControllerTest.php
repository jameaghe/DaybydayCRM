<?php
namespace Tests\Unit\Controllers\Project;

use App\Models\Project;
use App\Models\Status;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectsControllerTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    private $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->client = Client::factory()->create();
    }

    /** @test **/
    public function can_create_project()
    {
        $response = $this->json('POST', route('projects.store'), [
                'title' => 'Project test',
                'description' => 'This is a description',
                'status_id' => Status::factory()->create(['source_type' => Project::class])->id,
                'user_assigned_id' => $this->user->id,
                'user_created_id' => $this->user->id,
                'client_external_id' => $this->client->external_id,
                'deadline' => '2020-01-01',
        ]);

        $projects = Project::where('user_assigned_id', $this->user->id);

        $this->assertCount(1, $projects->get());
        $this->assertEquals($response->getData()->project_external_id, $projects->first()->external_id);
    }

    /** @test **/
    public function can_update_assignee()
    {
        $project = Project::factory()->create();
        $this->assertNotEquals($project->user_assigned_id, $this->user->id);

        $response = $this->json('PATCH', route('project.update.assignee', $project->external_id), [
            'user_assigned_id' => $this->user->id
        ]);

        $this->assertEquals($project->refresh()->user_assigned_id, $this->user->id);
    }

    /** @test **/
    public function can_update_status()
    {
        $project = Project::factory()->create();
        $status = Status::factory()->create();

        $this->assertNotEquals($project->status_id, $status->id);

        $response = $this->json('PATCH', route('project.update.status', $project->external_id), [
            'status_id' => $status->id
        ]);

        $this->assertEquals($project->refresh()->status_id, $status->id);
    }


    /** @test */
    public function can_update_deadline_for_project()
    {
        $project = Project::factory()->create();

        $response = $this->json('PATCH', route('project.update.deadline', $project->external_id), [
            'deadline_date' => '2020-08-06',
            'deadline_time' => '00:00',
        ]);

        $this->assertEquals(Carbon::parse('2020-08-06')->toDate(), $project->refresh()->deadline->toDate());
    }
}
