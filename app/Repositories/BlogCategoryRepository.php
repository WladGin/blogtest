<?php


namespace App\Repositories;


use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 * @package App\Http\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }


    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application[]|Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     */
    public function getForComboBox()
    {
        $colums = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($colums)
            ->toBase()
            ->get();
        return $result;

    }

    /**
     * @param int|null $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage = null)
    {
        $colums = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($colums)
            ->paginate($perPage);
        //dd($result);
        return $result;
    }
}
