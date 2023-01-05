<?php

namespace App\Exports;

use App\Site;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiteExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection()
    {
        $user = auth()->user();
        if ($user->role === config('user.role.admin')) {
            $sites = Site::join('users', 'sites.user_id', '=', 'users.id')
                        ->select('sites.*', 'users.name as username', 'users.email')
                        ->get();
        } else {
            $sites = Site::join('users', 'sites.user_id', '=', 'users.id')
                ->select('sites.*', 'users.name as username', 'users.email')
                ->where('users.id', $user->id)
                ->get();
        }

        $results = [];
        foreach ($sites as $site) {
            $results[] = [
                'id' => $site->id,
                'user_id' => $site->user_id,
                'name' => $site->name,
                'type' => $site->type,
                'created_at' => $site->created_at,
                'updated_at' => $site->updated_at,
                'username' => $site->username,
                'email' => $site->email,
            ];
        }
        return collect($results);
    }

    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'name',
            'type',
            'created_at',
            'updated_at',
            'username',
            'email',
        ];
    }
}
