<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Aphatsara</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (จำเป็นมากสำหรับไอคอนในหน้าบทความและฟอร์ม) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts: เพิ่มความพรีเมียมให้ฟอนต์ทั้งเว็บไซต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- App CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* แก้ไขปัญหาความขัดแย้งของ class .collapse ระหว่าง Tailwind และ Bootstrap */
        .navbar-collapse {
            visibility: visible !important;
        }
        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                visibility: visible !important;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar ดีไซน์ Fixed มินิมอล -->
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
        <div class="container">

            <a class="navbar-brand-custom" href="{{ url('/') }}">
                Aphatsara
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto gap-1 mt-3 mt-lg-0">

                    <a class="nav-link {{ Request::is('/') ? 'active-orange' : '' }}" href="{{ url('/') }}">
                        หน้าแรก
                    </a>

                    <a class="nav-link {{ request()->routeIs('about') ? 'active-orange' : '' }}"
                        href="{{ route('about') }}">
                        เกี่ยวกับ
                    </a>

                    <a class="nav-link {{ request()->routeIs('blog') ? 'active-orange' : '' }}"
                        href="{{ route('blog') }}">
                        บทความ
                    </a>

                    <a class="nav-link {{ request()->routeIs('from') ? 'active-orange' : '' }}"
                        href="{{ route('from') }}">
                        เขียนบทความ
                    </a>

                    <a class="nav-link {{ Request::is('student*') ? 'active-orange' : '' }}"
                        href="{{ url('/student/1') }}">
                        นักศึกษา
                    </a>

                    <a class="nav-link {{ request()->routeIs('claim.*') ? 'active-orange' : '' }}"
                        href="{{ route('claim.create') }}">
                        แจ้งเคลม
                    </a>



                </div>
            </div>

        </div>
    </nav>

    <!-- ส่วนเนื้อหาหลัก (Yield Content) ปล่อยอิสระให้แต่ละหน้าคุมเฟรมเวิร์ก Container เองตามดีไซน์ -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Summernote Lite CSS & JS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'เขียนเนื้อหาบทความที่นี่... จัดรูปแบบหัวข้อ ตัวหนา ขีดเส้นใต้ หรือใส่วิดีโอและรูปภาพได้ตามต้องการ',
                tabsize: 2,
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        document.execCommand('insertText', false, bufferText);
                    }
                }
            });
        });
    </script>
</body>

</html>
