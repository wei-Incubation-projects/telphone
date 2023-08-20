<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\PhoneRepositories;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PhoneController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PhoneRepositories(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('phone');
            $grid->column('resource');
            $grid->column('status');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new PhoneRepositories(), function (Show $show) {
            $show->field('id');
            $show->field('phone');
            $show->field('resource');
            $show->field('status');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new PhoneRepositories(), function (Form $form) {
            $form->display('id');
            $form->text('phone');
            $form->text('resource');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
