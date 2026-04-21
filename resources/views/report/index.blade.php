<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ - Список заявлений</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        
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
    <x-app-layout>
        <button class="btn-create" onclick="location.href='{{ route('reports.create') }}'">
            создать заявление
        </button>

        <div>
            <span>Сортировка по дате создания: </span>
            <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}">
                сначала новые
            </a>
            <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}">
                сначала старые
            </a>
        </div>

        
        <div>
            <p>Фильтрация по статусу заявки</p>
            <ul>
                @foreach($statuses as $statusItem)
                    <li>
                        <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $statusItem->id]) }}">
                            {{ $statusItem->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="reports-grid">
            @foreach($reports as $report)
                <div class="report-card">
                    <div class="card-header">
                        <div class="date-block">
                            <span class="date">{{ $report->created_at->format('d.m.Y') }}</span>
                            <span class="car-number">{{ $report->number }}</span>
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('reports.edit', $report->id) }}" class="btn-icon">✎</a>
                            <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Удалить заявление?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon">🗑</button>
                             </form>
                        </div>
                    </div>
                    
                    <p class="description">{{ $report->description }}</p>
                    
                    <div class="status">
                        Статус заявления - 
                        @if($report->status)
                            <span class="status-{{ $report->status->name }}">{{ $report->status->name }}</span>
                         @else
                            <span>статус не установлен</span> 
                        @endif
                    </div>
                </div>
            @endforeach
            {{ $reports->appends(request()->query())->links() }}
        </div>
    </div>
    </x-app-layout>
</body>
</html>