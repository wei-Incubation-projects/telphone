<?php

namespace App\Admin\Actions;

use App\Admin\Forms\BatchPhoneUser;
use App\Admin\Forms\UploadSetting;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Dcat\Admin\Traits\HasPermissions;
use Dcat\Admin\Widgets\Modal;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class BatchPhoneAction extends AbstractTool
{
    /**
     * @return string
     */
    protected $title = '分配';
//    protected string $style = 'btn btn-primary grid-refresh btn-mini btn-outline';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {



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

    public function render()
    {
        $modal = Modal::make()->lg()
            ->title('分配号码')
            ->body(new BatchPhoneUser($this->getKey()))
            ->button('<button class="btn btn-primary grid-refresh btn-mini btn-outline">'.$this->title.'</button>');

        return $modal->render();
    }

//    protected function html()
//    {
//        $this->appendHtmlAttribute('class', $this->style);
//
//        return <<<HTML
//<button {$this->formatHtmlAttributes()}>{$this->title()}</button>
//HTML;
//    }

    /**
     * {@inheritdoc}
     */
    protected function actionScript()
    {
        $warning = __('No data selected!');

        return <<<JS
function (data, target, action) {
    var key = {$this->getSelectedKeysScript()}

    if (key.length === 0) {
        Dcat.warning('{$warning}');
        return false;
    }

    // 设置主键为复选框选中的行ID数组
    action.options.key = key;
}
JS;
    }

    /**
     * @return string
     */
    public function getSelectedKeysScript()
    {
        return "Dcat.grid.selected('{$this->parent->getName()}')";
    }
}
