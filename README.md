# Command Used and steps

1. copy .env.example and change it to .env and setup db settings

2. php artisan make:seeder UsersTableSeeder

3. composer dump-autoload

4. php artisan db:seed

5. php artisan make:migration create_companies_table --create=companies

6. php artisan migrate

7. php artisan make:migration create_employees_table --create=employees

8. php artisan storage:link

9. php artisan make:controller CompaniesController --resource --model=Company

10. php artisan make:controller EmployeesController --resource --model=Employee



