<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PokedexController;
use Carbon\Carbon;

class MyController extends Controller
{
    // เปิดหน้าฟอร์มเดิม
    public function index()
    {
        return view('html101');
    }

    // รับค่าฟอร์ม แล้วไปหน้าแสดงผล (ดูอย่างเดียว)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => ['required', 'string', 'max:100'],
            'last_name'   => ['required', 'string', 'max:100'],
            'birthdate'   => ['required', 'date'],
            'gender'      => ['required', 'in:male,female,none'],
            'photo'       => ['required', 'image', 'max:2048'], // ยังไม่ต้อง upload แค่รับไฟล์
            'location'    => ['required', 'string', 'max:1000'],
            'fav_color'   => ['required', 'in:red,green,random'],
            'music'       => ['required', 'array', 'min:1'],
            'music.*'     => ['in:pop,rock,hiphop,lukthung'],
            'consent_yes' => ['accepted'],
        ]);

        // คำนวณอายุจากวันเกิด (ไม่พึ่งค่า readonly)
        $validated['age'] = Carbon::parse($validated['birthdate'])->age;

        // ยังไม่ upload: แค่เอาชื่อไฟล์ + ทำ preview จากไฟล์ชั่วคราว (optional)
        $photoName = $request->file('photo')->getClientOriginalName();

        $photoPreview = null;
        if ($request->hasFile('photo')) {
            $mime  = $request->file('photo')->getMimeType();
            $bytes = file_get_contents($request->file('photo')->getPathname());
            $photoPreview = 'data:' . $mime . ';base64,' . base64_encode($bytes);
        }

        // ✅ เปลี่ยนจาก result -> htmlview02 (เพราะคุณมีไฟล์นี้อยู่แล้ว)
        return view('htmlview02', [
            'data' => $validated,
            'photoName' => $photoName,
            'photoPreview' => $photoPreview,
        ]);
    }
}
