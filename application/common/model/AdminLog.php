<?php
/**
 * @author xialeistudio <xialeistudio@gmail.com>
 */

namespace app\common\model;

/**
 * Class AdminLog
 * @package app\common\model
 * @property int $log_id
 * @property int $action
 * @property int $msg
 * @property int $created_at
 * @property string $created_ip
 * @property mixed $params
 * @property int $admin_id
 */
class AdminLog extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $createTime         = 'created_at';
    protected $updateTime         = false;

    const ACTION_LOGIN = 1;
    const ACTION_CHANGE_PASSWORD = 2;
    const ACTION_ADD_BOOK = 3;
    const ACTION_UPDATE_BOOK = 4;
    const ACTION_LEND_BOOK = 5;
    const ACTION_UPDATE_BOOK_LEND = 6;
    const ACTION_RETURN_BOOK = 7;

    protected function initialize()
    {
        self::beforeInsert(function (AdminLog $log) {
            $log->params = is_array($log->params) ? json_encode($log->params, 320) : $log->params;
        });
    }
}