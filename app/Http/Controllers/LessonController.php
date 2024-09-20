<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderSectionRequest;
use App\Models\Section;
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

    // hapus data
    public function destroy(Lesson $lesson)
    {
        try {
            $this->lesson_repository->deleteData($lesson->id);

            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan dengan sistem']);
        }
    }

    // ubah urutan
    public function changeOrder(ChangeOrderSectionRequest $request, Section $section) {
            
        $validated = $request->validated();

        if ($validated['new_order'] === $validated['old_order']) {
            return redirect()->back()->with('success', 'Urutan berhasil diperbarui');
        }

        $section_update_first = $this->lesson_repository->getByOrderSectionId($validated['old_order'], $section->id);

        $section_update_second = $this->lesson_repository->getByOrderSectionId($validated['new_order'], $section->id);

        $data_update_first = [
            'order' => $validated['new_order']
        ];

        $data_update_second = [
            'order' => $validated['old_order']
        ];

        $this->lesson_repository->updateData($data_update_first, $section_update_first->id);
        $this->lesson_repository->updateData($data_update_second, $section_update_second->id);

        return redirect()->back()->with('success', 'Urutan berhasil diperbarui');
    
}

}
