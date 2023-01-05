<?php

namespace App\Http\Controllers;

use App\Exports\SiteExport;
use App\Site;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SitesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role === config('user.role.admin')) {
            $sites = Site::get();
        } else {
            $sites = $user->sites()->get();
        }

        return view('sites.index', [
            'sites' => $sites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $randomVesselNames = [
            'The Blankney',
            'Beaver',
            'Quainton',
            'Churchill',
            'Thatcham',
            'Cowper',
            'Adelaide',
            'The Kildimo',
            'Infanta',
        ];

        return view('sites.create', [
            'namePlaceholder' => '"'.$randomVesselNames[array_rand($randomVesselNames)].'"',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $site = new Site();
        $site->name = $request->input('name');
        $site->user_id = auth()->user()->id;
        $site->type = $request->input('type');

        $site->save();

        return redirect()->route('sites.index');
    }

    /**
     * Show the detail of a site.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        $siteID = $request->site;
        $site = Site::find($siteID);

        /*
         * @TODO we can use policy here
         */
        $user = Auth::user();
        if ($user->role !== config('user.role.admin')) {
            $user = auth()->user();
            $sites = $user->sites()->get();
            $isBelongToThisUser = $sites->contains('id', $siteID);

            if (!$isBelongToThisUser) {
                abort(403, 'Access denied');
            }
        }

        return view('sites.show', ['site' => $site]);
    }

    /**
     * Export sites to CSV
     *
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function exportCSV(Request $request): BinaryFileResponse
    {
        return Excel::download(new SiteExport(), 'site.csv');
    }
}
