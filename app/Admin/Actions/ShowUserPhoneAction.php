<?php

namespace App\Admin\Actions;

use App\Admin\Forms\UploadSetting;
use App\Admin\Repositories\UserPhoneRepositories;
use App\Models\User;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid;
use Dcat\Admin\Show\AbstractTool;
use Dcat\Admin\Traits\HasPermissions;
use Dcat\Admin\Widgets\Modal;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShowUserPhoneAction extends AbstractTool
{
    /**
     * @return string
     */
	protected $title = '电话簿';

    public function __construct(public string $userId,$title = null)
    {
        parent::__construct($title);
    }

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
    	// dump($this->getKey());

        return $this->response()
            ->success('Processed successfully.')
            ->redirect('/');
    }
    public function render()
    {
       $modal = Modal::make()->lg()
           ->title('上传号码')
           ->body(Grid::make(new UserPhoneRepositories(),function (Grid $grid){
               $grid->model()->where('user_id',$this->userId);
//        $grid->column('id')->sortable();
//               $grid->column('user_id')->display(function ($userId){
//                   return User::query()->find($userId)->name;
//               });
               $grid->column('phone');
               $grid->column('callback');
               $grid->column('remark');
               $grid->column('created_at');
               $grid->column('updated_at')->sortable();

               $grid->filter(function (Grid\Filter $filter) {
                   $filter->like('phone');
               });
           }));
        return $modal->render();
    }

    /**
     * @return string|void
     */
    protected function href()
    {
        // return admin_url('auth/users');
    }

    /**
	 * @return string|array|void
	 */
	public function confirm()
	{
		// return ['Confirm?', 'contents'];
	}

    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
