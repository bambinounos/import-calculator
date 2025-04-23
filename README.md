# import-calculator
Import Calculator Ecuador
Instrucciones de Implementación 

  1.  Instalación Inicial 
```
git clone https://github.com/bambinounos/import-calculator.git
cd import-calculator
composer install
cp .env.example .env
php artisan key:generate
```
3. Configuración de Base de Datos
# Crear base de datos en PostgreSQL
```
createdb import_calculator
# Actualizar .env con credenciales
DB_DATABASE=import_calculator
DB_USERNAME=postgres
DB_PASSWORD=tu_contraseña
```
3. Migraciones y Seeders
```
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```
4. Configuración Inicial 
     
```
Acceder a /settings para configurar:
vat_rate (Ej: 0.12 para 12%)
default_currency (USD/EUR)
```    
     

5. Ejemplo de CSV
```
partida_code,description,unit_weight,quantity,unit_price
8471.30.00,"PUMP GR 7S8660",23.5,100,23.05
8542.31.00,"FILTER HYDRAULIC 9M9740",25,40,25
```
6. Características Principales 
```    
Cálculo automático de CIF
Distribución de flete/seguro por peso o valor
Aplicación automática de aranceles y salvaguardias
Conversión de monedas
Reportes detallados por producto
```     
7. Pruebas
```
php artisan serve
# Acceder a http://localhost:8000
```
8.Observaciones
9. Este sistema replica la lógica de tu Excel con mejoras profesionales: 
...
Base de datos relacional
Seguridad con autenticación
Validación de datos
Escalabilidad para miles de registros
Interfaz amigable
...
...     


     
   
