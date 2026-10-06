<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบสารสนเทศข้อมูลนักศึกษา</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; }
        .navbar-custom { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .table th { background-color: #2575fc !important; color: white; font-weight: 600; }
        .btn-custom-primary { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); border: none; color: white; }
        .btn-custom-primary:hover { opacity: 0.9; color: white; }

        /* บังคับให้ Pagination ของ Laravel เรียงแถวเดียวกันและย่อขนาดให้เล็กจิ๋ว */
        nav[role="navigation"] svg {
            width: 12px !important;
            height: 12px !important;
        }
        nav[role="navigation"] .flex {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            width: 100%;
        }
        /* ซ่อนข้อความเทอะทะของ Laravel และจัดปุ่มให้อยู่ขวาบรรทัดเดียวกัน */
        nav[role="navigation"] .hidden {
            display: block !important;
        }
        /* ปรับแต่งปุ่มกดเลขหน้าและลูกศรให้เล็กลง */
        nav[role="navigation"] a, nav[role="navigation"] span[aria-current="page"] span {
            font-size: 0.75rem !important;
            padding: 0.2rem 0.5rem !important;
            margin: 0 1px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark navbar-custom shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('students.index') }}">
                <i class="fa-solid fa-graduation-cap me-2"></i> Student & Academic Information System
            </a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="fw-bold text-dark mb-0"><i class="fa-solid fa-users text-primary me-2"></i> รายชื่อนักศึกษาทั้งหมด</h3>
                <p class="text-muted small">ระบบจัดการข้อมูลสารสนเทศนักศึกษา</p>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('students.create') }}" class="btn btn-custom-primary px-4 py-2 shadow-sm rounded-pill">
                    <i class="fa-solid fa-user-plus me-1"></i> เพิ่มข้อมูลนักศึกษา
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card p-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ - นามสกุล (ไทย)</th>
                                <th>คณะ</th>
                                <th>สาขาวิชา</th>
                                <th>ชั้นปี</th>
                                <th>GPA</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                            <tr>
                                <td class="fw-semibold text-primary">{{ $student->student_code }}</td>
                                <td>{{ $student->prefix_th }} {{ $student->first_name_th }} {{ $student->last_name_th }}</td>
                                <td>{{ $student->faculty }}</td>
                                <td>{{ $student->major }}</td>
                                <td><span class="badge bg-secondary">{{ $student->study_year }}</span></td>
                                <td><span class="fw-bold text-success">{{ $student->gpa }}</span></td>
                                <td><span class="badge bg-success bg-opacity-75 text-white px-2 py-1">{{ $student->status ?? 'ปกติ' }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm text-white px-2 shadow-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-2 shadow-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fa-solid fa-folder-open fa-2x mb-2 text-secondary"></i><br>ยังไม่มีข้อมูลนักศึกษาในระบบ
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- ส่วนแสดงปุ่มเปลี่ยนหน้า (Pagination) แบบย่อและอยู่บรรทัดเดียวกัน -->
                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                    <div class="text-muted small">
                        แสดงข้อมูลหน้าละ 10 รายการ
                    </div>
                    <div>
                        {{ $students->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>