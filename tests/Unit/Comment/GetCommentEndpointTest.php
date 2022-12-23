<?php
namespace Tests\Unit\Comment;

use App\Models\Lead;
use App\Models\Project;
use App\Models\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Client;
use App\Models\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetCommentEndpointTest extends TestCase
{
    use DatabaseTransactions;

    private $lead;
    private $task;
    private $project;

    public function setUp(): void
    {
        parent::setUp();

        $this->lead = Lead::factory()->create();
        $this->task = Task::factory()->create();
        $this->project = Project::factory()->create();
    }

    /** @test */
    public function happyPath()
    {
        $this->assertEquals(url('comments/lead') . DIRECTORY_SEPARATOR . $this->lead->external_id, $this->lead->getCreateCommentEndpoint());
        $this->assertEquals(url('comments/task') . DIRECTORY_SEPARATOR . $this->task->external_id, $this->task->getCreateCommentEndpoint());
        $this->assertEquals(url('comments/project') . DIRECTORY_SEPARATOR . $this->project->external_id, $this->project->getCreateCommentEndpoint());
    }
}
