<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\UserPhoneAction;
use App\Admin\Repositories\UserPhoneRepositories;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserPhoneController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new UserPhoneRepositories(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id')->display(function ($userId){
                return User::query()->find($userId)->name;
            });
            $grid->column('phone');
            $grid->column('callback');
            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('phone');
            });
            $grid->tools(new UserPhoneAction());
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
        return Show::make($id, new UserPhoneRepositories(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('phone');
            $show->field('callback');
            $show->field('remark');
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
        return Form::make(new UserPhoneRepositories(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('phone');
            $form->text('callback');
            $form->text('remark');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
