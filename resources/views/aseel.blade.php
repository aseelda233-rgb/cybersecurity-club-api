<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aseel</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e2e8f0;
            padding: 50px 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .main-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: none;
        }
        .badge-count {
            background-color: #2e7d32;
            color: white;
            border-radius: 50%;
            padding: 3px 9px;
            font-size: 0.85rem;
            display: inline-block;
            margin-left: 6px;
        }
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-custom thead th {
            background-color: #2ea428 !important;
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 14px;
            border: none;
        }
        .table-custom thead tr th:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        .table-custom thead tr th:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .table-custom tbody td {
            padding: 16px 14px;
            color: #334155;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .badge-active {
            background-color: #d1e7dd;
            color: #14532d;
            padding: 5px 14px;
            border-radius: 15px;
            font-size: 0.78rem;
            font-weight: 600;
        }
        .badge-inactive {
            background-color: #f8d7da;
            color: #842029;
            padding: 5px 14px;
            border-radius: 15px;
            font-size: 0.78rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="main-card">
                
                <!-- Title Section -->
                <h2 class="fw-bold text-dark mb-1 d-flex align-items-center">
                    Aseel
                    <span class="badge-count">{{ count($aseel) }}</span>
                </h2>
                <p class="text-muted small mb-4">List of all records from the alasa6eer table</p>

                <!-- Dynamic Table -->
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>MAJOR</th>
                                <th>AGE</th>
                                <th>CITY</th>
                                <th>STATUS</th>
                                <th>CREATED AT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aseel as $item)
                            <tr>
                                <td class="fw-medium text-secondary">{{ $item->id }}</td>
                                <td class="fw-semibold">{{ $item->name }}</td>
                                <td>{{ $item->major }}</td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->city }}</td>
                                <td>
                                    <span class="{{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                                        {{ $item->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-secondary small">
                                    {{ $item->created_at ? $item->created_at->format('Y-m-d H:i') : '' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>