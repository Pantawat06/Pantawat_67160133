<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    // แสดงรายการข้อมูล
    public function index()
    {
        $pokedexs = Pokedex::all();
        return view('pokedex.index', compact('pokedexs'));
    }

    // หน้าฟอร์มเพิ่มข้อมูล
    public function create()
    {
        return view('pokedex.create');
    }

    // บันทึกข้อมูล (Insert)
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required',
        'image_url' => 'image|nullable|max:1999', // ตรวจสอบว่าเป็นไฟล์รูปภาพ
    ]);

    // รับค่าทั้งหมดมาจากฟอร์ม
    $data = $request->all();

    // ถ้ามีการอัปโหลดรูปภาพมา
    if ($request->hasFile('image_url')) {
        // บันทึกไฟล์ลงในโฟลเดอร์ storage/app/public/pokedex
        $path = $request->file('image_url')->store('pokedex', 'public');
        // เก็บ path ของรูปลงในฐานข้อมูลแทน URL เดิม
        $data['image_url'] = $path;
    }

    Pokedex::create($data);

    return redirect()->route('pokedex.index')
                     ->with('success', 'Pokemon created successfully.');
}

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
    ]);

    $pokedex = Pokedex::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('image_url')) {
        // (Optional) ลบรูปเก่าออกก่อนก็ได้ ถ้าต้องการ
        $path = $request->file('image_url')->store('pokedex', 'public');
        $data['image_url'] = $path;
    }

    $pokedex->update($data);

    return redirect()->route('pokedex.index')
                     ->with('success', 'Pokemon updated successfully');
}
}