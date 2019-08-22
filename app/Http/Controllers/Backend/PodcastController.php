<?php

namespace App\Http\Controllers\Backend;

use App\Models\Podcast;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class PodcastController extends Controller
{
    protected $model;

    public function __construct(Podcast $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(Podcast::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('podcasts.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                     <a href="'.route('podcasts.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('explicit_content', function ($data){
                return $data->explicit_content == 1 ? 'Yes' : 'No';
            })
            ->editColumn('is_published', function ($data){
                return $data->is_published == 1 ? 'Yes' : 'No';
            })
            ->make(true);
    }

    /** show datatable
     * @return View
     */
    public function index()
    {
        return view('admin.backend.podcasts.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        return view('admin.backend.podcasts.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'listen_note_podcast_id' => 'required',
            'title' => 'required',
            'publisher' => 'required',
            'image_url_listen_note' => 'required',
            'thumbnail_url_listen_note' => 'required',
            'description' => 'required',
            'country' => 'required',
            'language' => 'required',
            'rss_url_from_listen_note' => 'required',
            'listen_note_url' => 'required',
            'explicit_content' => 'required',
            'is_published' => 'required',
        ]);

        DB::beginTransaction();
        $data = $this->model;
        $data->listen_note_podcast_id = $request->get('listen_note_podcast_id');
        $data->title = $request->get('title');
        $data->publisher = $request->get('publisher');
        $data->image_url_listen_note = $request->get('image_url_listen_note');
        $data->thumbnail_url_listen_note = $request->get('thumbnail_url_listen_note');
        $data->description = $request->get('description');
        $data->country = $request->get('country');
        $data->language = $request->get('language');
        $data->rss_url_from_listen_note = $request->get('rss_url_from_listen_note');
        $data->listen_note_url = $request->get('listen_note_url');
        $data->explicit_content = $request->get('explicit_content');
        $data->is_published = $request->get('is_published');
        $data->save();
        DB::commit();

        return redirect()->route('podcasts.index')
            ->with('podcast created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
//    public function show($id)
//    {
//        $data = $this->model->findOrFail($id);
//        return view('admin.backend.podcasts.show',compact('data'));
//    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        return view('admin.backend.podcasts.edit',compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);

        $request->validate([
            'listen_note_podcast_id' => 'required',
            'title' => 'required',
            'publisher' => 'required',
            'image_url_listen_note' => 'required',
            'thumbnail_url_listen_note' => 'required',
            'description' => 'required',
            'country' => 'required',
            'language' => 'required',
            'rss_url_from_listen_note' => 'required',
            'listen_note_url' => 'required',
            'explicit_content' => 'required',
            'is_published' => 'required',
        ]);

        $data->listen_note_podcast_id = $request->get('listen_note_podcast_id');
        $data->title = $request->get('title');
        $data->publisher = $request->get('publisher');
        $data->image_url_listen_note = $request->get('image_url_listen_note');
        $data->thumbnail_url_listen_note = $request->get('thumbnail_url_listen_note');
        $data->description = $request->get('description');
        $data->country = $request->get('country');
        $data->language = $request->get('language');
        $data->rss_url_from_listen_note = $request->get('rss_url_from_listen_note');
        $data->listen_note_url = $request->get('listen_note_url');
        $data->explicit_content = $request->get('explicit_content');
        $data->is_published = $request->get('is_published');
        $data->update();

        return redirect()->route('podcasts.index')->with('podcasts has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();

        return redirect()->route('podcasts.index')
            ->with('podcasts deleted successfully');
    }
}
