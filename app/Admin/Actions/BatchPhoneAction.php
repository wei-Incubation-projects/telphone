<?php

namespace App\Admin\Actions;

use App\Admin\Forms\BatchPhoneUser;
use App\Admin\Forms\UploadSetting;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Traits\HasPermissions;
use Dcat\Admin\Widgets\Modal;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class BatchPhoneAction extends BatchAction
{
    /**
     * @return string
     */
    protected $title = '分配';
    protected string $style = 'btn btn-primary grid-refresh btn-mini btn-outline';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        $modal = Modal::make()->lg()
            ->title('上传号码')
            ->body(new BatchPhoneUser())
        ->html('<div>111</div>');
        return $this->response()->html($modal);
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

//    public function render()
//    {
//
//        $modal = Modal::make()->lg()
//            ->title('分配号码')
//            ->body(new BatchPhoneUser($this->getKey()))
//            ->button('<button class="btn btn-primary grid-refresh btn-mini btn-outline">'.$this->title.'</button>');
//
//        return $modal->render();
//    }

    protected function html()
    {
        $this->appendHtmlAttribute('class', $this->style);

        return <<<HTML
<button {$this->formatHtmlAttributes()}>{$this->title()}</button>
HTML;
    }

}
