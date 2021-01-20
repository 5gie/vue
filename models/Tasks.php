<?php

namespace app\models;

use app\system\DbModel;

class Tasks extends DbModel
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $id;
    public string $title = '';
    public int $list_id;
    public int $status = self::STATUS_ACTIVE;

    public static function tableName(): string
    {
        return 'tasks';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->id = parent::save();
        return $this->id ?? false;
    }

    public function rules(): array
    {

        return [
            'title' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 250]],
        ];
    }

    public function attributes(): array
    {
        return ['title', 'list_id', 'status'];
    }

    public function labels(): array
    {
        return [
            'title' => 'Title',
        ];
    }
}
