<?php


namespace App\Http\Library;


use Illuminate\Support\Facades\Storage;

class ApiBaseResponse
{
    protected $LIMIT = 10;
    public function listPaginate($collection, $limit)
    {
        $return = [];
        $paginated = $collection->paginate($limit);
        $return['meta']['error'] = 0;
        $return['meta']['code'] = 200;
        $return['meta']['status'] = 'OK';
        $return['meta']['message'] = trans('message.api.success');
        $return['meta']['total'] = $paginated->total();
        $return['meta']['per_page'] = $paginated->perPage();
        $return['meta']['current_page'] = $paginated->currentPage();
        $return['meta']['last_page'] = $paginated->lastPage();
        $return['meta']['has_more_pages'] = $paginated->hasMorePages();
        $return['meta']['from'] = $paginated->firstItem();
        $return['meta']['to'] = $paginated->lastItem();
        $return['links']['self'] = url()->full();
        $return['links']['next'] = $paginated->nextPageUrl();
        $return['links']['prev'] = $paginated->previousPageUrl();
        $return['data'] = $paginated->items();
        return $return;
    }

    public function singleData($data, array $relations)
    {
        $return = [];
        $return['meta']['error'] = 0;
        $return['meta']['code'] = 200;
        $return['meta']['status'] = 'OK';
        $return['meta']['message'] = trans('message.api.success');
        $return['data'] = $data;
        $return = $this->generateRelations($return, $relations);
        return $return;
    }

    private function generateRelations($return, $relations) {
        if (isset($relations)) {
            foreach ($relations as $key => $relation)
            {
                $return['data'][$key] = $relation;
            }
        }
        return $return;
    }

    public function successResponse($id)
    {
        $return = [];
        $return['meta']['error'] = 0;
        $return['meta']['code'] = 200;
        $return['meta']['status'] = 'OK';
        $return['meta']['message'] = trans('message.api.success');
        $return['data']['id'] = $id;
        return $return;
    }

    public function errorResponse(\Exception $e)
    {
        $return = [];
        $return['meta']['code'] = 500;
        $return['meta']['status'] = 'Error';
        $return['meta']['message'] = trans('message.api.error');
        $return['meta']['error'] = $e->getMessage();
        return $return;
    }

    public function notFoundResponse()
    {
        $return = [];
        $return['meta']['code'] = 404;
        $return['meta']['status'] = 'not_found';
        $return['meta']['message'] = trans('message.api.notFound');
        return $return;
    }

    public function validationFailResponse($errors)
    {
        $return = [];
        $return['meta']['code'] = 400;
        $return['meta']['status'] = 'validation_error';
        $return['meta']['message'] = trans('message.api.badRequest');
        $return['data'] = $errors;
        return $return;
    }

    public function unauthorizedResponse()
    {
        $return = [];
        $return['meta']['code'] = 401;
        $return['meta']['status'] = 'unauthorized';
        $return['meta']['message'] = trans('message.api.unauthorized');
        return $return;
    }

    public function whereDoYouGo()
    {
        $return = [];
        $return['meta']['code'] = 401;
        $return['meta']['status'] = '';
        $return['meta']['message'] = trans('message.api.whereDoYouGo');
        return $return;
    }

    public function badRequest($errors)
    {
        $return = [];
        $return['meta']['code'] = 400;
        $return['meta']['status'] = 'bad_request';
        $return['meta']['message'] = trans('message.api.badRequest');
        $return['data'] = $errors;
        return $return;
    }

    public function invalidToken($errors)
    {
        $return = [];
        $return['meta']['code'] = 401;
        $return['meta']['status'] = 'invalid_token';
        $return['meta']['message'] = trans('message.api.invalidToken');
        $return['data'] = $errors;
        return $return;
    }

    public function unProcessableEntity($errors)
    {
        $return = [];
        $return['meta']['code'] = 422;
        $return['meta']['status'] = 'unprocessable_entity';
        $return['meta']['message'] = trans('message.api.unProcessableEntity');
        $return['data'] = $errors;
        return $return;
    }

    public function articleByCategory($category, $featured_article, $collection)
    {
        $return = [];
        $paginated = $collection->paginate();
        $return['meta']['error'] = 0;
        $return['meta']['code'] = 200;
        $return['meta']['status'] = 'OK';
        $return['meta']['message'] = trans('message.api.success');
        $return['meta']['total'] = $paginated->total();
        $return['meta']['per_page'] = $paginated->perPage();
        $return['meta']['current_page'] = $paginated->currentPage();
        $return['meta']['last_page'] = $paginated->lastPage();
        $return['meta']['has_more_pages'] = $paginated->hasMorePages();
        $return['meta']['from'] = $paginated->firstItem();
        $return['meta']['to'] = $paginated->lastItem();
        $return['links']['self'] = url()->full();
        $return['links']['next'] = $paginated->nextPageUrl();
        $return['links']['prev'] = $paginated->previousPageUrl();
        $return['category']['id'] = $category->id;
        $return['category']['name'] = $category->name;
        $return['category']['status'] = $category->status == 1 ? true : false;
        $return['category']['featured_image'] = url('/').Storage::url('images/'.$category->featured_image);
        $return['featured_article']['id'] = $featured_article->id;
        $return['featured_article']['name'] = $featured_article->name;
        $return['featured_article']['publish_datetime'] = $featured_article->publish_datetime;
        $return['featured_article']['featured_image'] = url('/').Storage::url('images/'.$featured_article->featured_image);
        $return['featured_article']['slug'] = $featured_article->slug;
        $return['featured_article']['is_featured_article'] = $featured_article->is_featured_article == 1 ? true : false;;
        $return['data'] = $paginated->items();
        return $return;
    }

}
