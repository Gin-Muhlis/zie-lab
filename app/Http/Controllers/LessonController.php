<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Lesson;
use Illuminate\Support\Str;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Repositories\Lesson\LessonRepository;

class LessonController extends Controller
{
    private $lesson_repository;
    public function __construct(LessonRepository $lessonRepository)
    {
        $this->lesson_repository = $lessonRepository;
    }

    // tambah data
    public function store(StoreLessonRequest $request)
    {
        try {
            $validated = $request->validated();

            do {
                $validated['code'] = Str::random('10');
            } while (Lesson::where('code', $validated['code'])->exists());

            $last_order_lesson = $this->lesson_repository->getLastOrderLesson($validated['section_id']);
            $validated['order'] = $last_order_lesson->order + 1;
            $validated['is_preview'] = 0;

            $this->lesson_repository->createData($validated);

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // edit data
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        try {
            $validated = $request->validated();

            $data['title'] = $validated['title_update'];
            $data['content'] = $validated['content_update'];
            $data['video_url'] = $validated['video_url_update'];

            $this->lesson_repository->updateData($data, $lesson->id);

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
