<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Dcat\Admin\Widgets\Card;
class UserPhoneAction extends RowAction
{
    /**
     * @return string
     */
	protected $title = '分配';
    protected $style = 'btn btn-primary grid-refresh btn-mini btn-outline';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        return $this->response()
            ->success('Processed successfully: '.json_encode($this->getKey()))
            ->redirect('/');
    }

//    public function render()
//    {
//        return parent::render(); // TODO: Change the autogenerated stub
//    }

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

    /**
     * {@inheritdoc}
     */
//    public function actionScript()
//    {
//        $warning = __('No data selected!');
//
//        return <<<JS
//    var key = {$this->getSelectedKeysScript()}
//
//    if (key.length === 0) {
//        Dcat.warning('{$warning}');
//        return ;
//    }
//    Object.assign(data, {_key:key});
//JS;
//    }
}
