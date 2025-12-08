<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshop HTML - Form Glow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .btn-custom-save {
            background-color: #28a745;
            color: white;
            border-radius: 20px;
            padding: 8px 25px;
        }
        .btn-custom-reset {
            background-color: #dc3545;
            color: white;
            border-radius: 20px;
            padding: 8px 25px;
        }

        
        .was-validated .form-control:valid, 
        .was-validated .form-check-input:valid {
            border-color: #198754;
           
            box-shadow: 0 0 10px 0.25rem rgba(25, 135, 84, 0.5); 
            background-image: none; 
        }

        
        .was-validated .form-control:invalid,
        .was-validated .form-check-input:invalid {
            border-color: #dc3545;
           
            box-shadow: 0 0 10px 0.25rem rgba(220, 53, 69, 0.5);
            background-image: none; 
        }

        
        .was-validated .form-select:valid {
            box-shadow: 0 0 10px 0.25rem rgba(25, 135, 84, 0.5);
        }
        .was-validated .form-select:invalid {
            box-shadow: 0 0 10px 0.25rem rgba(220, 53, 69, 0.5);
        }
    </style>
</head>
<body>
    <div class="container pt-5 pb-5">
        <h1 class="mb-4"><i class="fas fa-edit"></i> Workshop #HTML-FORM</h1>

        <form action="https://httpbin.org/get" method="get" target="_blank" class="needs-validation" novalidate>
            
            <div class="mb-3 row">
                <label for="inputfirstname" class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputfirstname" name="firstname" placeholder="ระบุชื่อจริง" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputLastname" class="col-sm-2 col-form-label">นามสกุล <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="ระบุนามสกุล" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputDate" class="col-sm-2 col-form-label">วัน/เดือน/ปี <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputDate" name="birthdate" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">เพศ <span class="text-danger">*</span></label>
                <div class="col-sm-10 d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                        <label class="form-check-label" for="male">ชาย</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                        <label class="form-check-label" for="female">หญิง</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" required>
                        <label class="form-check-label" for="other">ทางเลือกอื่น</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="photo" class="col-sm-2 col-form-label">รูปภาพ</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="photo" name="user_photo">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="location" class="col-sm-2 col-form-label">ที่อยู่ <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="location" id="location" rows="3" required></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="color" class="col-sm-2 col-form-label">สีโปรด</label>
                <div class="col-sm-10">
                    <input type="color" class="form-control form-control-color" id="color" name="fav_color" value="#563d7c">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="music" class="col-sm-2 col-form-label">แนวเพลงที่ชอบ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="music" name="fav_music">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">เงื่อนไขการใช้งาน <span class="text-danger">*</span></label>
                <div class="col-sm-10 d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="terms" id="accept" value="yes" required>
                        <label class="form-check-label" for="accept">ยอมรับ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="terms" id="decline" value="no" required>
                        <label class="form-check-label" for="decline">ไม่ยอมรับ</label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-custom-save me-2">
                        <i class="fas fa-save"></i> บันทึกข้อมูล
                    </button>
                    
                    <button type="reset" class="btn btn-custom-reset" onclick="document.querySelector('form').classList.remove('was-validated')">
                        <i class="fas fa-trash-alt"></i> ล้างข้อมูล
                    </button>
                </div>
            </div>

        </form>
    </div>

    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>