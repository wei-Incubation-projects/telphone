<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\UserPhoneAction;
use App\Admin\Actions\ShowUserPhones;
use App\Admin\Repositories\User;
use App\Models\UserPhone;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('email');
//            $grid->column('email_verified_at');
//            $grid->column('password');
//            $grid->column('remember_token');
            $grid->column('status')->display(function($status){
                return $status ? '正常':'禁用';
            });
            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('id');
                    $filter->like('name','名称');
            });
            $grid->column('phones')->display(function ($phones){
               return new UserPhoneAction();
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
//            $show->field('email_verified_at');
            $show->field('password');
//            $show->field('remember_token');
            $show->field('status')->using(['1'=>'正常','0'=>'禁用']);
            $show->field('created_at');
            $show->field('updated_at');

            $show->relation('phones', function($model){
                $grid = new Grid(new UserPhone);
                $grid->model()->where('user_id',$model->id);
                $grid->setResource('user-phone');
                $grid->phones();
                $grid->filter(function ($filter){
                   $filter->like('phone')->width('300px');
                });
                return $grid;
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->hidden('admin_id',)->default(Admin::user()->id);
            $form->text('name');
            $form->text('email');
//            $form->text('email_verified_at');
            $form->password('password');
//            $form->text('remember_token');
            $form->radio('status')->options(['1'=>'正常','0'=>'禁用'])->default('1');

            $form->display('created_at');
            $form->display('updated_at');
            $form->saving(function (Form $from ){
                $from->password = password_hash($from->password,PASSWORD_DEFAULT);
            });
        });
    }
}
