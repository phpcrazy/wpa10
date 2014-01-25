<?php 

class BlogsController extends BaseController {
	// Blog Controller root
	protected $blog;

	public function __construct(Blog $blog) {
		$this->blog = $blog;
	}
	public function index(){
		// $blogs = DB::table('blogs')->get(); // Query Builder
		// $blogs = Blog::get(); // ORM
		$blogs = $this->blog->all(); // Depedency Injection
		return View::make('blogs.index')
			->with('blogs', $blogs);
		// return View::make('blogs.index', array('blogs' => $blogs)); 
		// return View::make('blogs.index', compact('blogs'));
	}
	// To create a blog
	public function create() {
		return View::make('blogs.create');
	}
	// to store the data
	public function store() {
		$blog = Input::all();
		$validation = Validator::make($blog, Blog::$rules);
		if($validation->passes()) {
			$this->blog->create($blog);
			return Redirect::route('blogs.index');
		}
		return Redirect::route('blogs.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}
	// to show a specific data
	public function show($id) { }
	// to edit the specific data
	public function edit($id) { }
	// to update the specific data
	public function update($id) { }
	// to delete the specific data
	public function destroy($id) {
		$this->blog->find($id)->delete();
		return Redirect::route('blogs.index');
	}
}			
					
 ?>