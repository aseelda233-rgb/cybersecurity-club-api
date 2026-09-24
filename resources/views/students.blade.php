<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة الطلاب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 20px;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .badge-success {
            color: green;
            font-weight: bold;
        }
        .badge-danger {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>قائمة الطلاب</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>التخصص</th>
                <th>العمر</th>
                <th>حالة التخرج</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->age }}</td>
                    <td>
                        @if($student->isGraduate)
                            <span class="badge-success">خريج</span>
                        @else
                            <span class="badge-danger">غير خريج</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">لا يوجد طلاب حالياً</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>