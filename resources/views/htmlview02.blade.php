<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workshop Result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container pt-5 pb-5">
  <h1 class="mb-4 text-center">ผลลัพธ์หลังส่งฟอร์ม (ดูข้อมูลอย่างเดียว)</h1>

  @php
    $genderMap = ['male' => 'เพศชาย', 'female' => 'เพศหญิง', 'none' => 'ไม่ต้องการตอบ'];
    $colorMap  = ['red' => 'สีแดง', 'green' => 'สีเขียว', 'random' => 'อะไรก็ได้ (สุ่ม)'];
    $musicMap  = ['pop' => 'Pop', 'rock' => 'Rock', 'hiphop' => 'Hip-hop/Rap', 'lukthung' => 'ลูกทุ่ง'];
    $musicText = collect($data['music'] ?? [])->map(fn($m) => $musicMap[$m] ?? $m)->implode(', ');
  @endphp

  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered align-middle">
        <tr><th style="width:220px;">ชื่อ</th><td>{{ $data['first_name'] }}</td></tr>
        <tr><th>นามสกุล</th><td>{{ $data['last_name'] }}</td></tr>
        <tr><th>วัน/เดือน/ปี</th><td>{{ $data['birthdate'] }}</td></tr>
        <tr><th>อายุ</th><td>{{ $data['age'] }}</td></tr>
        <tr><th>เพศ</th><td>{{ $genderMap[$data['gender']] ?? $data['gender'] }}</td></tr>
        <tr><th>ที่อยู่</th><td style="white-space: pre-wrap;">{{ $data['location'] }}</td></tr>
        <tr><th>สีที่ชอบ</th><td>{{ $colorMap[$data['fav_color']] ?? $data['fav_color'] }}</td></tr>
        <tr><th>แนวเพลงที่ชอบ</th><td>{{ $musicText }}</td></tr>
        <tr><th>ยินยอมให้เก็บข้อมูล</th><td>ยินยอม</td></tr>
        <tr><th>ชื่อไฟล์รูป</th><td>{{ $photoName }}</td></tr>
      </table>

      @if(!empty($photoPreview))
        <div class="mt-3">
          <div class="fw-bold mb-2">พรีวิวรูป (ไม่ upload เก็บ)</div>
          <img src="{{ $photoPreview }}" class="img-fluid rounded border" style="max-height:320px;">
        </div>
      @endif

      <div class="mt-4 d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('workshop.index') }}">กลับไปหน้าฟอร์ม</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
