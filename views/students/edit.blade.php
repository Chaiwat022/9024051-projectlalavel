<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลนักศึกษา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <h2>แก้ไขข้อมูลนักศึกษา</h2>
        <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">ย้อนกลับ</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">รหัสนักศึกษา</label>
                    <input type="text" name="student_code" class="form-control" value="{{ $student->student_code }}" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">คำนำหน้า (ไทย)</label>
                    <input type="text" name="prefix_th" class="form-control" value="{{ $student->prefix_th }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">ชื่อ (ไทย)</label>
                    <input type="text" name="first_name_th" class="form-control" value="{{ $student->first_name_th }}" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">นามสกุล (ไทย)</label>
                    <input type="text" name="last_name_th" class="form-control" value="{{ $student->last_name_th }}" required>
                </div>

                <div class="col-md-2">
                    <label class="form-label">คำนำหน้า (ENG)</label>
                    <input type="text" name="prefix_en" class="form-control" value="{{ $student->prefix_en }}" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">ชื่อ (ENG)</label>
                    <input type="text" name="first_name_en" class="form-control" value="{{ $student->first_name_en }}" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">นามสกุล (ENG)</label>
                    <input type="text" name="last_name_en" class="form-control" value="{{ $student->last_name_en }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">เลขประจำตัวประชาชน</label>
                    <input type="text" name="national_id" class="form-control" maxlength="13" value="{{ $student->national_id }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">วันเดือนปีเกิด</label>
                    <input type="date" name="birth_date" class="form-control" value="{{ $student->birth_date }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">เพศ</label>
                    <select name="gender" class="form-control">
                        <option value="ชาย" {{ $student->gender == 'ชาย' ? 'selected' : '' }}>ชาย</option>
                        <option value="หญิง" {{ $student->gender == 'หญิง' ? 'selected' : '' }}>หญิง</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">อีเมล</label>
                    <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">คณะ</label>
                    <input type="text" name="faculty" class="form-control" value="{{ $student->faculty }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">สาขาวิชา</label>
                    <input type="text" name="major" class="form-control" value="{{ $student->major }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">ชั้นปีที่</label>
                    <input type="number" name="study_year" class="form-control" value="{{ $student->study_year }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">เกรดเฉลี่ย (GPA)</label>
                    <input type="text" name="gpa" class="form-control" value="{{ $student->gpa }}">
                </div>

                <div class="col-12">
                    <label class="form-label">ที่อยู่</label>
                    <textarea name="address" class="form-control" rows="2" required>{{ $student->address }}</textarea>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-warning px-4">อัปเดตข้อมูล</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>