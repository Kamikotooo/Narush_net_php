<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ - Список заявлений</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #0000ff;
        }

        .logo span {
            color: #ff0000;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .user-name {
            font-weight: 500;
        }

        .btn-create {
            background: #ff0000;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            margin-bottom: 30px;
            transition: background 0.3s;
        }

        .btn-create:hover {
            background: #cc0000;
        }

        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }

        .report-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .date-block {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .date {
            color: #ff0000;
            font-weight: bold;
            font-size: 16px;
        }

        .car-number {
            background: #f0f0f0;
            padding: 5px 10px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 14px;
        }

        .card-actions {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .btn-icon:hover {
            opacity: 1;
        }

        .description {
            color: #333;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .status {
            font-size: 14px;
            color: #666;
        }

        .status-new {
            color: #28a745;
            font-weight: bold;
        }

        .status-rejected {
            color: #dc3545;
            font-weight: bold;
        }

        .status-confirmed {
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">НАРУШЕНИЙ<span>.НЕТ</span></div>
            <div class="user-profile">
                <span class="user-name">Носова Ольга Петровна</span>
                <span>▼</span>
            </div>
        </div>
<!-- 
        <button class="btn-create" onclick="location.href='{{ route('reports.create') }}'">
            создать заявление
        </button> -->

        <div class="reports-grid">
            @foreach($reports as $report)
                <div class="report-card">
                    <div class="card-header">
                        <div class="date-block">
                            <span class="date">{{ $report->created_at->format('d.m.Y') }}</span>
                            <span class="car-number">{{ $report->car_number }}</span>
                        </div>
                        <div class="card-actions">
                            <button class="btn-icon">✎</button>
                            <button class="btn-icon">🗑</button>
                        </div>
                    </div>
                    
                    <p class="description">{{ $report->description }}</p>
                    
                    <div class="status">
                        Статус заявления - 
                        @if($report->status == 'новое')
                            <span class="status-new">новое</span>
                        @elseif($report->status == 'отклонено')
                            <span class="status-rejected">отклонено</span>
                        @elseif($report->status == 'подтверждено')
                            <span class="status-confirmed">подтверждено</span>
                        @else
                            <span>{{ $report->status }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>