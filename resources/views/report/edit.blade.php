<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ - Редактирование заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        <div class="breadcrumb">
            <a href="{{ route('reports.index') }}">Главная</a> > 
            <strong>Редактирование заявления</strong>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('reports.update', $report->id) }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">регистрационный номер авто</label>
                    <input type="text" 
                           name="number" 
                           class="form-input" 
                           value="{{ old('number', $report->number) }}" 
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label">описание нарушения</label>
                    <textarea name="description" 
                              class="form-input" 
                              required>{{ old('description', $report->description) }}</textarea>
                </div>

                <button type="submit" class="btn-submit">
                    Обновить
                </button>
            </form>
        </div>
    </div>
</body>
</html>