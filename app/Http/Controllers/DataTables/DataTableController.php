<?php

namespace App\Http\Controllers\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

abstract class DataTableController extends Controller
{
    protected $builder;

    abstract public function builder();

    public function __construct()
    {
        $this->builder = $this->builder();

        if (!$this->builder instanceof Builder) {
            throw new \Exception('Entity build must be an instance of Illuminate\Database\Eloquent\Builder.');
        }
    }

    public function index()
    {
        return response()->json([
            'data' => [
                'columns' => array_values($this->getDisplayableColumns()),
                'records' => $this->getRecords(),
            ]
        ]);
    }

    protected function getDisplayableColumns()
    {
        return array_diff($this->getModelColumnNames(), $this->builder->getModel()->getHidden());
    }

    protected function getModelColumnNames()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }

    protected function getRecords()
    {
        return $this->builder->get($this->getDisplayableColumns());
    }
}
