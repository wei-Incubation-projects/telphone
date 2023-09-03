<?php

namespace App\Admin\Forms;

use App\Models\User;
use Dcat\Admin\Widgets\Form;

class BatchPhoneUser extends Form
{
    public function __construct($data = [], $key = null)
    {
        parent::__construct($data, $key);
    }

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
        $this->select('user')->options(User::class,'id','name')->ajax('/api/users');
    }
}
