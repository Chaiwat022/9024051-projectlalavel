<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักศึกษา</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; }
        .navbar-custom { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #495057; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark navbar-custom shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('students.index') }}">
                <i class="fa-solid fa-graduation-cap me-2"></i> Student & Academic Information System
            </a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark"><i class="fa-solid fa-user-plus text-primary me-2"></i> เพิ่มข้อมูลนักศึกษาใหม่</h3>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> ย้อนกลับ
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            <h5 class="text-primary mb-3 border-bottom pb-2"><i class="fa-solid fa-address-card me-2"></i> ข้อมูลส่วนตัว</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">รหัสนักศึกษา</label>
                    <input type="text" name="student_code" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">คำนำหน้า (ไทย)</label>
                    <input type="text" name="prefix_th" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">ชื่อ (ไทย)</label>
                    <input type="text" name="first_name_th" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">นามสกุล (ไทย)</label>
                    <input type="text" name="last_name_th" class="form-control" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">คำนำหน้า (ENG)</label>
                    <input type="text" name="prefix_en" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">ชื่อ (ENG)</label>
                    <input type="text" name="first_name_en" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">นามสกุล (ENG)</label>
                    <input type="text" name="last_name_en" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">เลขประจำตัวประชาชน</label>
                    <input type="text" name="national_id" class="form-control" maxlength="13" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">วันเดือนปีเกิด</label>
                    <input type="date" name="birth_date" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">เพศ</label>
                    <select name="gender" class="form-select">
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">อีเมล</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>

            <h5 class="text-primary mb-3 border-bottom pb-2"><i class="fa-solid fa-building-columns me-2"></i> ข้อมูลการศึกษา</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">คณะ</label>
                    <input type="text" name="faculty" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">สาขาวิชา</label>
                    <input type="text" name="major" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">ชั้นปีที่</label>
                    <input type="number" name="study_year" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">เกรดเฉลี่ย (GPA)</label>
                    <input type="text" name="gpa" class="form-control" value="0.00">
                </div>
                <div class="col-12">
                    <label class="form-label">ที่อยู่</label>
                    <textarea name="address" class="form-control" rows="2" required></textarea>
                </div>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success px-5 py-2 shadow-sm rounded-pill">
                    <i class="fa-solid fa-save me-1"></i> บันทึกข้อมูล
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>