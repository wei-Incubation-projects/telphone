<?php

namespace App\Admin\Forms;

use App\Imports\PhoneImport;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UploadSetting extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {

        // return $this->response()->error('Your error message.');
        $res = Excel::import(new PhoneImport($input['admin_id']),Storage::disk('public')->path($input['file']));
        return $this
				->response()
				->success('Processed successfully.')
				->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->confirm('您确定要提交表单吗', 'content');
        $this->hidden('admin_id')->default(Admin::user()->id);
        $this->file('file','选择文件' )->autoUpload()->override()->disk('public');
    }
//
//    /**
//     * The data of the form.
//     *
//     * @return array
//     */
//    public function default()
//    {
//        return [
//            'admin_id'  => 'John Doe',
//            'file' => 'John.Doe@gmail.com',
//        ];
//    }
}
