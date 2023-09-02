<?php

namespace App\Admin\Actions;

use App\Admin\Forms\UploadSetting;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Dcat\Admin\Traits\HasPermissions;
use Dcat\Admin\Widgets\Modal;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UploadUserPhone extends AbstractTool
{
    /**
     * @return string
     */
	protected $title = '上传';
    protected $style = 'btn btn-primary grid-refresh btn-mini btn-outline';

    public function render()
    {
        $modal = Modal::make()->lg()
            ->title('上传号码')
            ->body(new UploadSetting())
            ->button('<button class="btn btn-primary grid-refresh btn-mini btn-outline">上传</button>');

        return $modal->render();
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
