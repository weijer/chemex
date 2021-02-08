<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Services\PartService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class PartRecordDeleteAction extends RowAction
{

    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '🔨 ' . admin_trans_label('Delete');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('part.record.delete')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        PartService::partDelete($this->getKey());

        return $this->response()
            ->success(trans('main.success'))
            ->refresh();
    }

    /**
     * 对话框
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Delete Confirm'), admin_trans_label('Delete Confirm Description')];
    }
}