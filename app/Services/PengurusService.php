<?php

namespace App\Services;

use App\Repositories\DivisionRepository;
use App\Repositories\UserRepository;

class PengurusService
{
    protected $userRepository;
    protected $divisionRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->divisionRepository = new DivisionRepository();
    }

    public function byYear(string $year)
    {
        $users = $this->userRepository->byYear($year);

        $positionPriority = [
            'Ketua Umum'        => 1,
            'Sekretaris'        => 2,
            'Bendahara'         => 3,
            'Kepala Divisi'     => 4,
            'Kepala Subdivisi'  => 5,
            'Anggota'           => 6,
        ];

        $divisionPriority = [
            'Badan Pengurus Harian'     => 1,
            'Pengembangan Sumber Daya Mahasiswa'    => 2,
            'Penelitian dan Pengembangan' => 3,
            'Hubungan Mahasiswa'   => 4,
            'Hubungan Luar'  => 5,
            'Media Sosial'   => 6,
            'Media & Teknologi'  => 7,
            'Media Informasi'  => 8,
            'Pengembangan Teknologi'  => 9,
        ];

        $data = $users->map(function ($user) use ($year) {
            $activePeriode = collect($user->periode)->firstWhere('year', $year);
            $division = $this->divisionRepository->findById($activePeriode['division_id'] ?? null);
            
            return [
                'user_id'       => $user->id,
                'name'          => $user->name,
                'division'      => $division->name ?? 'Tanpa Divisi',
                'position'      => $activePeriode['position'] ?? 'Anggota',
                'photo'         => $user->photo,
                'instagram'     => $user->instagram,
                'linkedin'      => $user->linkedin,
            ];
        })
        ->sort(function ($a, $b) use ($divisionPriority, $positionPriority) {
            
            $divA = $divisionPriority[$a['division']] ?? 99;
            $divB = $divisionPriority[$b['division']] ?? 99;

            if ($divA != $divB) {
                return $divA <=> $divB;
            }

            $posA = $positionPriority[$a['position']] ?? 99;
            $posB = $positionPriority[$b['position']] ?? 99;

            return $posA <=> $posB;
        })

        ->groupBy('division');

        return [
            'requested_year' => $year,
            'data' => $data
        ];
    }
}