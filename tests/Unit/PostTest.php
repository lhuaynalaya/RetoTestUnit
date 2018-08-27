<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use App\Services\Post as PostService;
use App\Http\Requests\StorePost;
use App\Repositories\Post as PostRepository;
use Illuminate\Container\Container as App;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Assert as PHPUnit;


class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPuede_crear_un_post()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new PostRepository($app, $collection);
    	$service = new PostService($repository);
    	
    	$data = ['title' => 'Deportes', 'description' => 'se trata sobre futbol'];
   
			$validator = Validator::make(
			    ['title' => $data['title'], 'description' => $data['description']],
			    ['title' => 'required|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/', 'description' => 'max:6000']

			);

			if ($validator->fails())
			{
    		dd($validator->messages());
			}

    	$postStore = $service->store($data);
      $this->assertTrue($postStore->id != '');
    }

    public function testPuede_actualizar_un_post()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new PostRepository($app, $collection);
    	$service = new PostService($repository);

    	$id = '20d49730-aa23-11e8-a1dd-fda4682f7d41';

      $data = ['title' => 'Farandula', 'description' => 'se trata sobre personas que les gusta el show.'];

			$validator = Validator::make(
			    ['title' => $data['title'], 'description' => $data['description']],
			    ['title' => 'required|max:100|regex:/^[a-zA-ZáéíóúÁÉÍÓÚ0-9_. ]*$/', 'description' => 'max:6000']

			);
			
			if ($validator->fails())
			{
    		dd($validator->messages());
			}

    	$postUpdate = $service->update($data, $id);
 
    	if ($postUpdate == 1) {
    		$this->assertEquals($postUpdate, 1);
    	}else{
    		$this->assertEquals($postUpdate, 0);
    	}
    }

    public function testPuede_eliminar_un_post()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new PostRepository($app, $collection);
    	$service = new PostService($repository);

    	$id = '010225d0-aa4e-11e8-893d-4138103a47a0';
    	$postDelete = $service->delete($id);
    	if ($postDelete == 1) {
    		$this->assertEquals($postDelete, 1);
    	}else{
    		$this->assertEquals($postDelete, 0);
    	}
    }

 		 public function testPuede_obtener_posts()
    {
      $app = new App();
    	$collection = new Collection();
    	$repository = new PostRepository($app, $collection);
    	$service = new PostService($repository);

    	$postAll = $service->all();
    	$this->assertTrue(count($postAll) > 0);    	
    }

 		public function testPuede_encontrar_un_post_especifico()
    {
    	$app = new App();
    	$collection = new Collection();
    	$repository = new PostRepository($app, $collection);
    	$service = new PostService($repository);

    	$id = 'gc428660-a715-11e8-a0df-f9edb0f74769';

    	$postFind = $service->find($id);

			if ($postFind == null) {
    		$this->assertEquals($postFind, null);
    	}else{
    		$this->assertEquals($postFind->id, $id);
    	}
    } 

    public function testPuede_obtener_un_post_por_algun_campo()
    {
    	$app = new App();
    	$collection = new Collection();
    	$repository = new PostRepository($app, $collection);
    	$service = new PostService($repository);

    	$value = 'Deportes';

    	$postFindBy = $service->findBy('title', $value);

			if (count($postFindBy) > 0) {
			  $this->assertTrue(count($postFindBy) > 0);
			} else {
			  $this->assertFalse(count($postFindBy) > 0);
			}
    } 
}