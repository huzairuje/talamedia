<?php


namespace App\Repositories\Frontend;


use App\Models\PageStatic;

class PageStaticRepositories
{
    protected $pageStaticModel;

    public function __construct(PageStatic $pageStaticModel)
    {
        $this->pageStaticModel = $pageStaticModel;

    }

    public function getAllPageStatic()
    {
        $data = PageStatic::orderBy('created_at', 'desc')->paginate(10);
        return $data;
    }

    public function getPageStaticById($id)
    {
        $data = PageStatic::find($id);
        return $data;
    }

    public function getPageStaticByName($name)
    {
        $data = PageStatic::where('name', 'like', '%' . $name . '%')->first();
        return $data;
    }


}
