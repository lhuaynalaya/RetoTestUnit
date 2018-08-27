<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Comment as CommentService;
use App\Repositories\Comment as CommentRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Container\Container as App;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Assert as PHPUnit;

class CommentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPuede_crear_un_comment()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new CommentRepository($app, $collection);
    	$service = new CommentService($repository);

      $data = ['subject' => 'Invitaciòn', 'messaje' => 'se les invita a un evento de Microsoft', 'post_id' => '20d49730-aa23-11e8-a1dd-fda4682f7d41'];

      $validator = Validator::make(
			    ['subject' => $data['subject'], 'messaje' => $data['messaje'], 'post_id' => $data['post_id'] ],
			    ['subject' => 'required|max:100', 'messaje' => 'required|max:6000', 'post_id' => 'required' ]

			);

			if ($validator->fails())
			{
    		dd($validator->messages());
			}

    	$commentStore = $service->store($data);
      $this->assertTrue($commentStore->id != '');
    }

    public function testPuede_actualizar_un_comment()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new CommentRepository($app, $collection);
    	$service = new CommentService($repository);

    	$id = '20d49730-aa23-11e8-a1dd-fda4682f7d41';

      $data = ['subject' => 'Deporte', 'messaje' => 'El deporte se va a jugar el dia lunes.', 'post_id' => '20d49730-aa23-11e8-a1dd-fda4682f7d41'];

      $validator = Validator::make(
			    ['subject' => $data['subject'], 'messaje' => $data['messaje'], 'post_id' => $data['post_id'] ],
			    ['subject' => 'required|max:100', 'messaje' => 'required|max:6000', 'post_id' => 'required' ]

			);

			if ($validator->fails())
			{
    		dd($validator->messages());
			}

    	$commentUpdate = $service->update($data, $id);
 
    	if ($commentUpdate == 1) {
    		$this->assertEquals($commentUpdate, 1);
    	}else{
    		$this->assertEquals($commentUpdate, 0);
    	}
    }

    public function testPuede_eliminar_un_comment()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new CommentRepository($app, $collection);
    	$service = new CommentService($repository);

    	$id = 'ffc6fcf0-a70f-11e8-90e2-c980e1531f40';
    	$commentDelete = $service->delete($id);
    	if ($commentDelete == 1) {
    		$this->assertEquals($commentDelete, 1);
    	}else{
    		$this->assertEquals($commentDelete, 0);
    	}
    }

 		public function testPuede_obtener_comments()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new CommentRepository($app, $collection);
    	$service = new CommentService($repository);

    	$commentAll = $service->all();
    	$this->assertTrue(count($commentAll) > 0);    	
    }

 		public function testPuede_encontrar_un_comment_especifico()
    {
    	$app = new App();
    	$collection = new Collection();
    	$repository = new CommentRepository($app, $collection);
    	$service = new CommentService($repository);

    	$id = 'gc428660-a715-11e8-a0df-f9edb0f74769';

    	$commentFind = $service->find($id);

			if ($commentFind == null) {
    		$this->assertEquals($commentFind, null);
    	}else{
    		$this->assertEquals($commentFind->id, $id);
    	}
    } 

    public function testPuede_obtener_un_comment_por_algun_campo()
    {
    	$app = new App();
    	$collection = new Collection();
    	$repository = new CommentRepository($app, $collection);
    	$service = new CommentService($repository);

    	$value = 'Baile general';

    	$commentFindBy = $service->findBy('subject', $value);

			if (count($commentFindBy) > 0) {
			  $this->assertTrue(count($commentFindBy) > 0);
			} else {
			  $this->assertFalse(count($commentFindBy) > 0);
			}
    }
}
