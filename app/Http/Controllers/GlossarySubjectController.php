<?php

namespace App\Http\Controllers;

use App\GlossarySubjects;
use BladeView;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class GlossarySubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return BladeView|false|Factory|Application|View
     */
    public function index()
    {
        $glossary_subjects = GlossarySubjects::orderBy('id', 'DESC')->paginate(10);
        return view('admin.glossary.glossary_subject_list', compact('glossary_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return BladeView|false|Factory|Application|View
     */
    public function create()
    {
        $glossary_subject = null;
        return view('admin.glossary.glossary_subject_edit', compact('glossary_subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return BladeView|false|Factory|Application|View
     */
    public function edit(int $id)
    {
        $glossary_subject = GlossarySubjects::findOrFail($id);
        return view('admin.glossary.glossary_subject_edit', compact('glossary_subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'english'       =>  'required_without_all:farsi,pashto,munji,nuristani,pashayi,shughni,swahili,uzbek',
            'farsi'         =>  'required_without_all:english,pashto,munji,nuristani,pashayi,shughni,swahili,uzbek',
            'pashto'        =>  'required_without_all:farsi,english,munji,nuristani,pashayi,shughni,swahili,uzbek',
            'munji'         =>  'required_without_all:english,farsi,pashto,nuristani,pashayi,shughni.swahili,uzbek',
            'nuristani'     =>  'required_without_all:english,farsi,pashto,munji,pashayi,shughni,swahili,uzbek',
            'pashayi'       =>  'required_without_all:english,farsi,pashto,munji,nuristani,shughni,swahili,uzbek',
            'shughni'       =>  'required_without_all:english,farsi,pashto,munji,nuristani,pashayi,swahili,uzbek',
            'swahili'       =>  'required_without_all:english,farsi,pashto,munji,nuristani,pashayi,shughni,uzbek',
            'uzbek'         =>  'required_without_all:english,farsi,pashto,munji,nuristani,pashayi,shughni,swahili',
            'id'            =>  'required'
        ]);

        if($validatedData['id'] == "new")
            $glossary_subject = new GlossarySubjects();
        else
            $glossary_subject = GlossarySubjects::findOrFail($validatedData['id']);

        $glossary_subject->en = $validatedData['english'];
        $glossary_subject->fa = $validatedData['farsi'];
        $glossary_subject->ps = $validatedData['pashto'];
        $glossary_subject->mj = $validatedData['munji'];
        $glossary_subject->no = $validatedData['nuristani'];
        $glossary_subject->pa = $validatedData['pashayi'];
        $glossary_subject->sh = $validatedData['shughni'];
        $glossary_subject->sw = $validatedData['swahili'];
        $glossary_subject->uz = $validatedData['uzbek'];
        $glossary_subject->save();

        return redirect(route('glossary_subjects_list'))->with('status', __('Glossary subject(s) updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
