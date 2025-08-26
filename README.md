# Products App (Laravel + Vue 3 + API)

Минимальный проект для отображения продуктов с API и фронтом на Vue 3.  
Позволяет выводить список продуктов с изображениями и выполнять поиск по названию.

---

## ⚙️ Требования

- PHP >= 8.3
- Composer
- Node.js
- SQLite
- Git

---

## 📥 Установка и запуск проекта

Выполнить все команды последовательно:


# Клонируем репозиторий
```bash
    git clone git@github.com:Aleksandrs001/products-app.git
    cd products-app
```
# Устанавливаем зависимости PHP
```bash
    composer install
```

# Устанавливаем зависимости Node.js
```bash
    npm install
```

# Генерируем ключ
```bash
    php artisan key:generate
```

# Создаём SQLite базу данных
```bash
  touch database/database.sqlite
```


# Запускаем миграции и сидеры
```bash
    php artisan migrate
    php artisan db:seed --class=ProductSeeder
```

# Запуск сервера Laravel
```bash
    php artisan serve
```

# Сборка фронтенда для разработки
```bash
    npm run dev
```


