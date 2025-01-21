<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($query) {
            $editBtn = "<a href='" . route('admin.category.edit', $query->id) . "' class='btn btn-primary mr-sm-2 mb-2 mb-sm-0'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='" . route('admin.category.destroy', $query->id) . "' class='btn btn-danger delete-item'><i class='fas fa-trash'></i></a>";
            return "<div class='d-flex flex-column flex-sm-row'>" . $editBtn . $deleteBtn . "</div>";
        })
        ->addColumn('icon', function($query){
            return '<i style="font-size:20px" class="'.$query->icon.'"></i>';
        })
        ->addColumn('image', function($query) {
            return $query->image ? "<img width='20px' src='" . asset($query->image) . "'></img>" : 'NO IMAGE';
        })
        
        ->addColumn('status', function($query){
            if($query->status==1){
                $activeButton= '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'" >
                <span class="custom-switch-indicator"></span>
              </label>';
            }else{
                $activeButton= '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'" >
                <span class="custom-switch-indicator"></span>
              </label>';
            }
          return $activeButton;
        })
        ->rawColumns(['image', 'action', 'status','icon'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(20),
            Column::make('icon')->width(200),
            Column::make('image')->width(80),
            Column::make('name')->width('30px'),
            Column::make('status')->width('50px'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
