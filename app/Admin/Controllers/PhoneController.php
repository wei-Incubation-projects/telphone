<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\UploadUserPhone;
use App\Admin\Forms\UploadSetting;
use App\Admin\Repositories\PhoneRepositories;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;

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
            $grid->tools(new UploadUserPhone());

            $grid->column('id')->sortable();
            $grid->column('phone');
//            $grid->column('resource');
            $grid->column('status')->display(function($status){
                return $status ? '正常':'禁用';
            });
            $grid->column('batch','批次');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('id');
                $filter->like('phone','号码');
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
//            $show->field('resource');
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
            $form->hidden('admin_id',)->default(Admin::user()->id);
            $form->mobile('phone')->required();
//            $form->text('resource');
            $form->radio('status')->options(['1'=>'正常','0'=>'禁用'])->default('1');

            $form->display('created_at');
            $form->display('updated_at');

        });
    }
}
