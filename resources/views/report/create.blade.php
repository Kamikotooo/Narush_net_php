<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ - Создание заявления</title>
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
        <div class="breadcrumb">
            <a href="{{ route('reports.index') }}">Главная</a> > 
            <strong>Создание заявления</strong>
        </div>

        <div class="form-container">
            <form action="{{ route('reports.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">регистрационный номер авто</label>
                    <input type="text" name="number" class="form-input" placeholder="А123ВС 174" required>
                </div>

                <div class="form-group">
                    <label class="form-label">описание нарушения</label>
                    <textarea name="description" class="form-input" placeholder="Опишите нарушение..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    создать заявление
                </button>
            </form>
        </div>
    </x-app-layout>
    </div>
</body>
</html>