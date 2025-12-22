<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshop HTML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container pt-5 pb-5">
    <h1>Workshop #HTML - FORM</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <b>Server Validate ไม่ผ่าน:</b>
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="html101Form"
      action="{{ route('workshop.store') }}"
      method="POST"
      enctype="multipart/form-data"
      novalidate>
    @csrf


        <div id="formAlert" class="alert d-none" role="alert"></div>

        <div class="mb-3 row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">ชื่อ</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       id="inputFirstName"
                       name="first_name"
                       placeholder="Firstname"
                       value="{{ old('first_name') }}">
                <div class="invalid-feedback">กรุณากรอกชื่อ</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputLastName" class="col-sm-2 col-form-label">นามสกุล</label>
            <div class="col-sm-10">
                <input type="text"
                       class="form-control"
                       id="inputLastName"
                       name="last_name"
                       placeholder="Lastname"
                       value="{{ old('last_name') }}">
                <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="bdate" class="col-sm-2 col-form-label">วัน/เดือน/ปี</label>
            <div class="col-sm-10">
                <input type="date"
                       class="form-control"
                       id="bdate"
                       name="birthdate"
                       value="{{ old('birthdate') }}">
                <div class="invalid-feedback">กรุณาเลือกวันเดือนปีเกิด</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="age" class="col-sm-2 col-form-label">อายุ</label>
            <div class="col-sm-10">
                <input type="number"
                       class="form-control"
                       id="age"
                       name="age"
                       placeholder="Age"
                       readonly
                       value="{{ old('age') }}">
                <div class="invalid-feedback">กรุณาเลือกวันเกิดเพื่อคำนวณอายุ</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">เพศ</label>
            <div class="col-sm-10" id="genderGroup">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="male" id="gender1"
                           {{ old('gender') === 'male' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender1">เพศชาย</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="female" id="gender2"
                           {{ old('gender') === 'female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender2">เพศหญิง</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="none" id="gender3"
                           {{ old('gender') === 'none' ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender3">ไม่ต้องการตอบ</label>
                </div>
                <div class="text-danger small d-none" id="genderError">กรุณาเลือกเพศ</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">รูปภาพ</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                <div class="invalid-feedback">กรุณาเลือกรูปภาพ</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ที่อยู่</label>
            <div class="col-sm-10">
                <textarea name="location" id="location" cols="40" rows="5" class="form-control">{{ old('location') }}</textarea>
                <div class="invalid-feedback">กรุณากรอกที่อยู่</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">สีที่ชอบ</label>
            <div class="col-sm-10" id="colorGroup">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fav_color" id="colorRed" value="red"
                           {{ old('fav_color') === 'red' ? 'checked' : '' }}>
                    <label class="form-check-label" for="colorRed">สีแดง</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fav_color" id="colorGreen" value="green"
                           {{ old('fav_color') === 'green' ? 'checked' : '' }}>
                    <label class="form-check-label" for="colorGreen">สีเขียว</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fav_color" id="colorRandom" value="random"
                           {{ old('fav_color') === 'random' ? 'checked' : '' }}>
                    <label class="form-check-label" for="colorRandom">อะไรก็ได้ (สุ่ม)</label>
                </div>
                <div class="text-danger small d-none" id="colorError">กรุณาเลือกสีที่ชอบ</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">แนวเพลงที่ชอบ</label>
            <div class="col-sm-10" id="musicGroup">
                @php $oldMusic = old('music', []); @endphp
                <div class="form-check"><input class="form-check-input" type="checkbox" name="music[]" value="pop" id="mPop" {{ in_array('pop', $oldMusic) ? 'checked' : '' }}><label class="form-check-label" for="mPop">Pop</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="music[]" value="rock" id="mRock" {{ in_array('rock', $oldMusic) ? 'checked' : '' }}><label class="form-check-label" for="mRock">Rock</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="music[]" value="hiphop" id="mHipHop" {{ in_array('hiphop', $oldMusic) ? 'checked' : '' }}><label class="form-check-label" for="mHipHop">Hip-hop/Rap</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="music[]" value="lukthung" id="mLukthung" {{ in_array('lukthung', $oldMusic) ? 'checked' : '' }}><label class="form-check-label" for="mLukthung">ลูกทุ่ง</label></div>
                <div class="text-danger small d-none" id="musicError">กรุณาเลือกแนวเพลงอย่างน้อย 1 แนว</div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ยินยอมให้เก็บข้อมูล</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="consentYes" name="consent_yes" value="yes"
                           {{ old('consent_yes') ? 'checked' : '' }}>
                    <label class="form-check-label" for="consentYes">ยินยอม</label>
                </div>
                <div class="text-danger small d-none" id="consentError">ต้องติ๊ก “ยินยอม” ก่อนส่งฟอร์ม</div>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-success">บันทึก</button>
                <button type="reset" class="btn btn-danger">ล้างข้อมูล</button>
            </div>
        </div>

    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('html101Form');
    const alertBox = document.getElementById('formAlert');

    const firstName = document.getElementById('inputFirstName');
    const lastName  = document.getElementById('inputLastName');
    const bdate     = document.getElementById('bdate');
    const age       = document.getElementById('age');
    const photo     = document.getElementById('photo');
    const location  = document.getElementById('location');

    const genderError    = document.getElementById('genderError');
    const colorError     = document.getElementById('colorError');
    const musicError     = document.getElementById('musicError');
    const consentError   = document.getElementById('consentError');

    function showAlert(type, msg) {
        alertBox.className = `alert alert-${type}`;
        alertBox.textContent = msg;
        alertBox.classList.remove('d-none');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    function hideAlert() { alertBox.classList.add('d-none'); }
    function mark(el, bad) {
        el.classList.toggle('is-invalid', bad);
        el.classList.toggle('is-valid', !bad);
    }
    function calcAge(dateStr) {
        if (!dateStr) return '';
        const dob = new Date(dateStr);
        if (Number.isNaN(dob.getTime())) return '';
        const now = new Date();
        let a = now.getFullYear() - dob.getFullYear();
        const m = now.getMonth() - dob.getMonth();
        if (m < 0 || (m === 0 && now.getDate() < dob.getDate())) a--;
        return a >= 0 ? a : '';
    }

    bdate.addEventListener('change', () => {
        age.value = calcAge(bdate.value);
    });

    form.addEventListener('reset', () => {
        hideAlert();
        [firstName, lastName, bdate, age, photo, location].forEach(el => {
            el.classList.remove('is-invalid', 'is-valid');
        });
        genderError.classList.add('d-none');
        colorError.classList.add('d-none');
        musicError.classList.add('d-none');
        consentError.classList.add('d-none');
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        hideAlert();

        const genderChecked = document.querySelector('input[name="gender"]:checked');
        const colorChecked  = document.querySelector('input[name="fav_color"]:checked');
        const musicChecked  = document.querySelectorAll('input[name="music[]"]:checked');
        const consentYes    = document.getElementById('consentYes').checked;

        if (!age.value && bdate.value) age.value = calcAge(bdate.value);

        let ok = true;

        if (!firstName.value.trim()) { mark(firstName, true); ok = false; } else mark(firstName, false);
        if (!lastName.value.trim())  { mark(lastName, true);  ok = false; } else mark(lastName, false);
        if (!bdate.value) { mark(bdate, true); ok = false; } else mark(bdate, false);
        if (!age.value)   { mark(age, true);   ok = false; } else mark(age, false);

        const hasPhoto = photo.files && photo.files.length > 0;
        mark(photo, !hasPhoto);
        if (!hasPhoto) ok = false;

        if (!location.value.trim()) { mark(location, true); ok = false; } else mark(location, false);

        if (!genderChecked)  { genderError.classList.remove('d-none'); ok = false; }
        else genderError.classList.add('d-none');

        if (!colorChecked)   { colorError.classList.remove('d-none'); ok = false; }
        else colorError.classList.add('d-none');

        if (!musicChecked || musicChecked.length === 0) { musicError.classList.remove('d-none'); ok = false; }
        else musicError.classList.add('d-none');

        if (!consentYes) { consentError.classList.remove('d-none'); ok = false; }
        else consentError.classList.add('d-none');

        if (!ok) {
            showAlert('danger', 'Error: กรุณากรอกข้อมูลให้ครบทุกช่องก่อนส่งฟอร์ม');
            return;
        }

        showAlert('success', 'Pass: กรอกข้อมูลครบแล้ว ✅ กำลังส่งฟอร์ม...');
        setTimeout(() => form.submit(), 200); // ส่งเข้าหา Laravel จริง
    });
});
</script>

</body>
</html>
