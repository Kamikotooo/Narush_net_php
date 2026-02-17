<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.НЕТ - Создание заявления</title>
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
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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

        .breadcrumb {
            background: white;
            padding: 15px 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .breadcrumb a {
            color: #333;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .form-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
        }

        textarea.form-input {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            background: #ff0000;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #cc0000;
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

        <div class="breadcrumb">
            <a href="{{ route('reports.index') }}">Главная</a> > 
            <strong>Создание заявления</strong>
        </div>

        <div class="form-container">
            <form action="{{ route('reports.create') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">регистрационный номер авто</label>
                    <input type="text" name="car_number" class="form-input" placeholder="А123ВС 174" required>
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
    </div>
</body>
</html>