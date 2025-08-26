<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GoldFilter extends AbstractFilter
{
    public const SERVER_ID = 'server_id';
    public const FACTION_ID = 'faction_id';

    protected function getCallbacks(): array
    {
        return [
          self::SERVER_ID => [$this, 'serverId'],
          self::FACTION_ID => [$this, 'factionId'],
        ];
    }

    public function serverId(Builder $builder, $value)
    {
        $builder->where('server_id', $value);
    }

    public function factionId(Builder $builder, $value)
    {
        $builder->where('faction_id', $value);
    }
}
