<?php

namespace App\Http\Controllers\Backend;

use App\Models\Podcast;
use App\Models\PodcastEpisode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class PodcastEpisodeController extends Controller
{
    protected $model;

    public function __construct(PodcastEpisode $model)
    {
        $this->model = $model;
    }

    /** get data table to show on method @index
     * @throws
     * @return mixed
     */
    public function dataTables()
    {
        $data = numrows(PodcastEpisode::all());
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return
                    '<a href="'.route('pagestatic.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                     <a href="'.route('pagestatic.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->editColumn('podcast_id', function ($data){
                return $data->podcast->title;
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
        return view('admin.backend.podcastepisodes.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $podcasts = Podcast::all();
        return view('admin.backend.podcastepisodes.create', compact('podcasts'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'podcast_id' => 'required',
            'listen_note_episode_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'listen_note_audio_url' => 'required',
            'audio_length_in_second' => 'required|integer',
            'image_url_listen_note' => 'required',
            'thumbnail_url_listen_note' => 'required',
            'explicit_content' => 'required',
            'is_published' => 'required',
        ]);

        DB::beginTransaction();
        $data = $this->model;
        $data->podcast_id = $request->get('podcast_id');
        $data->listen_note_episode_id = $request->get('listen_note_episode_id');
        $data->title = $request->get('title');
        $data->description = $request->get('description');
        $data->listen_note_audio_url = $request->get('listen_note_audio_url');
        $data->audio_length_in_second = $request->get('audio_length_in_second');
        $data->image_url_listen_note = $request->get('image_url_listen_note');
        $data->thumbnail_url_listen_note = $request->get('thumbnail_url_listen_note');
        $data->explicit_content = $request->get('explicit_content');
        $data->is_published = $request->get('is_published');
        $data->save();
        DB::commit();

        return redirect()->route('podcastepisodes.index')
            ->with('Podcast Episode created successfully.');
    }

    /**
     * @param $id
     * @return View
     */
//    public function show($id)
//    {
//        $data = $this->model->findOrFail($id);
//        return view('admin.backend.podcastepisodes.show',compact('data'));
//    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        $podcasts = Podcast::all();
        return view('admin.backend.podcastepisodes.edit',compact('data', 'podcasts'));
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
            'podcast_id' => 'required',
            'listen_note_episode_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'listen_note_audio_url' => 'required',
            'audio_length_in_second' => 'required|integer',
            'image_url_listen_note' => 'required',
            'thumbnail_url_listen_note' => 'required',
            'explicit_content' => 'required',
            'is_published' => 'required',
        ]);

        DB::beginTransaction();
        $data->podcast_id = $request->get('podcast_id');
        $data->listen_note_episode_id = $request->get('listen_note_episode_id');
        $data->title = $request->get('title');
        $data->description = $request->get('description');
        $data->listen_note_audio_url = $request->get('listen_note_audio_url');
        $data->audio_length_in_second = $request->get('audio_length_in_second');
        $data->image_url_listen_note = $request->get('image_url_listen_note');
        $data->thumbnail_url_listen_note = $request->get('thumbnail_url_listen_note');
        $data->explicit_content = $request->get('explicit_content');
        $data->is_published = $request->get('is_published');
        $data->update();

        return redirect()->route('podcastepisodes.index')->with('Page has been updated');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();

        return redirect()->route('podcastepisodes.index')
            ->with('Page deleted successfully');
    }
}
